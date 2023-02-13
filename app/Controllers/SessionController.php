<?php

namespace SessionController;


class SessionController
{
    public function Get($key)
    {
        if (!session_id())
            session_start();

        return isset($_SESSION[$key]) ? $_SESSION[$key] : null;
        //return $this->dget($key);
    }

    public function Set($key, $val)
    {
        if (!session_id())
            session_start();

        $_SESSION[$key] = $val;
        //return $this->dset($key, $val);
    }

    public function ResetSessionData(): void
    {
        if (!session_id())
            session_start();

        session_destroy();
        //$this->RESETSESSION();
    }

    public function Close(): void
    {
        session_unset();
        session_destroy();
        session_commit();
    }

    public static function cfun($param = false)
    {
        if (!session_id() && !$param)
            session_start();
        else if (!session_id() && $param) {
            session_id($param);
            session_start();
        }

        return new SessionController();
    }
}