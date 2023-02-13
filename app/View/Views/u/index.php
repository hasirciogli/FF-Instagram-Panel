<?php

$UC = \UserController\UserController::cfun();

if (!$UC->isLogged())
    \Router\Router::Route("/u/login");

//include __DIR__ . "/home.php";

$UC = \UserController\UserController::cfun();

$lUri = @explode("/", \Router\Router::AnalyzeUri())[2];



$needReg = __DIR__ . "/dpages/add.php";

if (isset($lUri) && strlen($lUri) > 0 && $lUri != "" && $lUri != "/")
{
    switch ($lUri)
    {
        case "add":
            $needReg = __DIR__ . "/dpages/add.php";
            break;
        case "pricelist":
            $needReg = __DIR__ . "/dpages/pricelist.php";
            break;
        default:
            \Router\Router::Route("u/add");
            break;
    }
}
else{
    \Router\Router::Route("u/add");
}


?>

<!doctype html>
<html lang="en" class="scroll-smooth">
<head>
    <?php echo configs_site_favicon; ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Tailwind CSS --> <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>

    <!-- ionicons Internet Icons --> <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <!-- ionicons Internet Icons --> <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <!-- Jqery JS --> <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Toastr JS --> <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Toastr CSS --> <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />



    <link rel="stylesheet" href="<?php echo configs_host_ssl . "://". configs_host_domain . "/storage/css/index.css" ?>">

    <title>FFSocial Panel | Make You Public</title>

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

<div class="fixed w-full bg-slate-200 h-screen z-[100] items-center justify-center" id="loader">
    <div class="w-10 h-10 bg-blue-600 rounded-full animate-bounce"></div>
