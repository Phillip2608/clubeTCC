<?php

namespace Source\controllers;

use League\Plates\Engine;
use Source\models\User;
use CoffeeCode\Uploader\Image;

class Configure
{
    private $view;

    public function __construct($router)
    {
        $this->view = new Engine(dirname(__DIR__, 2) . "/theme/TCCweb/configuracao", "php");
        $this->view->addData(["router" => $router]);
    }

    public function geral()
    {
        $dados = [
            'titulo' => 'Visão Geral'
        ];
        echo $this->view->render("/geral", ["dados" => $dados]);
    }

    public function perfil()
    {

        $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $perfil = $this->viewPerfil($_SESSION['id_usuario']);
        $img = $_FILES["im_usuario"];
        if (isset($formulario)) {
            $dados = [
                'titulo' => 'Editar Perfil',
                'perfil' => $perfil,
                'nome' => trim($formulario['nm_usuario']),
                'apelido' => trim($formulario['nm_apelido']),
                'email' => trim($formulario['nm_email']),
            ];

            if (in_array("", $formulario)) {
                if (empty($formulario['nm_usuario'])) {
                    $dados['erro_nome'] = "Coloca um nome, OTARIO!";
                }

                if (empty($formulario['nm_apelido'])) {

                    if (empty($formulario['nm_email'])) {
                        $dados['erro_email'] = "Coloca um email, VAGABUNDO!";
                    } else {
                        $dados['perfil']->im_usuario = URL . "/" . $this->uploadImgUser($img);
                        $dados['perfil']->nm_usuario = $dados['nome'];
                        $dados['perfil']->nm_apelido = $dados['apelido'];
                        $dados['perfil']->nm_email = $dados['email'];
                        $dados['perfil']->save();

                        $_SESSION['nm_usuario'] = $dados['nome'];
                        $_SESSION['nm_apelido'] = $dados['apelido'];
                        $_SESSION['nm_email'] = $dados['email'];
                        $_SESSION['im_usuario'] = $dados['perfil']->im_usuario;
                        //redirect("/configuracao/geral/" . $_SESSION['id_usuario'], $dados);
                    }
                }

                if (empty($formulario['nm_email'])) {
                    $dados['erro_email'] = "Coloca um email, VAGABUNDO!";
                }
            } else {
                if (strlen($formulario['nm_apelido']) > 14) {
                    $dados['erro_apelido'] = "O apelido deve conter no mínimo 14 digitos";
                } else {
                    $dados['perfil']->im_usuario = URL . "/" . $this->uploadImgUser($img);
                    $dados['perfil']->nm_usuario = $dados['nome'];
                    $dados['perfil']->nm_apelido = $dados['apelido'];
                    $dados['perfil']->nm_email = $dados['email'];
                    $dados['perfil']->save();

                    $_SESSION['nm_usuario'] = $dados['nome'];
                    $_SESSION['nm_apelido'] = $dados['apelido'];
                    $_SESSION['nm_email'] = $dados['email'];
                    $_SESSION['im_usuario'] = $dados['perfil']->im_usuario;
                    //redirect("/configuracao/geral/" . $_SESSION['id_usuario'], $dados);

                }
            }
        } else {
            $dados = [
                'titulo' => 'Editar Perfil',
                'perfil' => '',
                'nome' => '',
                'apelido' => '',
                'email' => '',
                'erro_nome' => '',
                'erro_email' => '',
                'erro_apelido' => '',
            ];
        }
        echo $this->view->render("/perfil", ["dados" => $dados]);
    }

    public function temas()
    {
        $formulario = filter_input_array(INPUT_POST);
        $perfil = $this->viewPerfil($_SESSION['id_usuario']);
        if (isset($formulario)) {
            $dados = [
                'titulo' => 'Temas',
                'perfil' => $perfil,
                'tema' => $formulario['nm_tema']
            ];
            $dados['perfil']->id_tema = $dados['tema'];
            $dados['perfil']->save();
            $_SESSION['id_tema'] = $dados['tema'];
            echo $this->view->render("/temas", ["dados" => $dados]);
        } else {
            $dados = [
                'titulo' => 'Temas',
                'tema' => '',
                'perfil' => ''
            ];
            echo $this->view->render("/temas", ["dados" => $dados]);
        }
    }

    private function uploadImgUser($img)
    {
        if (isset($img)) {
            if ($img['error']) {
                return null;
            }

            if ($img['size'] > 5242880) {
                die("Arquivo muito grande! Máximo de arquivo 5MB");
            }
            $pasta = "theme/assets/img/uploads/";
            $nm_arquivo = $img['name'];
            $new_arquivo = uniqid();
            $extensao = strtolower(pathinfo($nm_arquivo, PATHINFO_EXTENSION));
            $path = $pasta . $new_arquivo . "." . $extensao;

            if ($extensao != "jpg" && $extensao != "png" && $extensao != "gif" && $extensao != "jpeg") {
                return null;
            }

            $move_file = move_uploaded_file($img["tmp_name"], $path);
            if ($move_file) {
                return $path;
            } else {
                return null;
            }
        }
    }

    private function viewPerfil($id_user)
    {
        $params = http_build_query([":id" => $id_user]);
        $perfil = (new User())->find("id_usuario = :id", $params);
        $result = $perfil->fetch();
        return $result;
    }

    private function addImgUpload()
    {
    }
}
