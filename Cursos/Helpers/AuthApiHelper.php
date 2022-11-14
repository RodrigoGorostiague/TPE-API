<?php
function base64url_encode($data)
{
    return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
}
class AuthApiHelper
{
    private $key;
    function __construct()
    {
        $this->key = "WEB2";
    }
    function getBasic()
    {
        $header = $this->getHeader();
        if (strrpos($header, "Basic ") === 0) {
            $usrpss = explode(" ", $header)[1];
            $usrpss = base64_decode($usrpss);
            $usrpss = explode(":", $usrpss);
            if (count($usrpss) == 2) {
                $user = $usrpss[0];
                $pass = $usrpss[1];
                return array(
                    "user" => $user,
                    "pass" => $pass,
                );
            }
        }
    }
    function getHeader()
    {
        if (isset($_SERVER["REDIRECT_HTTP_AUTHORIZATION"])) {
            return $_SERVER["REDIRECT_HTTP_AUTHORIZATION"];
        }
        if (isset($_SERVER["HTTP_AUTHORIZATION"])) {
            return $_SERVER["HTTP_AUTHORIZATION"];
        }
        return null;
    }
    function setToken($user)
    {
        $time = time();
        $header = array(
            'typ' => 'JWT',
            'alg' => 'HS256',
        );
        $payload = array(
            'id' => $user['id'],
            'name' => $user['username'],
            'iat' => $time,
            'exp' => $time + (60 * 60 * 24 * 30),
            'admin' => true,
        );
        $header = json_encode($header);
        $payload = json_encode($payload);
        $header = base64url_encode($header);
        $payload = base64url_encode($payload);
        $signature = hash_hmac("SHA256", "$header.$payload. $this->key", true);
        $signature = base64url_encode($signature);
        return "$header.$payload.$signature";
    }
    function getUser()
    {
        $header = $this->getHeader();
        if (strrpos($header, "Bearer ") === 0) {
            $token = explode(" ", $header)[1];
            return $this->getPayload($token);
        } else {
            return null;
        }
    }
    function getPayload($token)
    {
        $elements = explode(".", $token);
        if (count($elements) === 3) {
            $header = $elements[0];
            $payload = $elements[1];
            $signature = $elements[2];
            $new_signature = hash_hmac("SHA256", "$header.$payload. $this->key", true);
            $new_signature = base64url_encode($new_signature);
            if ($signature == $new_signature) {
                $payload = base64_decode($payload);
                $payload = json_decode($payload);
                return $payload;
            }
        }
    }
}
