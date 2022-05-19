<?php

namespace Source\controllers;

use League\Plates\Engine;
use Source\models\User;
use Source\models\Categoria;
use Source\models\TCC;
use Source\models\Pesquisas;


class Paginas{

    private $view;

    public function __construct($router)
    {   
        $this->view = new Engine(dirname(__DIR__, 2)."/theme/TCCweb/paginas", "php");
        $this->view->addData(["router" => $router]);
    }

    public function home(){
        $allTCCH = $this->allTCCs(1);
        $allTCCE = $this->allTCCs(2);
        $allTCCB = $this->allTCCs(3);
        $dados = [
            'humanas' => $allTCCH,
            'exatas' => $allTCCE,
            'biologicas' => $allTCCB
        ];
        echo $this->view->render("/home", ['dados' => $dados]);
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

    private function allTCCs($id_cater)
    {
        $params = http_build_query(["cater" => $id_cater]);
        $meuTCC = (new TCC())->find("id_categoria = :cater", $params)->order("id_tcc DESC");
        $result = $meuTCC->fetch(true);
        return $result;
    }

}