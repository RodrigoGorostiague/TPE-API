<?php
class SecuredController extends Controller
{
    function __construct()
    {
        session_start();
        if (isset($_SESSION['USER'])) {
            if (time() - $_SESSION['LAST_ACTIVITY'] > 1800) {
                echo header('Location: http://' . $_SERVER['SERVER_NAME'] . dirname($_SERVER['PHP_SELF']) . '/logout');
                die();
            }
            $_SESSION['LAST_ACTIVITY'] = time();
        }
    }
}
