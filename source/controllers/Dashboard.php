<?php

namespace Source\controllers;

use League\Plates\Engine;
use Source\models\Cargo;
use Source\models\Docs;
use Source\models\Funcao;
use Source\models\Integrante;
use Source\models\Pesquisas;
use Source\models\TCC;

class Dashboard
{
    private $view;

    public function __construct($router)
    {
        $this->view = new Engine(dirname(__DIR__, 2) . "/theme/TCCweb/dashboard", "php");
        $this->view->addData(["router" => $router]);
    }

    public function index()
    {
        $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if (isset($formulario)) {
            $dados = [
                'nomeTCC' => trim($formulario['nm_tcc']),
                'meusTCC' => $this->meusTCC($_SESSION['id_usuario'])
            ];
            if (in_array("", $formulario)) {
                if (empty($formulario['nm_tcc'])) {
                    $dados['erroTCC'] = "Digite o nome do projeto!";
                }
            } else {
                $this->criarTCC($dados['nomeTCC']);
                redirect("/dashboard/index/" . $_SESSION['id_usuario']);
            }
        } else {
            $dados = [
                'nomeTCC' => '',
                'erroTCC' => '',
                'meusTCC' => $this->meusTCC($_SESSION['id_usuario'])
            ];
            echo $this->view->render("/index", ["dados" => $dados]);
        }
    }
    public function geral()
    {
        $url = $_SERVER['REQUEST_URI'];
        $var = explode("/", $url);
        $_SESSION['id_tcc'] = $var[5];
        $id_tcc = $_SESSION['id_tcc'];
        $id_user = $var[4];
        $tcc = $this->meuTCC($id_tcc);
        $docs = $this->documentos($id_tcc);
        $inter = $this->integrantes3($id_tcc);
        $pesquisas = $this->viewPesquisas3($id_tcc);

        $umInter = $this->UMintegrante($id_user, $id_tcc);
        if ($umInter->id_tcc == $id_tcc) {
            $dados = [
                'titulo' => 'Visão Geral',
                'tcc' => $tcc,
                'docs' => $docs,
                'inter' => $inter,
                'pesquisas' => $pesquisas
            ];
            if (isset($dados['tcc']->id_tcc)) {
                if ($dados['tcc']->id_usuario == $id_user) {
                    echo $this->view->render("/geral", ["dados" => $dados]);
                } else {
                    redirect("/dashboard/index/" . $id_user, $dados);
                }
            }
        } else {
            $this->addUserInter($id_user, $id_tcc, 1);
            $dados = [
                'titulo' => 'Visão Geral',
                'tcc' => $tcc,
                'docs' => $docs,
                'inter' => $inter,
                'pesquisas' => $pesquisas
            ];


            if (isset($dados['tcc']->id_tcc)) {
                if ($dados['tcc']->id_usuario == $id_user) {
                    echo $this->view->render("/geral", ["dados" => $dados]);
                } else {
                    redirect("/dashboard/index/" . $id_user, $dados);
                }
            }
        }
    }

