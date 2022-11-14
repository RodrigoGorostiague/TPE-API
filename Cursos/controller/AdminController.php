<?php
    require_once './view/AdminView.php';
    require_once './model/AdminModel.php';
    require_once './model/LessonsModel.php';

    class AdminController extends SecuredController{
        
        function __construct(){
            parent::__construct();
            $this->view = new AdminView();
            $this->model = new AdminModel();
            $this->modelLesson = new LessonsModel();
        }

        function cmd(){
            if(isset($_SESSION['USER'])){
                $user = $_SESSION['USER'];
            }else{
                $user = -1;
            }
            $lessons = $this->modelLesson->getLessons();
            $temas = $this->modelLesson->getAllTema();
            $this->view->showCmd($lessons, $temas, $user);
        }
        function addLesson(){
            $tema= ($_POST['tema_id']);
            $descripcion= $_POST['descripcion'];
            $url_video= $_POST['url_video'];
            $url_slide= $_POST['url_slide'];
            move_uploaded_file($_FILES['archivo']['tmp_name'], '..\assets\images');
            echo print_r($_FILES);
            $img_src = 'assets/images/' . $_FILES['archivo']['name'];
            $this->model->addLesson($tema, $descripcion, $url_video, $url_slide, $img_src);
            $this->cmd();
        }
        function deleteLesson($lessonId) {
            if(is_array($lessonId)){
                $id= $lessonId[0];
                }else{
                    $id = $lessonId;
                }
            $this->model->deleteLesson($id);
            $lessons = $this->modelLesson->getLessons();
            $temas = $this->modelLesson->getAllTema();
            $user = $_SESSION['USER'];
            $success = 'La eliminacion ha sido completada con exito';
            $this->view->successCmd($lessons, $temas, $user, $success);
        }
        
        function updateLesson($lessonId){
            if(!empty($_POST['tema_id']) && (!empty($_POST['descripcion'])) && (!empty($_POST['video'])) && !empty($_POST['slide'])){
            $tema= ($_POST['tema_id']);
            $descripcion= $_POST['descripcion'];
            $video_url= $_POST['video'];
            $slide_url= $_POST['slide'];
            if(is_array($lessonId)){
                $id= $lessonId[0];
                }else{
                    $id = $lessonId;
                }
            $this->model->updateLesson($tema, $descripcion, $video_url, $slide_url, $id);
            $lessons = $this->modelLesson->getLessons();
            $temas = $this->modelLesson->getAllTema();
            $user = $_SESSION['USER'];
            $success = 'La actualizacion ha sido completada con exito';
            $this->view->successCmd($lessons, $temas, $user, $success);
            }else{
                $lessons = $this->modelLesson->getLessons();
                $temas = $this->modelLesson->getAllTema();
                $user = $_SESSION['USER'];
                $error = 'UPS!! Ocurrio un error al actualizar';
                $this->view->errorCmd($lessons, $temas, $user, $error);
            }
        }
        function addTema(){
            if(!empty($_POST['newTema'])){
            $tema= ($_POST['newTema']);
            $this->model->addTema($tema);
            $lessons = $this->modelLesson->getLessons();
            $temas = $this->modelLesson->getAllTema();
            $user = $_SESSION['USER'];
            $success = 'Has agregado un nuevo tema, felicitaciones';
            $this->view->successCmd($lessons, $temas, $user, $success);
            }else{
                $lessons = $this->modelLesson->getLessons();
                $temas = $this->modelLesson->getAllTema();
                $user = $_SESSION['USER'];
                $error = 'UPS!! No se ha podido crear un nuevo tema';
                $this->view->errorCmd($lessons, $temas, $user, $error);

            }
        }
        function cmdCategories($item) {
            if(isset($_SESSION['USER'])){
                $user = $_SESSION['USER'];
            }else{
                $user = -1;
            }
            $lessons = $this->modelLesson->getCategoriesList($item);
            $temas = $this->modelLesson->getAllTema();
            $this->view->showCmd($lessons, $temas, $user);
        }
    }
?>