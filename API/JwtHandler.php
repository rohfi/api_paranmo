<?php
require 'php-jwt/vendor/autoload.php';

use Firebase\JWT\JWT;

class JwtHandler
{
    protected $jwt_secrect;
    protected $token;
    protected $issuedAt;
    protected $expire;
    protected $jwt;

    public function __construct()
    {
        date_default_timezone_set('Asia/Jakarta');
        $this->issuedAt = time();
        $this->jwt_secrect = "this_is_my_secrect";
        $this->expire = $this->issuedAt + 3600;
    }

    public function jwtEncodeData($iss, $data)
    {
        $this->token = array(
            "aud" => $iss,
            "iss" => $iss,
            "iat" => $this->issuedAt,
            "exp" => $this->expire,
            "data" => $data
        );
        $this->jwt = JWT::encode($this->token, $this->jwt_secrect, 'HS256');
        return $this->jwt;
    }

    public function jwtDecodeData($jwt_token)
    {
        try {
            $decode = JWT::decode($jwt_token, $this->jwt_secrect, array('HS256'));
            return [
                "data" => $decode->data
            ];
        } catch (Exception $e) {
            return [
                "message" => $e->getMessage()
            ];
        }
    }
}