<?php

define("URL", "http://localhost/cludeTCC");
define('CSS', URL . '/theme/assets/css');
define('JS', URL . '/theme/assets/js');
define('IMG', URL . '/theme/assets/img');
define('ICON', IMG . '/icons-boots');
define('TCC', IMG . '/Logos/grande_color.svg');
ini_set('display_errors', 0);
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

function redirect($path, $dados = [])
{
    if ($path) {
        header("Location: " . URL . $path);
    }
}

function url(string $path): string
{
    if ($path) {
        return URL . "{$path}";
    }
    return URL;
}

function message($nome, $texto = null, $classe = null)
{
    if (!empty($nome)) {
        if (!empty($texto) && empty($_SESSION[$nome])) {
            if (!empty($_SESSION[$nome])) {
                unset($_SESSION[$nome]);
            }
            $_SESSION[$nome] = $texto;
            $_SESSION[$nome . 'classe'] = $classe;
        } elseif (!empty($_SESSION[$nome]) && empty($texto)) {
            $classe = !empty($_SESSION[$nome . 'classe']) ? $_SESSION[$nome . 'classe'] : 'alert alert-success';
            echo "<div class='" . $classe . "'>" . $_SESSION[$nome] . "</div>";

            unset($_SESSION[$nome]);
            unset($_SESSION[$nome . 'classe']);
        }
    }
}

function uploadArquivo($error,$size ,$name, $tmp_name, $id_arquivo)
{

    if ($error) {
        die("Fala ao enviar arquivo");
    }

    if ($size > 5242880) {
        die("Arquivo muito grande! Máximo de arquivo 5MB");
    }
    $nm_arquivo = $name;
    $new_arquivo = $id_arquivo;
    $extensao = strtolower(pathinfo($nm_arquivo, PATHINFO_EXTENSION));
    
    if ($extensao != "jpg" && $extensao != "png" && $extensao != "gif" && $extensao != "jpeg" && $extensao != "pdf" && $extensao != "txt" && $extensao != "ppt") {
        return null;
    }elseif($extensao == "jpg" || $extensao == "png" || $extensao == "gif" || $extensao == "jpeg"){
        $pasta = "theme/assets/img/uploads/imgUpload/";
    }elseif($extensao == "pdf"){
        $pasta = "theme/assets/img/uploads/pdfUpload/";
    }elseif($extensao == "txt"){
        $pasta = "theme/assets/img/uploads/txtUpload/";
    }
    elseif($extensao == "ppt"){
        $pasta = "theme/assets/img/uploads/pptUpload/";
    }

    $path = $pasta . $new_arquivo . "." . $extensao;
    $move_file = move_uploaded_file($tmp_name, $path);
    if ($move_file) {
        return $path;
    } else {
        return null;
    }

    function reduzirDocs($nm_docs, $extensao){
        $minusculasNM = strtolower($nm_docs);
        $minusculasEX = strtolower($extensao);
        if($minusculasNM > 12){
            if ($minusculasEX == "txt") {
                $titulo_doc = substr($minusculasNM, 0, 5);
                echo $titulo_doc . $minusculasEX;
            } elseif ($minusculasEX == "ppt") {
                $titulo_doc = substr($minusculasNM, 0, 5);
                echo $titulo_doc . $minusculasEX;
            } elseif ($minusculasEX == "pdf") {
                $titulo_doc = substr($minusculasNM, 0, 5);
                echo $titulo_doc . $extensao;
            }elseif($minusculasEX == "png" || $minusculasEX == "gif" || $minusculasEX == "jpg" || $minusculasEX == "jpeg"){
                $titulo_doc = substr($minusculasNM, 0, 5);
                echo $titulo_doc . $extensao;
            }else{
                echo "Arquivo não encontrado ou inválido";
            }
        }

    }
}
