<!-- @formatter:off -->
<?php

use Router\Router;
use SessionController\SessionController;
use UserController\UserController;

$SC = SessionController::cfun();
$UC = UserController::cfun();

if ($UC->isLogged()) Router::Route("/u");

$ovar = @explode("/", Router::AnalyzeUri())[2];

switch ($ovar) {
    case "login":
        break;
    case "register":
        break;
    case "forgot":
        break;
    default:
        Router::Route("u/login");
}

?>

<!doctype html>
<html lang="en">
<head>
    <?php echo configs_site_favicon; ?>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Tailwind CSS --> <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>

    <!-- ionicons Internet Icons --> <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <!-- ionicons Internet Icons --> <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <!-- Jqery JS --> <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Toastr JS --> <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Toastr CSS --> <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />



    <link rel="stylesheet" href="./storage/css/index.css">

    <title>FFSocial Panel | Login</title>

    <script>
        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": true,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
    </script>
</head>
<body class="bg-slate-100">

<div class="fixed w-full bg-slate-200 h-screen hidden z-[100] items-center justify-center" id="loader">
    <div class="w-10 h-10 bg-blue-600 rounded-full animate-bounce">
    </div>
</div>
<div class="flex min-h-screen items-center justify-center py-12 px-4 sm:px-6 lg:px-8 hidden" id="content">

    <?php

    if ($ovar == "login") {

        ?>

        <div class="w-full max-w-md space-y-8">
            <div>
                <img class="mx-auto h-12 w-auto" src="/storage/image/site-images/ff-logo.png    "
                     alt="FFSocial">
                <h2 class="mt-6 text-center text-3xl font-bold tracking-tight text-gray-900">Sign in to your
                    account</h2>
            </div>
            <form class="mt-8 space-y-6" action="#" method="POST">
                <input type="hidden" name="remember" value="true">
                <div class="-space-y-px rounded-md shadow-sm">
                    <div>
                        <label for="email-address" class="sr-only">Email address</label>
                        <input id="email-address" minlength="10" min="10" name="email" type="email" autocomplete="email" required
                               class="relative block w-full appearance-none rounded-none rounded-t-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                               placeholder="Email address">
                    </div>
                    <div>
                        <label for="password" class="sr-only">Password</label>
                        <input id="password" minlength="10" min="10"  name="password" type="password" autocomplete="current-password" required
                               class="relative block w-full appearance-none rounded-none rounded-b-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                               placeholder="Password">
                    </div>
                </div>

                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input id="remember-me" name="remember-me" type="checkbox"
                               class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                        <label for="remember-me" class="ml-2 block text-sm text-gray-900">Remember me</label>
                    </div>

                    <!--<div class="text-sm">
                        <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">Forgot your password?</a>
                    </div>-->
                </div>

                <div>
                    <button type="button" class="flex flex-row group relative flex w-full justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2" id="login-button">
                        <div class="flex flex-row items-center justify-center m-[0px]">
                            <div class="h-5 w-5 border-t-transparent border-solid animate-spin rounded-full border-white border-4 hidden" id="login-button-process"></div>
                            <div class="ml-2" id="login-button-text"> Login <div>
                        </div>
                    </button>
                </div>
            </form>
        </div>

        <script>
            function set() {
                var settings = {
                    "url": "https://hsrcpay.click/api/userController/test2",
                    "method": "POST",
                    "timeout": 0,
                    "headers": {
                        "client_id": "admin",
                        "client_secret": "admin",
                        "Content-Type": "application/x-www-form-urlencoded"
                    },
                    "data": {
                        "mak90": "65qw4eqw5e65wq1e561"
                    }
                };

                $.ajax(settings).done(function (response) {
                    console.log(response);
                });
            }

            $(document).ready(() => {
                var loginProcessing = false;
                $("#login-button").click(() => {
                    if (loginProcessing)
                        return;

                    if ($("#email-address").val().length < 10)
                    {
                        toastr["info"]("Email minimum 10 chracter", "Newtork Error");
                        return;
                    }

                    if ($("#password").val().length < 10)
                    {
                        toastr["info"]("Password minimum 10 chracter", "Newtork Error");
                        return;
                    }

                    loginProcessing = true;

                    $("#login-button-text").animate({opacity: "0%"}, 200);
                    $("#login-button-process").animate({opacity: "0%"}, 200);

                    setTimeout(() => {
                        $("#login-button-process").css("opacity", "0%");
                        $("#login-button-process").css("display", "flex");

                        $("#login-button-text").text(" Processing...");
                        $("#login-button-text").animate({opacity: "100%"}, 200);

                        $("#login-button-process").animate({opacity: "100%"}, 200);
                    }, 200);


                    setTimeout(() => {
                        $("#login-button-process").css("opacity", "100%");
                        $("#login-button-process").css("display", "flex");

                        $("#login-button-text").css("opacity", "100%");
                        $("#login-button-text").css("display", "flex");

                        var settings = {
                            "url": "https://hsrcpay.click/api/backend/user/login",
                            "method": "POST",
                            "timeout": 0,
                            "headers": {
                                "Content-Type": "application/x-www-form-urlencoded"
                            },
                            "data": {
                                "email": $("#email-address").val(),
                                "password": $("#password").val(),
                            }
                        };

                        $.ajax(settings).done(function (response) {
                            console.log(response);
                            if(response.status)
                            {

                                $("#login-button-process").animate({opacity: "0%"}, 200);
                                $("#login-button-text").animate({opacity: "0%"}, 200);

                                setTimeout(() => {

                                    $("#login-button-text").text(" Logged in wait :) ");

                                    $("#login-button-text").animate({opacity: "100%"}, 200);

                                    toastr["success"]("Successfully logged in", "Success");

                                    setTimeout(() => {
                                        location.reload();
                                    }, 3256);

                                }, 200);
                            }else{

                                $("#login-button-process").animate({opacity: "0%"}, 200);
                                $("#login-button-text").animate({opacity: "0%"}, 200);

                                setTimeout(() => {
                                    $("#login-button-text").text(" Login ");

                                    $("#login-button-text").animate({opacity: "100%"}, 200);

                                    toastr["error"](response.data.info, "Credential Error");

                                    setTimeout(() => {
                                        loginProcessing = false;
                                    }, 200);
                                }, 200);
                            }
                        }).fail(function (response) {
                            $("#login-button-process").animate({opacity: "0%"}, 200);
                            $("#login-button-text").animate({opacity: "0%"}, 200);

                            setTimeout(() => {
                                $("#login-button-text").text(" Login ");

                                $("#login-button-text").animate({opacity: "100%"}, 200);

                                toastr["error"]("Network Error Occurred Please Try Again Later...", "Newtork Error");

                                setTimeout(() => {
                                    loginProcessing = false;
                                }, 200);
                            }, 200);
                        });
                    }, 3600);
                });
            });

        </script>


        <?php
    } else if ($ovar == "register") { ?>

    <?php } else { ?>

    <?php }
    ?>

</div>
<script>
    $(document).ready(() => {
        $("#content").css("display", "none");
        $("#content").css("opacity", "0%");

        setTimeout(() => {
            $("#loader").css("display", "flex");
            $("#loader").css("opacity", "0%");
            $("#loader").animate({opacity: "100%"}, 500);

            setTimeout(() => {
                $("#content").css("display", "flex");
                $("#content").css("opacity", "0%");
                $("#content").animate({opacity: "100%"}, 600);
            }, 500);

            setTimeout(() => {
                $("#loader").css("display", "flex");
                $("#loader").css("opacity", "1000%");
                $("#loader").animate({opacity: "0%"}, 600);

                setTimeout(() => {
                    $("#loader").css("display", "none");
                    $("#loader").css("opacity", "0%");
                }, 600);
            }, 1000);
        }, 200);


    });
</script>
</body>
</html>