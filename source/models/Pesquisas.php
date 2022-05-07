<?php

namespace Source\models;

use CoffeeCode\DataLayer\DataLayer;

class Pesquisas extends DataLayer{
    public function __construct()
    {
        parent::__construct("tb_pesquisacampo", ["nm_titulo", "ds_link"], "id_pesquisa", false);
    }
}