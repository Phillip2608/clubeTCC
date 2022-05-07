<?php 
namespace Source\models;

use CoffeeCode\DataLayer\DataLayer;

class User extends DataLayer{
    public function __construct()
    {
        parent::__construct("tb_usuario", ["nm_usuario", "nm_email", "id_senha"], "id_usuario", false);
    }
}