    public function dadosgerais()
    {
        $id_tcc = $_SESSION['id_tcc'];
        $inter = $this->integrantes($id_tcc);
        $tcc = $this->meuTCC($id_tcc);
        $cargo = $this->viewCargo();
        $funcao = $this->viewFuncao();
        $nm_tcc = $_POST['nm_tcc'];
        $ds_tcc = $_POST['ds_tcc'];
        if (isset($nm_tcc) || isset($ds_tcc)) {
            $dados = [
                'titulo' => 'Dados Gerais',
                'inter' => $inter,
                'tcc' => $tcc,
                'nm_tcc' => $nm_tcc,
                'ds_tcc' => $ds_tcc
            ];

            if (($nm_tcc == null) || ($ds_tcc == null)) {
                if (empty($nm_tcc)) {
                    $dados['nm_erro'] = "Seu TCC deve possuir um nome!";
                    echo $this->view->render("/dadosgerais", ["dados" => $dados]);
                } elseif (empty($ds_tcc)) {
                    $dados['tcc']->nm_tcc = $dados['nm_tcc'];
                    $dados['tcc']->ds_tcc = $dados['ds_tcc'];
                    $dados['tcc']->save();
                    message('Confirma', 'Atualização feita com sucesso');
                    redirect("/dashboard/dadosgerais/{$_SESSION['id_usuario']}/{$_SESSION['id_tcc']}", $dados);
                } else {
                    return false;
                }
            } else {
                $dados['tcc']->nm_tcc = $dados['nm_tcc'];
                $dados['tcc']->ds_tcc = $dados['ds_tcc'];
                $dados['tcc']->save();
                message('Confirma', 'Atualização feita com sucesso');
                redirect("/dashboard/dadosgerais/{$_SESSION['id_usuario']}/{$_SESSION['id_tcc']}", $dados);
            }
        } else {
            $dados = [
                'titulo' => 'Dados Gerais',
                'inter' => $inter,
                'tcc' => $tcc,
                'nm_tcc' => '',
                'ds_tcc' => '',
                'nm_erro' => '',
                'cargo' => $cargo,
                'funcao' => $funcao
            ];
            echo $this->view->render("/dadosgerais", ["dados" => $dados]);
        }
    }

    public function pesquisacampo()
    {
        $id_tcc = $_SESSION['id_tcc'];
        $id_user = $_SESSION['id_usuario'];
        $nm_titulo = $_POST['nm_titulo'];
        $ds_link = $_POST['ds_link'];
        $ds_pesquisa = $_POST['ds_pesquisa'];
        $pesquisas = $this->viewPesquisas($id_tcc);
        if ((isset($nm_titulo)) || (isset($ds_link)) || (isset($ds_pesquisa))) {
            $dados = [
                'titulo' => 'Pesquisa de Campo',
                'pesquisas' => $pesquisas,
                'nm_titulo' => $nm_titulo,
                'ds_link' => $ds_link,
                'ds_pesquisa' => $ds_pesquisa
            ];
            if (!$nm_titulo || !$ds_link) {
                if (empty($nm_titulo)) {
                    $dados['nm_erro'] = "Sua pesquisa deve possuir um título!";
                    echo $this->view->render("/pesquisacampo", ['dados' => $dados]);
                } elseif (empty($ds_link)) {
                    $dados['link_erro'] = "Sua pesquisa deve possuir um link!";
                    echo $this->view->render("/pesquisacampo", ['dados' => $dados]);
                } else {
                    message('Pesquisa', 'Problemas ao adicionar sua pesquisa, tente novamente!', 'alert alert-danger');
                    redirect("/dashboard/pesquisacampo/{$_SESSION['id_usuario']}/{$_SESSION['id_tcc']}");
                }
            } else {
                $link_curto = explode("/", $dados['ds_link']);
                $link_longo = explode("/", $dados['ds_link']);;
                if ($link_curto[2] != "forms.gle") {
                    if ($link_longo[2] == "docs.google.com" || $link_longo[3] == "forms") {
                        $this->criarPesquisa($id_tcc, $id_user, $dados['nm_titulo'], $dados['ds_link'], $dados['ds_pesquisa']);
                        message('Pesquisa', 'Pesquisa adicionada com sucesso!');
                        redirect("/dashboard/pesquisacampo/{$_SESSION['id_usuario']}/{$_SESSION['id_tcc']}", $dados);
                    }
                    $dados['link_erro'] = "Não suportamos esse tipo de link";
                    echo $this->view->render("/pesquisacampo", ['dados' => $dados]);
                } else {
                    $this->criarPesquisa($id_tcc, $id_user, $dados['nm_titulo'], $dados['ds_link'], $dados['ds_pesquisa']);
                    message('Pesquisa', 'Pesquisa adicionada com sucesso!');
                    redirect("/dashboard/pesquisacampo/{$_SESSION['id_usuario']}/{$_SESSION['id_tcc']}", $dados);
                }
            }
        } else {
            $dados = [
                'titulo' => 'Pesquisa de Campo',
                'nm_titulo' => '',
                'ds_link' => '',
                'ds_pesquisa' => '',
                'nm_erro' => '',
                'pesquisas' => $pesquisas
            ];
            echo $this->view->render("/pesquisacampo", ['dados' => $dados]);
        }
    }

