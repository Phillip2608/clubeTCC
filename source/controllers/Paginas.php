<?php

namespace Source\controllers;

use League\Plates\Engine;
use Source\models\TCC;
use Source\models\Pesquisas;
use Source\models\Docs;


class Paginas{

    private $view;

    public function __construct($router)
    {   
        $this->view = new Engine(dirname(__DIR__, 2)."/theme/TCCweb/paginas", "php");
        $this->view->addData(["router" => $router]);
    }

    public function home(){
        $allTCCs = $this->allTCCs();
        $dados = [
            'tccs' => $allTCCs
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

    private function allTCCs()
    {
        
        $meuTCC = (new TCC())->find("", "", "INNER JOIN tb_usuario ON tb_tcc.id_usuario = tb_usuario.id_usuario")->order("id_tcc DESC");
        $result = $meuTCC->fetch(true);
        return $result;
    }

    private function viewTCC($id_tcc)
    {
        $params = http_build_query(["tcc" => $id_tcc]);
        $meuTCC = (new TCC())->find("id_tcc = :tcc", $params, "INNER JOIN tb_usuario ON tb_tcc.id_usuario = tb_usuario.id_usuario")->order("id_tcc DESC");
        $result = $meuTCC->fetch();
        return $result;
    }

    public function create($data=[]){
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

    private function viewDocs4($id_tcc){
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