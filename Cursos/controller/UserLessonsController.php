<?php
    require_once './view/UserLessonsView.php';
    require_once './model/UserLessonsModel.php';

    class UserLessonsController{
        private $UserLessonsView;
        private $UserLessonsModel;
       
        function __construct(){
            $this->UserLessonsView = new UserLessonsView();
            $this->UserLessonsModel = new UserLessonsModel();
        }
        function myLessons() {
            $lessons = $this->UserLessonsModel->getUserLessons();
            $this->UserLessonsView->showUserLessons($lessons);
        }
        function borrar($lessonId) {
            $lessons = $this->UserLessonsModel->getUserLessons();
            $this->UserLessonsModel->deleteToList($lessonId);
            $this->myLessons();
        }
    }
?>