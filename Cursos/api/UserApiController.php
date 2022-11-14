<?php
require_once("./model/UserModel.php");
require_once("./Helpers/AuthApiHelper.php");
require_once("./api/JSONView.php");

class UserApiController
{
    private $model;
    private $view;
    private $authHelper;
    public function __construct()
    {
        $this->model = new UserModel();
        $this->view = new JSONView();
        $this->authHelper = new AuthApiHelper();
    }
    public function getToken()
    {
        $user = $this->userApiVerify();
        if ($user) {
            $token = $this->authHelper->setToken($user);
            $payload = $this->authHelper->getPayload($token);
            $admin = 1;
            $update = $this->model->updateUser($token, $payload->iat, $payload->exp, $admin, $payload->id);
            if (isset($update)) {
                $this->view->response("Update succefully", 200);
            } else {
                $this->view->response("Failed", 500);
            }
        } else {
            $this->view->response("Acceso denegado", 401);
        }
    }
    public function getUser($params = null)
    {
        $id = $params[":ID"];
        $user = $this->authHelper->getUser();
        if ($user) {
            if ($id == $user->id) {
                $this->view->response($user, 200);
            } else {
                $this->view->response("Forbiden", 403);
            }
        } else {
            $this->view->response("Unautorized", 401);
        }
    }
    function userApiVerify()
    {
        $userpass = $this->authHelper->getBasic();
        $user = $this->model->getUser($userpass['user']);
        $password = $userpass['pass'];
        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }
    }
}
