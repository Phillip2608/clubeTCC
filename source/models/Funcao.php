<?php

namespace Source\models;

use CoffeeCode\DataLayer\DataLayer;

class Funcao extends DataLayer{
    public function __construct()
    {
        parent::__construct("tb_funcao", ["nm_funcao"], "id_funcao", false);
    }
}