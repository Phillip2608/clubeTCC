<?php

define("URL", "http://localhost/cludeTCC");
define('CSS', URL.'/theme/assets/css');
define('JS', URL.'/theme/assets/js');
define('IMG', URL.'/theme/assets/img');
define('ICON', IMG.'/icons-boots');
define('TCC', IMG . '/Logos/grande_color.svg');
ini_set('display_errors', 0 );
error_reporting(0);


define("DATA_LAYER_CONFIG", [
    "driver" => "mysql",
    "host" => "localhost",
    "port" => "3306",
    "dbname" => "clubedotcc",
    "username" => "root",
    "passwd" => "",
    "options" => [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::ATTR_CASE => PDO::CASE_NATURAL
    ]
]);

function redirect($path, $dados = []){
    if($path){
        header("Location: ".URL.$path);
    }
}

function url(string $path): string{
    if($path){
        return URL."{$path}";
    }
    return URL;
}

function message($nome, $texto = null, $classe = null){
    if(!empty($nome)){
        if(!empty($texto) && empty($_SESSION[$nome])){
            if(!empty($_SESSION[$nome])){
                unset($_SESSION[$nome]);
            }
            $_SESSION[$nome] = $texto;
            $_SESSION[$nome.'classe'] = $classe;
        }elseif(!empty($_SESSION[$nome]) && empty($texto)){
            $classe = !empty($_SESSION[$nome.'classe']) ? $_SESSION[$nome.'classe'] : 'alert alert-success';
            echo "<div class='".$classe."'>". $_SESSION[$nome] ."</div>";

            unset($_SESSION[$nome]);
            unset($_SESSION[$nome.'classe']);

        }
    }
}