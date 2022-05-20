<?php $this->layout("../_theme"); ?>
<section class="container">
    <div class="row">
        <h1 class="text-center my-4"> <?= $dados['titulo'] ?> </h1>
    </div>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 d-flex justify-content-center">
        <?php
        foreach ($dados['categorias'] as $categorias) {
        ?>
            <div class="col card-cater">
                <?php
                if ($categorias->id_categoria == 1) {
                ?>

                <?php
                } elseif ($categorias->id_categoria == 2) {
                ?>

                <?php
                }
                ?>

                <h5 class="text-center"><?= $categorias->nm_categoria ?></h5>

            </div>
        <?php
        }
        ?>
    </div>
</section>