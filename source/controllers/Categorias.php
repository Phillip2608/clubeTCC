<?php

namespace Source\controllers;

use League\Plates\Engine;
use Source\models\Categoria;
use Source\models\TCC;
use Source\models\Pesquisas;
use Source\models\Docs;

class Categorias
{
    private $view;

    public function __construct($router)
    {
        $this->view = new Engine(dirname(__DIR__, 2) . "/theme/TCCweb/categoriasTCC", "php");
        $this->view->addData(["router" => $router]);
    }

    public function index()
    {
        $categorias = $this->allCategorias();
        $dados = [
            'titulo' => 'Categorias',
            'categorias' => $categorias
        ];

        echo $this->view->render("/index", ["dados" => $dados]);
    }


    public function humanas()
    {
        $url = $_SERVER['REQUEST_URI'];
        $var = explode("/", $url);
        $_SESSION['id_categoria'] = $var[4];
        $id_categoria = $_SESSION['id_categoria'];
        $categoria = $this->viewCategoria($id_categoria);
        $tccHumanas = $this->tccCategoria($id_categoria);
        $dados = [
            'titulo' => 'Humanas',
            'categoria' => $categoria,
            'tccsH' => $tccHumanas
        ];

        echo $this->view->render("/Humanas", ["dados" => $dados]);
    }

    public function exatas()
    {
        $url = $_SERVER['REQUEST_URI'];
        $var = explode("/", $url);
        $_SESSION['id_categoria'] = $var[4];
        $id_categoria = $_SESSION['id_categoria'];
        $categoria = $this->viewCategoria($id_categoria);
        $tccExatas = $this->tccCategoria($id_categoria);
        $dados = [
            'titulo' => 'Exatas',
            'categoria' => $categoria,
            'tccsE' => $tccExatas
        ];

        echo $this->view->render("/Exatas", ["dados" => $dados]);
    }

    public function biologicas()
    {
        $url = $_SERVER['REQUEST_URI'];
        $var = explode("/", $url);
        $_SESSION['id_categoria'] = $var[4];
        $id_categoria = $_SESSION['id_categoria'];
        $categoria = $this->viewCategoria($id_categoria);
        $tccBiologicas = $this->tccCategoria($id_categoria);
        $dados = [
            'titulo' => 'Biológicas',
            'categoria' => $categoria,
            'tccsB' => $tccBiologicas
        ];

        echo $this->view->render("/Biologicas", ["dados" => $dados]);
    }

    /**
     * CATEGORIAS
     * allCategorias
     * viewCategoria
     */
    private function allCategorias()
    {
        $categorias = (new Categoria())->find();
        $result = $categorias->fetch(true);
        return $result;
    }

    private function tccCategoria($id)
    {
        $params = http_build_query(["id" => $id]);
        $tccCategoria = (new TCC())->find("id_categoria = :id", $params);
        $result = $tccCategoria->fetch(true);
        return $result;
    }

    private function viewCategoria($id)
    {
        $params = http_build_query(["id" => $id]);
        $categorias = (new Categoria())->find("id_categoria = :id", $params);
        $result = $categorias->fetch();
        return $result;
    }


    private function viewTCC($id_tcc)
    {
        $params = http_build_query(["tcc" => $id_tcc]);
        $meuTCC = (new TCC())->find("id_tcc = :tcc", $params, "INNER JOIN tb_usuario ON tb_tcc.id_usuario = tb_usuario.id_usuario")->order("id_tcc DESC");
        $result = $meuTCC->fetch();
        return $result;
    }

    public function create($data = [])
    {
        $data_tcc = filter_var_array($data, FILTER_SANITIZE_STRING);
        $docs4 = $this->viewDocs4($data_tcc['id_viewTCC']);
        $pesquisas = $this->viewPesquisas3($data_tcc['id_viewTCC']);
        $viewTCC = [
            'tcc' => $this->viewTCC($data_tcc['id_viewTCC']),
            'docs' => $docs4,
            'pesq' => $pesquisas
        ];
        $callback["tcc"] = $this->view->render("/modalTCC", ["tcc" => $viewTCC]);
        echo json_encode($callback);
    }

    private function viewDocs4($id_tcc)
    {
        $params = http_build_query(["tcc" => $id_tcc]);
        $docs = (new Docs())->find("id_tcc = :tcc", $params, 'INNER JOIN tb_tipodocs ON tb_documento.id_tipoDocs = tb_tipodocs.id_tipoDocs')->order('tb_tipodocs.id_tipoDocs')->limit(4);
        $result = $docs->fetch(true);
        return $result;
    }

    private function viewPesquisas3($id_tcc)
    {
        $params = http_build_query(["tcc" => $id_tcc]);
        $pesquisas = (new Pesquisas())->find("id_tcc = :tcc", $params, "INNER JOIN tb_usuario ON tb_pesquisacampo.id_usuario = tb_usuario.id_usuario")->limit(3);
        $result = $pesquisas->fetch(true);
        return $result;
    }
}
