<?php

use CoffeeCode\Router\Router;

require __DIR__ . "/vendor/autoload.php";

$router = new Router(URL);
$router->namespace("Source\controllers");
session_start();
ob_start();
/** 
 * PAGINAS
 * home
 * comunidade
 * noticias
 * planos
*/

$router->group(null);
$router->get("/", "Paginas:landing_page", "paginas.landing_page");

$router->group("users"); 
$router->get("/login", "Users:login", "users.login");
$router->post("/login", "Users:login", "users.login");
$router->get("/cadastrar", "Users:cadastrar", "users.cadastrar");
$router->post("/cadastrar", "Users:cadastrar", "users.cadastrar");
$router->get("/sair", "Users:sair", "users.sair");
if(isset($_SESSION['id_usuario'])){
    $router->group(null);
    $router->get("/home", "Paginas:home", "paginas.home");

    $router->group("paginas");
    $router->get("/comunidade", "Paginas:comunidade", "paginas.comunidade");
    $router->get("/noticias", "Paginas:noticias", "paginas.noticias");
    $router->get("/planos", "Paginas:planos", "paginas.planos");
    $router->post("/create", "Paginas:create", "paginas.create");

    /**
    * CATEGORIAS
    * humanas
    * 
    */
    $router->group("categoriasTCC");
    $router->get("/index", "Categorias:index", "categoriasTCC.index");
    $router->get("/Humanas/{idcategoria}", "Categorias:humanas", "categoriasTCC.humanas");
    $router->get("/Exatas/{idcategoria}", "Categorias:exatas", "categoriasTCC.exatas");
    $router->get("/Biologicas/{idcategoria}", "Categorias:biologicas", "categoriasTCC.biologicas");


    /**
    * CONFIGURACAO
    * geral
    * perfil
    * temas
    */
    $router->group("configuracao");
    $router->get("/geral/{$_SESSION['id_usuario']}", "Configure:geral", "configure.geral");
    $router->get("/perfil/{$_SESSION['id_usuario']}", "Configure:perfil", "configure.perfil");
    $router->post("/perfil/{$_SESSION['id_usuario']}", "Configure:perfil", "configure.perfil");
    $router->get("/temas/{$_SESSION['id_usuario']}", "Configure:temas", "configure.temas");
    $router->post("/temas/{$_SESSION['id_usuario']}", "Configure:temas", "configure.temas");

    /**
    * DASHBOARD
    * index
    * geral
    * dadosgerais
    * pesquisacampo
    * editpesquisa
    * deletSearch
    * documentos
    * publicarTCC
    */
    $router->group("dashboard");
    $router->get("/index/{$_SESSION['id_usuario']}", "Dashboard:index", "dashboard.index");
    $router->post("/index/{$_SESSION['id_usuario']}", "Dashboard:index", "dashboard.index");
    $router->get("/geral/{$_SESSION['id_usuario']}/{idtcc}", "Dashboard:geral", "dashboard.geral");
    $router->post("/bannerATT/{$_SESSION['id_usuario']}/{$_SESSION['id_tcc']}", "Dashboard:bannerATT", "dashboard.bannerATT");
    $router->get("/dadosgerais/{$_SESSION['id_usuario']}/{$_SESSION['id_tcc']}", "Dashboard:dadosgerais", "dashboard.dadosgerais");
    $router->post("/dadosgerais/{$_SESSION['id_usuario']}/{$_SESSION['id_tcc']}", "Dashboard:dadosgerais", "dashboard.dadosgerais");
    $router->get("/pesquisacampo/{$_SESSION['id_usuario']}/{$_SESSION['id_tcc']}", "Dashboard:pesquisacampo", "dashboard.pesquisacampo");
    $router->post("/pesquisacampo/{$_SESSION['id_usuario']}/{$_SESSION['id_tcc']}", "Dashboard:pesquisacampo", "dashboard.pesquisacampo");
    $router->post("/editSearch/{$_SESSION['id_usuario']}/{$_SESSION['id_tcc']}", "Dashboard:editPesquisa", "dashboard.editPesquisa");
    $router->post("/deletSearch/{$_SESSION['id_usuario']}/{$_SESSION['id_tcc']}", "Dashboard:deletePesquisa", "dashboard.deletePesquisa");
    $router->get("/documentos/{$_SESSION['id_usuario']}/{$_SESSION['id_tcc']}", "Dashboard:documentos", "dashboard.documentos");
    $router->post("/documentos/{$_SESSION['id_usuario']}/{$_SESSION['id_tcc']}", "Dashboard:documentos", "dashboard.documentos");
    $router->post("/deletDocs/{$_SESSION['id_usuario']}/{$_SESSION['id_tcc']}", "Dashboard:deletDocs", "dashboard.deletDocs");
    $router->get("/sistema/{$_SESSION['id_usuario']}/{$_SESSION['id_tcc']}", "Dashboard:sistema", "dashboard.sistema");
    $router->post("/sistema/{$_SESSION['id_usuario']}/{$_SESSION['id_tcc']}", "Dashboard:sistema", "dashboard.sistema");
}

/**
 * ERROS
 */
$router->group("ooops");
$router->get("/{errcode}", "Paginas:error");

/**
 * This method executes the routes
 */
$router->dispatch();

/*
 * Redirect all errors
 */
if ($router->error()) {
    $router->redirect("/ooops/{$router->error()}");
}