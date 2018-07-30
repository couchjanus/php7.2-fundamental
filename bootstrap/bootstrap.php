<?php

// Общие настройки

// Устанавливаем временную зону по умолчанию

if (function_exists('date_default_timezone_set')) {
    date_default_timezone_set('Europe/Kiev');    
}


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

// Ошибки и протоколирование
error_reporting(E_ALL | E_NOTICE | E_STRICT | E_DEPRECATED);

session_start();

require_once realpath(__DIR__).'/../config/app.php';

require_once CORE.'Connection.php';
require_once CORE.'View.php';
require_once CORE.'Slug.php';
require_once CORE.'Controller.php';

require_once MODELS.'Post.php';
require_once MODELS.'Category.php';
require_once MODELS.'Product.php';
require_once MODELS.'Picture.php';
require_once MODELS.'Role.php';
require_once MODELS.'User.php';
require_once CORE.'Request.php';
require_once CORE.'Router.php';

Router::load(CONFIG.'routes.php')
    ->directPath(Request::uri(), Request::method());
