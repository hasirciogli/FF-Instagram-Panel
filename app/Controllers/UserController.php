<?php

namespace UserController;

use Router\Router;
use SessionController\SessionController;
use UserModel\UserModel;

class UserController extends UserModel
{
    public function isLogged()
    {
        return false;
    }


    public static function cfun()
    {
        return new UserController();
    }
}