<?php
    require_once './view/UserLessonsView.php';
    require_once './model/UserLessonsModel.php';

    class UserLessonsController extends Controller{
        function __construct(){
            $this->view = new UserLessonsView();
            $this->model = new UserLessonsModel();
        }
        function myLessons() {
            $lessons = $this->model->getUserLessons();
            $this->view->showUserLessons($lessons);
        }
        function borrar($lessonId) {
            $lessons = $this->model->getUserLessons();
            $this->model->deleteToList($lessonId);
            $this->myLessons();
        }
    }
?>