    public function editPesquisa()
    {
        $id_search = $_POST['idPesquisa'];
        $nm_titulo = $_POST['titleEdit'];
        $ds_link = $_POST['linkEdit'];
        $ds_pesquisa = $_POST['descEdit'];
        $pesquisa = $this->viewPesquisa($id_search);
        if (isset($id_search, $nm_titulo, $ds_link, $ds_pesquisa)) {
            $dados = [
                'id_search' => $id_search,
                'titleEdit' => $nm_titulo,
                'linkEdit' => $ds_link,
                'descEdit' => $ds_pesquisa,
                'pesquisa' => $pesquisa
            ];

            if (!$id_search || !$nm_titulo || !$ds_link) {
                if (empty($id_search)) {
                    redirect("/dashboard/pesquisacampo/{$_SESSION['id_usuario']}/{$_SESSION['id_tcc']}", $dados);
                }

                if (empty($nm_titulo)) {
                    message('errorEdit', 'Sua pesquisa deve possuir ao menos um título!', 'alert alert-danger');
                    redirect("/dashboard/pesquisacampo/{$_SESSION['id_usuario']}/{$_SESSION['id_tcc']}");
                }
                if (empty($ds_link)) {
                    message('errorEdit', 'Sua pesquisa deve possuir ao menos um link!', 'alert alert-danger');
                    redirect("/dashboard/pesquisacampo/{$_SESSION['id_usuario']}/{$_SESSION['id_tcc']}");
                }
            } else {
                $dados['pesquisa']->nm_titulo = $dados['titleEdit'];
                $dados['pesquisa']->ds_link = $dados['linkEdit'];
                $dados['pesquisa']->ds_pesquisa = $dados['descEdit'];
                $dados['pesquisa']->save();
                redirect("/dashboard/pesquisacampo/{$_SESSION['id_usuario']}/{$_SESSION['id_tcc']}", $dados);
            }
        } else {
            $dados = [
                'id_search' => '',
                'titleEdit' => '',
                'linkEdit' => '',
                'descEdit' => '',
                'pesquisa' => ''
            ];

            redirect("/dashboard/pesquisacampo/{$_SESSION['id_usuario']}/{$_SESSION['id_tcc']}", $dados);
        }
    }

    public function deletePesquisa()
    {
        $id_search = $_POST['idPesquisa'];
        $pesquisa = $this->viewPesquisa($id_search);
        $params = http_build_query([":pesquisa" => $id_search]);
        $pesquisa->delete("id_pesquisa = :pesquisa", $params);
        message('Pesquisa', 'Pesquisa deletada com sucesso!');
        redirect("/dashboard/pesquisacampo/{$_SESSION['id_usuario']}/{$_SESSION['id_tcc']}");
    }

    /**
     * TCC
     * meuTCC
     * meusTCC
     * criarTCC
     */
    private function meuTCC($id_tcc)
    {
        $params = http_build_query([":id" => $id_tcc]);
        $meuTCC = (new TCC())->find("id_tcc = :id", $params);
        $result = $meuTCC->fetch();
        return $result;
    }

    private function meusTCC($id)
    {
        $params = http_build_query(["usuario" => $id]);
        $meuTCC = (new TCC())->find("id_usuario = :usuario", $params)->order("id_tcc DESC");
        $result = $meuTCC->fetch(true);
        return $result;
    }

    private function criarTCC($nomeTCC)
    {
        $tcc = new TCC();
        $tcc->nm_tcc = $nomeTCC;
        $tcc->id_usuario = $_SESSION['id_usuario'];
        $tcc->save();
    }

    /**
     * INTEGRANTE
     * addUserInter
     * UMintegrante
     * integrantes3
     * integrantes
     */

