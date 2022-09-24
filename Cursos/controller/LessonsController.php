<?php
    require_once './view/LessonsView.php';
    require_once './model/LessonsModel.php';
    require_once './model/UserLessonsModel.php';

    class LessonsController extends Controller{
        private $UserLessonsModel;
       
        function __construct(){
            $this->view = new LessonsView();
            $this->model = new LessonsModel();
            $this->UserLessonsModel = new UserLessonsModel();
        }
        function home() {
            $lessons = $this->model->getLessons();
            $this->view->showLessons($lessons);
        }
        function agregar($lessonId) {
            $lessons = $this->UserLessonsModel->getUserLessons();
            if(empty($this->LessonsModel->alredyExist($lessonId))){
                $this->model->addToList($lessonId);
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