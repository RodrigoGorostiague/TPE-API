<?php
    require_once './view/LessonsView.php';
    require_once './model/LessonsModel.php';
    require_once './model/UserLessonsModel.php';

    class LessonsController{
        private $LessonsView;
        private $LessonsModel;
        private $UserLessonsModel;
       
        function __construct(){
            $this->LessonsView = new LessonsView();
            $this->LessonsModel = new LessonsModel();
            $this->UserLessonsModel = new UserLessonsModel();
        }
        function home() {
            $lessons = $this->LessonsModel->getLessons();
            $this->LessonsView->showLessons($lessons);
        }
        function agregar($lessonId) {
            $lessons = $this->UserLessonsModel->getUserLessons();
            if(empty($this->LessonsModel->alredyExist($lessonId))){
                $this->LessonsModel->addToList($lessonId);
                $this->home();
            }else{
                $lessons = $this->LessonsModel->getLessons();
                $this->LessonsView->errorAdd("Ya Tienes esta clase guardada", $lessons);
            }
        }
        function like($lessonId){
            $lessons = $this->LessonsModel->getLessons();
            $this->LessonsModel->addLike($lessonId);
            $this->home();
        }
    }
?>