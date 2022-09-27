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
            $lessons = $this->model->getLessons();
            $this->view->showLessons($lessons);
        }
        function agregar($lessonId) {
            $userId = $_SESSION['USER_ID'] ;
            $lessons = $this->UserLessonsModel->getUserLessons($userId);
            if(empty($this->model->alredyExist($lessonId, $userId))){
                $this->model->addToList($lessonId, $userId );
                $this->home();
            }else{
                $lessons = $this->model->getLessons();
                $this->view->errorAdd("Ya Tienes esta clase guardada", $lessons);
            }
        }
        function like($lessonId){
            $lessons = $this->model->getLessons();
            $this->model->addLike($lessonId);
            $this->home();
        }
    }
?>