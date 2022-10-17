<?php
    require_once './view/LessonsView.php';
    require_once './model/LessonsModel.php';
    require_once './model/UserLessonsModel.php';

    class LessonsController extends SecuredController{
        private $UserLessonsModel;
       
        function __construct(){
            parent::__construct();
            $this->view = new LessonsView();
            $this->model = new LessonsModel();
            $this->UserLessonsModel = new UserLessonsModel();
        }
        function home() {
            if(isset($_SESSION['USER'])){
                $user = $_SESSION['USER'];
            }else{
                $user = -1;
            }
            $lessons = $this->model->getLessons();
            $temas = $this->model->getAllTema();
            $this->view->showLessons($lessons, $temas, $user);
        }
        function categories($item) {
            if(isset($_SESSION['USER'])){
                $user = $_SESSION['USER'];
            }else{
                $user = -1;
            }
            $lessons = $this->model->getCategoriesList($item);
            $temas = $this->model->getAllTema();
            $this->view->showLessons($lessons, $temas, $user);
        }
        function detail($item){
            $lesson = $this->model->getLessonById($item);
            $this->view->showDetail($lesson);

        }
        function agregar($lessonId) {
            $userId = $_SESSION['USER_ID'] ;
            $lessons = $this->UserLessonsModel->getUserLessons($userId);
            if(empty($this->model->alredyExist($lessonId, $userId))){
                $this->model->addToList($lessonId, $userId );
                $this->home();
            }else{
                $lessons = $this->model->getLessons();
                $temas = $this->model->getAllTema();
                $this->view->errorAdd("Ya Tienes esta clase guardada", $lessons, $temas);
            }
        }
        function like($lessonId){
            $lessons = $this->model->getLessons();
            $this->model->addLike($lessonId);
            $this->home();
        }
    }
?>