    private function addUserInter($id_user, $id_tcc, $id_cargo = null, $id_funcao = null)
    {
        $inter = new Integrante();
        $inter->id_usuario = $id_user;
        $inter->id_tcc = $id_tcc;
        $inter->id_cargo = $id_cargo;
        $inter->id_funcao = $id_funcao;
        $inter->save();
    }

    private function UMintegrante($id_user, $id_tcc)
    {
        $params = http_build_query(["user" => $id_user, "tcc" => $id_tcc]);
        $um_inter = (new Integrante())->find("id_usuario = :user AND id_tcc = :tcc", $params);
        $result = $um_inter->fetch();
        return $result;
    }

    private function integrantes3($id_tcc)
    {
        $params = http_build_query(["tcc" => $id_tcc]);
        $um_inter = (new Integrante())->find("id_tcc = :tcc", $params, "INNER JOIN tb_usuario ON tb_integrante.id_usuario = tb_usuario.id_usuario INNER JOIN tb_cargo ON tb_integrante.id_cargo = tb_cargo.id_cargo")->limit(3);
        $result = $um_inter->fetch(true);
        return $result;
    }

    private function integrantes($id_tcc)
    {
        $params = http_build_query(["tcc" => $id_tcc]);
        $um_inter = (new Integrante())->find("id_tcc = :tcc", $params, "INNER JOIN tb_usuario ON tb_integrante.id_usuario = tb_usuario.id_usuario INNER JOIN tb_cargo ON tb_integrante.id_cargo = tb_cargo.id_cargo");
        $result = $um_inter->fetch(true);
        return $result;
    }

    /**
     * PESQUISA DE CAMPO
     * viewPesquisa
     * viewPesquisas3
     * viewPesquisas
     * criarPesquisa
     */

    private function viewPesquisa($id_pesquisa)
    {
        $params = http_build_query(["id_pesq" => $id_pesquisa]);
        $pesquisas = (new Pesquisas())->find("id_pesquisa = :id_pesq", $params);
        $result = $pesquisas->fetch();
        return $result;
    }

    private function viewPesquisas3($id_tcc)
    {
        $params = http_build_query(["tcc" => $id_tcc]);
        $pesquisas = (new Pesquisas())->find("id_tcc = :tcc", $params, "INNER JOIN tb_usuario ON tb_pesquisacampo.id_usuario = tb_usuario.id_usuario")->limit(3);
        $result = $pesquisas->fetch(true);
        return $result;
    }

    private function viewPesquisas($id_tcc)
    {
        $params = http_build_query(["tcc" => $id_tcc]);
        $pesquisas = (new Pesquisas())->find("id_tcc = :tcc", $params, "INNER JOIN tb_usuario ON tb_pesquisacampo.id_usuario = tb_usuario.id_usuario");
        $result = $pesquisas->fetch(true);
        return $result;
    }

    private function criarPesquisa($id_tcc, $id_user, $nm_titulo, $ds_link, $ds_pesquisa = null)
    {
        $pesquisa = new Pesquisas();
        $pesquisa->id_usuario = $id_user;
        $pesquisa->id_tcc = $id_tcc;
        $pesquisa->nm_titulo = $nm_titulo;
        $pesquisa->ds_link = $ds_link;
        $pesquisa->ds_pesquisa = $ds_pesquisa;
        $pesquisa->save();
    }

    /**
     * DOCUMENTOS
     * documentos
     */

    private function documentos($id_tcc)
    {
        $params = http_build_query(["tcc" => $id_tcc]);
        $docs = (new Docs())->find("id_tcc = :tcc", $params);
        $result = $docs->fetch();
        return $result;
    }


    /**
     * CARGO
     * viewCargo
     */
    private function viewCargo()
    {
        $cargo = (new Cargo())->find();
        $result = $cargo->fetch(true);
        return $result;
    }


    /**
     * FUNCAO
     * viewFuncao
     */
    private function viewFuncao()
    {
        $funcao = (new Funcao())->find();
        $result = $funcao->fetch(true);
        return $result;
    }
}
