<?php
    require_once './view/UserLessonsView.php';
    require_once './model/UserLessonsModel.php';

    class UserLessonsController extends SecuredController{
        function __construct(){
            parent::__construct();
            $this->view = new UserLessonsView();
            $this->model = new UserLessonsModel();
        }
        function myLessons() {
            $userId = $_SESSION['USER_ID'] ;
            $lessons = $this->model->getUserLessons($userId);
            $this->view->showUserLessons($lessons);
            echo $userId;
            
        }
        function borrar($lessonId) {
            $userId = $_SESSION['USER_ID'] ;
            $lessons = $this->model->getUserLessons($userId);
            $this->model->deleteToList($lessonId, $userId);
            $this->myLessons();
        }
    }
?>