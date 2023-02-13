<?php

namespace FCrypter;


class FCrypter
{
    private $cipher = "hsrcpay";
    private $passSalt = "1234";

    public function getEncrypt($data)
    {

        return @openssl_encrypt($data, $this->cipher, $this->passSalt, $options = 0, 123);
    }

    public function getDecrypt($data)
    {

        return @openssl_decrypt($data, $this->cipher, $this->passSalt, $options = 0, 123);
    }

    public static function cfun()
    {
        return new FCrypter();
    }
}