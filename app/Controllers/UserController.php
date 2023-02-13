<?php

namespace UserController;

use DATABASE\FFDatabase;
use FCrypter\FCrypter;
use Router\Router;
use SessionController\SessionController;
use UserModel\UserModel;

class UserController extends UserModel
{
    public function isLogged()
    {
        $SC = \SessionController\SessionController::cfun();
        $isLogged = $SC->Get("is_logged");

        if ($isLogged == true)
            return true;
        else
            return false;
    }


    public function login($email, $password): bool|array
    {
        $result = FFDatabase::cfun()->select("users")->where("email", $email)->where("password", $password)->run()->get();

        if ($result == "no-record")
            return false;
        else if (!$result)
            return false;
        else if (is_array($result))
            return $result;
        else
            return false;
    }


    public static function cfun()
    {
        return new UserController();
    }
}