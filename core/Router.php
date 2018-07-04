<?php

switch ($_SERVER['REQUEST_URI']) {
        case '/':
            # code...
            require_once CONTROLLERS.'HomeController.php';
            break;
        case '/about':
            # code...
            require_once CONTROLLERS.'AboutController.php';
            break;
        case '/contact':
            # code...
            require_once CONTROLLERS.'ContactController.php';
            break;
        default:
            # code...
            echo '<h2>',$uri, '</h2>';
            require_once VIEWS.'errors/404.php';
    }


function getURI()
{
    return $_SERVER['REQUEST_URI'];
}

// function getURI()
// {
//        return trim($_SERVER['REQUEST_URI'], '/');
// }

// function getUrl() 
// {
//     $url  = ( $_SERVER["HTTPS"] != 'on' ) ? 'http://'.$_SERVER["SERVER_NAME"] :  'https://'.$_SERVER["SERVER_NAME"];
//     $url .= ( $_SERVER["SERVER_PORT"] != 80 ) ? ":".$_SERVER["SERVER_PORT"] : "";
//     $url .= $_SERVER["REQUEST_URI"];
//     return $url;
// }    

// function getURI()
// {
//     if (isset($_SERVER['REQUEST_URI']) and !empty($_SERVER['REQUEST_URI']))
//         return trim($_SERVER['REQUEST_URI'], '/');
// }
//получаем строку запроса
// $uri = getURI();

//     switch ($uri) {
//         case '':
//             # code...
//             require_once CONTROLLERS.'HomeController.php';
//             break;
//         case 'about':
//             # code...
//             require_once CONTROLLERS.'AboutController.php';
//             break;
//         case 'contact':
//             # code...
//             require_once CONTROLLERS.'ContactController.php';
//             break;
//         default:
//             # code...
//             require_once VIEWS.'errors/404.php';
//     }
