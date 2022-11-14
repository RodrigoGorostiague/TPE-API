<?php
require_once("./model/LessonsModel.php");
require_once("./model/AdminModel.php");
require_once("./api/JSONView.php");
require_once("./Helpers/AuthApiHelper.php");
require_once("./model/UserModel.php");


class LessonsApiController
{
    private $model;
    private $modelAdm;
    private $view;
    private $data;

    public function __construct()
    {
        $this->model = new LessonsModel();
        $this->modelAdm = new AdminModel();
        $this->modelUsr = new UserModel();
        $this->view = new JSONView();
        $this->authHelper = new AuthApiHelper();
        $this->data = file_get_contents("php://input");
    }
    public function getLessons($params = [])
    {
        $orden = [];
        if (isset($_GET['sort'])) {
            $orden['sort'] = $_GET['sort'];
        }
        if (isset($_GET['order'])) {
            $orden['order'] = $_GET['order'];
        }
        if (isset($_GET['tema'])) {
            $orden['tema'] = $_GET['tema'];
        }
        if (isset($_GET['limit'])) {
            $orden['limit'] = $_GET['limit'];
        }
        if (isset($_GET['offset'])) {
            $orden['offset'] = $_GET['offset'];
        }
        $lesson = $this->model->getLessons($orden);
        $this->view->response($lesson, 200);
    }
    public function getLesson($params = [])
    {
        // obtengo el id de los params
        $idLesson = $params[':ID'];
        $colname = null;
        if (isset($params[':COLNAME'])) {
            $colname = $params[':COLNAME'];
        }else{
            switch($colname){
                case 'tema':
                    $colname = 't.name';
                    break;
                case 'descripcion':
                    $colname = 'l.descripcion';
                    break;
                case '  ':
                    $colname = 'l.video_url';
                    break;
                case 'slide_url':
                    $colname = 'l.slide_url';
                    break;
                case 'likes':
                    $colname = 'l.likes';
                    break;
            }
        }
        $lesson = $this->model->getLesson($idLesson, $colname);
        if ($lesson)
            $this->view->response($lesson, 200);
        else
            $this->view->response("No existe clase con id {$idLesson}", 404);
    }
    public function deleteLesson($params = [])
    {
        $valid = $this->tokenValidate();
        if ($valid === 1) {
            $lesson_id = $params[':ID'];
            $lesson = $this->model->getLesson($lesson_id);
            if ($lesson) {
                $this->modelAdm->deleteLesson($lesson_id);
                $this->view->response("Clase id={$lesson_id} eliminada con éxito", 200);
            } else {
                $this->view->response("Clase id={$lesson_id} not found", 404);
            }
        } else {
            return $valid;
        }
    }
    private function getData()
    {
        return json_decode($this->data);
    }
    public function addLesson($params = null)
    {
        $valid = $this->tokenValidate();
        if ($valid) {
            $data = $this->getData();
            $tema = $data->tema;
            $descripcion = $data->descripcion;
            $video_url = $data->video_url;
            $slide_url = $data->slide_url;
            $lesson = $this->modelAdm->addLesson($tema, $descripcion, $video_url, $slide_url);
            if (isset($lesson)) {
                $this->view->response("La clase se creo con exito", 201);
            } else {
                
                $this->view->response("La clase no pudo ser creada", 500);
            }
        }else{
            return $valid;
        }
    }
    public function updateLesson($params = [])
    {
        $valid = $this->tokenValidate();
        if ($valid) {
            $lesson_id = $params[':ID'];
            $lesson = $this->model->getLesson($lesson_id);
            if ($lesson) {
                $data = $this->getData();
                $tema = $data->tema;
                $descripcion = $data->descripcion;
                $video_url = $data->video_url;
                $slide_url = $data->slide_url;
                $resultado = $this->modelAdm->updateLesson($tema, $descripcion, $video_url, $slide_url, $lesson_id);
                if ($resultado) {
                    $this->view->response("Clase id={$lesson_id} actualizada con éxito", 200);
                } else {
                    $this->view->response("Error en actualizacion de clase id={$lesson_id} ", 500);
                }
            } else
                $this->view->response("Clase id=$lesson_id not found", 404);
        }
    }
    function userApiVerify()
    {
        $userpass = $this->authHelper->getBasic();
        if($userpass != null){
            $user = $this->modelUsr->getUser($userpass['user']);
            $password = $userpass['pass'];
            if ($user && password_verify($password, $user['password'])) {
            return $user;
            }
        }
    }
    function tokenValidate()
    {
        $token = ($_GET["token"]);
        $user = $this->userApiVerify();
        if ($user && ($user['token'] == $token)) {
            $time = time();
            if ($user['token_exp'] > $time) {
                return 1;
            } else {
                return $this->view->response("Acceso denegado, el token ha expirado", 401);
            }
        } else {
            return $this->view->response("Acceso denegado", 401);
        }
    }
}
