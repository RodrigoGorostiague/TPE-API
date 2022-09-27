<?php
    class ConfigApp {
        public static $ACTION = 'action';
        public static $PARAMS = 'params';
        public static $ACTIONS = [
            '' => 'LessonsController#home',
            'home' => 'LessonsController#home',
            'agregar' => 'LessonsController#agregar',
            'like' => 'LessonsController#like',
            'mis-cursos' => 'UserLessonsController#myLessons',
            'borrar' => 'UserLessonsController#borrar',
            'login' => 'UserController#logIn',
            'logout' => 'UserController#logOut',
            'userValidate' => 'UserController#userValidate',
            'signin' => 'UserController#signIn',
            'newUser' => 'UserController#newUser',
        ];
    }
?>