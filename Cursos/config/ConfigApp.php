<?php
    class ConfigApp {
        public static $ACTION = 'action';
        public static $PARAMS = 'params';
        public static $ACTIONS = [
            '' => 'LessonsController#home',
            'home' => 'LessonsController#home',
            'categories' => 'LessonsController#categories',
            'detail' => 'LessonsController#detail',
            'agregar' => 'LessonsController#agregar',
            'like' => 'LessonsController#like',
            'mis-cursos' => 'UserLessonsController#myLessons',
            'borrar' => 'UserLessonsController#borrar',
            'login' => 'UserController#logIn',
            'logout' => 'UserController#logOut',
            'userValidate' => 'UserController#userValidate',
            'signin' => 'UserController#signIn',
            'newUser' => 'UserController#newUser',
            'cmd' => 'AdminController#cmd',
            'add-lesson' => 'AdminController#addLesson',
            'add-tema' => 'AdminController#addTema',
            'delete-lesson' => 'AdminController#deleteLesson',
            'update-lesson' => 'AdminController#updateLesson',
            'cmd-categories' => 'AdminController#cmdCategories',
        ];
    }
?>