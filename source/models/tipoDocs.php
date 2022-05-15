<?php

namespace Source\models;

use CoffeeCode\DataLayer\DataLayer;

class tipoDocs extends DataLayer{
    public function __construct()
    {
        parent::__construct("tb_tipodocs", ["nm_tipoDocs"], "id_tipoDocs", false);
    }
}