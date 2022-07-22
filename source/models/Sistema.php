<?php

namespace Source\models;

use CoffeeCode\DataLayer\DataLayer;

class Sistema extends DataLayer{
    public function __construct()
    {
        parent::__construct("tb_sistema", ["id_privado", "nm_sistema", "ds_link"], "id_sistema", false);
    }
}