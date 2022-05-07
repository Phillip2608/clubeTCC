<?php

namespace Source\models;

use CoffeeCode\DataLayer\DataLayer;

class Integrante extends DataLayer{
    public function __construct()
    {
        parent::__construct("tb_integrante", [], "id_integrante", false);
    }
}