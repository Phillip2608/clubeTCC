<?php

namespace Source\models;

use CoffeeCode\DataLayer\DataLayer;

class TCC extends DataLayer{
    public function __construct()
    {
        parent::__construct("tb_tcc", ["nm_tcc"], "id_tcc", false);
    }
}