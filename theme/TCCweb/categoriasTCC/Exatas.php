<?php $this->layout("../_theme"); ?>
<section class="container">
    <div class="row">
        <h1 class="text-center my-4"> <?= $dados['titulo'] ?> </h1>
    </div>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 my-3 d-flex justify-content-start">
        <?php
        foreach ($dados['tccsE'] as $tccE) {
        ?>
            <div class="col card-cater">
                <img src="<?php if ($tccE->im_banner == null) {
                                echo IMG . '/Logos/Maximizada colorida.png';
                            } else {
                                echo IMG . '/uploads/imgUpload/' . $tccE->im_banner;
                            } ?>" class="img-card-cater shadow rounded-3" alt="">
            </div>
        <?php
        }
        ?>
    </div>
</section>