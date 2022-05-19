<?php

namespace Source\models;

use CoffeeCode\DataLayer\DataLayer;

class Categoria extends DataLayer{
    public function __construct()
    {
        parent::__construct("tb_categoria", ["nm_categoria"], "id_categoria", false);
    }
}