</div>
<div class="flex min-h-screen hidden" id="content">
    <div class="flex w-full h-sceen bg-white">


        <div class="flex flex-col min-w-[100px] max-w-[100px] h-screen bg-white border-r border-r-slate-200" id="left-sidebar">
            <div class="flex flex-row w-full min-h-[100px] overflow-hidden">
                <h1 class="min-w-[100px] h-full flex items-center justify-center text-5xl font-semibold" id="ffpanel-title">FF</h1>
                <h1 class="min-w-[100px] h-full flex items-center justify-center text-5xl font-semibold opacity-0" id="ffpanel-title-collapsed">FFPanel</h1>
            </div>

            <div class="w-full h-full">
                <a href="/u/add" class="flex flex-row w-full min-h-[60px] overflow-hidden">
                    <h1 class="min-w-[100px] h-[60px] flex items-center justify-center text-3xl font-semibold duration-300 hover:text-white hover:bg-blue-400 hover:cursor-pointer" id="ffpanel-item1">
                        <ion-icon name="add-circle-outline"></ion-icon>
                    </h1>
                    <h1 class="min-w-[100px] h-[60px] flex items-center justify-center text-3xl font-semibold duration-300 hover:text-white hover:bg-blue-400 opacity-0 pl-10 hover:cursor-pointer" id="ffpanel-item1-collapsed">
                        <ion-icon name="add-circle-outline"></ion-icon>
                        <div class="flex items-center pl-3 w-full h-[60px] text-lg">
                            Yeni Sipariş
                        </div>
                    </h1>
                </a>


                <a href="/u/pricelist" class="flex flex-row w-full min-h-[60px] overflow-hidden">
                    <h1 class="min-w-[100px] h-[60px] flex items-center justify-center text-3xl font-semibold duration-300 hover:text-white hover:bg-blue-400 hover:cursor-pointer" id="ffpanel-item2">
                        <ion-icon name="pricetags-outline"></ion-icon>
                    </h1>
                    <h1 class="min-w-[100px] h-[60px] flex items-center justify-center text-3xl font-semibold duration-300 hover:text-white hover:bg-blue-400 opacity-0 pl-10 hover:cursor-pointer" id="ffpanel-item2-collapsed">
                        <ion-icon name="pricetags-outline"></ion-icon>
                        <div class="flex items-center pl-3 w-full h-[60px] text-lg">
                            Fiyat Listesi
                        </div>
                    </h1>
                </a>


                <a href="/u/orders" class="flex flex-row w-full min-h-[60px] overflow-hidden">
                    <h1 class="min-w-[100px] h-[60px] flex items-center justify-center text-3xl font-semibold duration-300 hover:text-white hover:bg-blue-400 hover:cursor-pointer" id="ffpanel-item3">
                        <ion-icon name="cart-outline"></ion-icon>
                    </h1>
                    <h1 class="min-w-[100px] h-[60px] flex items-center justify-center text-3xl font-semibold duration-300 hover:text-white hover:bg-blue-400 opacity-0 pl-10 hover:cursor-pointer" id="ffpanel-item3-collapsed">
                        <ion-icon name="cart-outline"></ion-icon>
                        <div class="flex items-center pl-3 w-full h-[60px] text-lg">
                            Siparişlerim
                        </div>
                    </h1>
                </a>


                <a href="/u/wallet" class="flex flex-row w-full min-h-[60px] overflow-hidden">
                    <h1 class="min-w-[100px] h-[60px] flex items-center justify-center text-3xl font-semibold duration-300 hover:text-white hover:bg-blue-400 hover:cursor-pointer" id="ffpanel-item4">
                        <ion-icon name="wallet-outline"></ion-icon>
                    </h1>
                    <h1 class="min-w-[100px] h-[60px] flex items-center justify-center text-3xl font-semibold duration-300 hover:text-white hover:bg-blue-400 opacity-0 pl-10 hover:cursor-pointer" id="ffpanel-item4-collapsed">
                        <ion-icon name="wallet-outline"></ion-icon>
                        <div class="flex items-center pl-3 w-full h-[60px] text-lg">
                            Cüzdan
                        </div>
                    </h1>
                </a>


                <a href="/u/support" class="flex flex-row w-full min-h-[60px] overflow-hidden">
                    <h1 class="min-w-[100px] h-[60px] flex items-center justify-center text-3xl font-semibold duration-300 hover:text-white hover:bg-blue-400 hover:cursor-pointer" id="ffpanel-item5">
                        <ion-icon name="help-buoy-outline"></ion-icon>
                    </h1>
                    <h1 class="min-w-[100px] h-[60px] flex items-center justify-center text-3xl font-semibold duration-300 hover:text-white hover:bg-blue-400 opacity-0 pl-10 hover:cursor-pointer" id="ffpanel-item5-collapsed">
                        <ion-icon name="help-buoy-outline"></ion-icon>
                        <div class="flex items-center pl-3 w-full h-[60px] text-lg">
                            Destek
                        </div>
                    </h1>
                </a>

            </div>
        </div>


        <div class="flex flex-col w-full h-screen bg-slate-100">


            <div class="flex w-full h-[100px] bg-white border-b border-1 border-b-slate-200">
                <div class="flex h-[100px] min-w-[100px] w-[100px] items-center justify-center text-[#4338ca] hover:cursor-pointer" id="sidebar-collapser">
                    <ion-icon name="caret-forward-outline" class="text-3xl"></ion-icon>
                </div>
                <div class="flex items-center justify-end w-full h-[100px]">
                    <div class="flex flex-row items-center justify-end pr-10 w-[400px] h-full">

                        <div class="flex flwex-row h-8 items-center justify-end px-2 min-w-[100px] rounded text-lg mr-4 bg-blue-600">
                            <span class="mx-2 text-white font-semibold">15,<span class="text-sm">000231548</span> ₺</span>
                            <ion-icon name="card" class="text-white"></ion-icon>
                        </div>

                        <div class="text-lg mr-4 duration-300 hover:cursor-pointer">
                            <ion-icon name="notifications-sharp"></ion-icon>
                        </div>

                        <div class="text-lg duration-300 hover:cursor-pointer">
                            <ion-icon name="person-sharp"></ion-icon>
                        </div>

                    </div>
                </div>
            </div>

            <div class="flex h-full w-full">

                <?php

                require $needReg;

                ?>
            </div>

        </div>
    </div>
</div>


<script>
    $(document).ready(() => {
        $("#loader").css("display", "none");
        $("#loader").css("opacity", "0%");

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

<script src="/storage/js/userside/sidebar_collapser.js"></script>

</body>
</html>
