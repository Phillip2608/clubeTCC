<?php

namespace Source\models;

use CoffeeCode\DataLayer\DataLayer;

class Cargo extends DataLayer{
    public function __construct()
    {
        parent::__construct("tb_cargo", ["nm_cargo"], "id_cargo", false);
    }
}