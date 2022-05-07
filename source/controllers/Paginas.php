<?php

namespace Source\controllers;

use League\Plates\Engine;

class Paginas{

    private $view;

    public function __construct($router)
    {   
        $this->view = new Engine(dirname(__DIR__, 2)."/theme/TCCweb/paginas", "php");
        $this->view->addData(["router" => $router]);
    }

    public function home(){
        echo $this->view->render("/home");
    }

    public function comunidade(){
        echo $this->view->render("/comunidade");
    }

    public function noticias(){
        echo $this->view->render("/noticias");
    }

    public function planos(){
        echo $this->view->render("/planos");
    }

    public function error($data){
        echo "<h1>Error {$data['errcode']}</h1>";
        var_dump($data);
    }

}