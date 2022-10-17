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
            if(isset($_SESSION['USER'])){
                $user = $_SESSION['USER'];
            }else{
                $user = -1;
            }
            $userId = $_SESSION['USER_ID'];
            $lessons = $this->model->getUserLessons($userId);
            $this->view->showUserLessons($lessons, $user);
            
            
        }
        function borrar($lessonId) {
            $userId = $_SESSION['USER_ID'] ;
            $lessons = $this->model->getUserLessons($userId);
            $this->model->deleteToList($lessonId, $userId);
            $this->myLessons();
        }
    }
?>