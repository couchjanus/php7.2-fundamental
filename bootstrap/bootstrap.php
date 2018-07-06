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

function render($path, $data = [])
{
    extract($data);
    return require VIEWS."/{$path}.php";
}

require_once realpath(__DIR__).'/../config/app.php';

require_once CORE.'Router.php';
