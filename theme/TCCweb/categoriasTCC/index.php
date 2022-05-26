<style>
    .img-card-cater {
        object-fit: cover;
        width: 100%;
        height: 100%;
    }

    .card-cater {
        opacity: 0.8;
        transition: .5s;
        height: 250px;
    }

    .card-cater:hover {
        opacity: 1;
        transform: scale(1.025);
    }

    @media (max-width: 670px) {
        .name-cater{
            display: none;
        }
    }
</style>

<?php $this->layout("../_theme"); ?>
<section class="container">
    <div class="row">
        <h1 class="text-center my-4"> <?= $dados['titulo'] ?> </h1>
    </div>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 my-3 d-flex justify-content-center">
        <?php
        foreach ($dados['categorias'] as $categorias) {
        ?>
            <a href="<?=URL ?>/categoriasTCC/<?= $categorias->nm_categoria ?>/<?= $categorias->id_categoria ?>" class="col card-cater">
                <?php
                if ($categorias->id_categoria == 1) {
                ?>
                    <img src="<?= IMG ?>/fundos/Melhores-livros.jpg" class="img-card-cater shadow rounded-3" alt="">
                <?php
                } elseif ($categorias->id_categoria == 2) {
                ?>
                    <img src="<?= IMG ?>/fundos/contas.jpg" class="img-card-cater shadow rounded-3" alt="">
                <?php
                } elseif ($categorias->id_categoria == 3) {
                ?>
                    <img src="<?= IMG ?>/fundos/Ciencias-biologicas.jpg" class="img-card-cater shadow rounded-3" alt="">
                <?php
                }
                ?>
                <div class="row name-cater">
                    <h3 class="col mx-auto btn"><?= $categorias->nm_categoria ?></h3>
                </div>
            </a>
        <?php
        }
        ?>
    </div>
</section>