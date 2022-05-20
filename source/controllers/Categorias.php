<?php

namespace Source\controllers;

use League\Plates\Engine;
use Source\models\Categoria;

class Categorias {
    private $view;

    public function __construct($router)
    {
        $this->view = new Engine(dirname(__DIR__, 2) . "/theme/TCCweb/categoriasTCC", "php");
        $this->view->addData(["router" => $router]);
    }

    public function index(){
        $categorias = $this->allCategorias();
        $dados = [
            'titulo' => 'Categorias',
            'categorias' => $categorias
        ];

        echo $this->view->render("/index", ["dados" => $dados]);
    }

    /**
     * CATEGORIAS
     * allCategorias
     */
    private function allCategorias()
    {
        $categorias = (new Categoria())->find();
        $result = $categorias->fetch(true);
        return $result;
    }
}