<?php

require __DIR__ . "/../internal_funcs/PluginBaseController.php";

class PluginController
{
    public function run($params)
    {
        //die("ok" . var_dump($params));
    }

    public function login($params)
    {
        if (!PBSController::cfun()->requireOnlyPost())
            makeResponse(400, "Bad Request", false, [
                "err" => "you just need a post request",
            ]);

        if (!PBSController::cfun()->checkNullOrBlankInPost(["email", "password"], 10))
            makeResponse(400, "Bad Request", false, [
                "err" => "please use correct post parameters",
            ]);

        if (!@$_COOKIE["PHPSESSID"])
            makeResponse(400, "Bad Request", false, [
                "err" => "please use correct post parameters sesid ?",
            ]);


        // TODO: do login here...
        // example: YourInternalUserController()->cfun()->login($_POST["username"], $_POST["password"]);

        $uc = \UserController\UserController::cfun();
        $sc = \SessionController\SessionController::cfun($_COOKIE["PHPSESSID"]);
        $res = $uc->login($_POST["email"], $_POST["password"]);

        if (is_array($res)) {
            $sc->Set("is_logged", true);
            $sc->Set("user_uid", $res["id"]);

            makeResponse(200, "Success", true, [
                "info" => "Successfully logged in",
                "userFields" => [
                    "uid" => $res["id"],
                    "username" => $_POST["email"],
                    "password" => $_POST["password"]
                ]
            ]);
        }

        makeResponse(200, "unsuccess", false, [
            "info" => "invalid credentialss",
            "err" => "please use correct post user credentials",
        ]);

        makeResponse(500, "Internal Server Error", false, [
            "err" => "Function is blank",
        ]);
    }

    public static function cfun($params)
    {
        $pc = new PluginController();
        $pc->run($params);
        return $pc;
    }
}