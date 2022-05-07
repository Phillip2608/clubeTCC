<?php

namespace Source\controllers;

use League\Plates\Engine;
use Source\models\User;

class Users
{
    private $view;

    public function __construct($router)
    {
        $this->view = new Engine(dirname(__DIR__, 2) . "/theme/TCCweb/users", "php");
        $this->view->addData(["router" => $router]);
    }

    public function login()
    {
        $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        if (isset($formulario)) {
            $dados = [
                'email_login' => trim($formulario['nm_email_login']),
                'senha_login' => trim($formulario['id_senha_login'])
            ];

            if (in_array("", $formulario)) {
                if (empty($formulario['nm_email_login'])) {
                    $dados['email_erro'] = "Digite seu email, por favor!";
                }

                if (empty($formulario['id_senha_login'])) {
                    $dados['senha_erro'] = "Digite sua senha, por favor!";
                }
            } else {
                $usuario = $this->checarLogin($formulario['nm_email_login'], $formulario['id_senha_login']);

                $dados = ['usuario' => $usuario];

                if ($dados['usuario']) {
                    $_SESSION['id_usuario'] = $dados['usuario']->id_usuario;
                    $_SESSION['id_tema'] = $dados['usuario']->id_tema;
                    $_SESSION['nm_usuario'] = $dados['usuario']->nm_usuario;
                    $_SESSION['nm_apelido'] = $dados['usuario']->nm_apelido;
                    $_SESSION['nm_email'] = $dados['usuario']->nm_email;
                    $_SESSION['im_usuario'] = $dados['usuario']->im_usuario;
                    redirect("/", $dados);
                }
            }
        } else {
            $dados = [
                'email_login' => '',
                'senha_login' => '',
                'email_erro' => '',
                'senha_erro' => ''
            ];
        }

        echo $this->view->render("/login", ["dados" => $dados]);
    }

    public function cadastrar()
    {
        $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        if (isset($formulario)) {
            $dados = [
                'nome' => trim($formulario['nm_usuario']),
                'email' => trim($formulario['nm_email']),
                'senha' => trim($formulario['id_senha']),
                'confirm_senha' => trim($formulario['confirm_senha'])
            ];

            if (in_array("", $formulario)) {
                //VALIDACAO DO NOME DO USUARIO
                if (empty($formulario['nm_usuario'])) {
                    $dados['nome_erro'] = 'Preencha o campo nome!';
                }

                //VALIDACAO DO EMAIL DO USUARIO
                if (empty($formulario['nm_email'])) {
                    $dados['email_erro'] = 'Preencha o campo email!';
                }

                //VALIDACAO DA SENHA DO USUARIO
                if (empty($formulario['id_senha'])) {
                    $dados['senha_erro'] = 'Preencha o campo senha!';
                }

                //VALIDACAO DA CONFIRMACAO DE SENHA DO USUARIO
                if (empty($formulario['confirm_senha'])) {
                    $dados['confirm_erro'] = 'Confirme a sua senha!';
                }
            } else {
                if (!filter_var($formulario['nm_email'], FILTER_VALIDATE_EMAIL)) {
                    $dados['email_erro'] = 'Email inválido ou incorreto!';
                } elseif ($this->checarEmail($formulario['nm_email'])) {
                    $dados['email_erro'] = 'Este email já existe!';
                } elseif (strlen($formulario['id_senha']) < 6) {
                    $dados['senha_erro'] = 'A senha deve obter no mínimo 6 caracteres!';
                } elseif ($formulario['id_senha'] != $formulario['confirm_senha']) {
                    $dados['confirm_erro'] = 'Confirmação incorreta. Senhas diferentes!';
                } else {
                    $dados['senha'] = password_hash($formulario['id_senha'], PASSWORD_DEFAULT);

                    $user = new User();
                    $user->nm_usuario = $dados['nome'];
                    $user->nm_email = $dados['email'];
                    $user->id_senha = $dados['senha'];
                    $user->im_usuario = "";
                    $user->save();

                    redirect("/users/login", $dados);
                }
            }
        }
        echo $this->view->render("/cadastrar", ["dados" => $dados]);
    }

    public function checarEmail($email)
    {
        $user = (new User())->find()->fetch(true);
        foreach ($user as $user_e) {
            if ($user_e->nm_email == $email) {
                return true;
            }
        }
    }

    public function checarLogin($email, $senha)
    {
        $params = http_build_query(["email" => $email]);
        $user = (new  User())->find("nm_email = :email", $params);
        $result = $user->fetch();
        if (password_verify($senha, $result->id_senha)) {
            return $result;
        } else {
            return false;
        }
    }

    public function sair()
    {
        unset($_SESSION['id_usuario']);
        unset($_SESSION['nm_usuario']);
        unset($_SESSION['id_tema']);
        unset($_SESSION['nm_apelido']);
        unset($_SESSION['nm_email']);
        unset($_SESSION['id_tcc']);
        unset($_SESSION['im_usuario']);

        session_destroy();
        redirect("/");
    }
}
