<?php

namespace Source\models;

use CoffeeCode\DataLayer\DataLayer;

class Docs extends DataLayer{
    public function __construct()
    {
        parent::__construct("tb_documento", ["nm_documento", "nm_newName"], "id_documento", false);
    }
}