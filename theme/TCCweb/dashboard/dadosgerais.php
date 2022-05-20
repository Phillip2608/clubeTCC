<style>
    .img_banner {
        object-fit: cover;
    }
</style>
<?php $this->layout("../_theme"); ?>
<section class="container my-5">
    <?php
    include 'menu_respon.php';
    ?>
    <div class="col-11 mx-auto bg-light py-1">
        <div class="row p-4 row-cols-1 row-cols-sm-2 g-3 d-flex align-items-center">
            <div class="col">
                <?= message('Confirma'); ?>
                <h2><?= $dados['titulo'] ?></h2>
                <form action="<?= $router->route('dashboard.dadosgerais'); ?>" name="form_tcc" method="POST" class="">
                    <div class="mb-3 my-4">
                        <label for="exampleFormControlInput1" class="form-label ">
                            <h5>Nome</h5>
                        </label>
                        <input type="text" autocomplete="off" class="form-control <?= $dados['nm_erro'] ? 'is-invalid' : '' ?>" id="exampleFormControlInput1" placeholder="Digite um novo nome" name="nm_tcc" value="<?= $dados['tcc']->nm_tcc ?>">
                        <div class="invalid-feedback">
                            <?= $dados['nm_erro'] ?>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">
                            <h5>Descrição</h5>
                        </label>
                        <textarea class="form-control" placeholder="Digite alguma descrição" id="exampleFormControlTextarea1" rows="4" name="ds_tcc"><?= $dados['tcc']->ds_tcc ?></textarea>
                    </div>
                    <label for="categorias">
                        <h5>Categorias</h5>
                    </label>
                    <select name="id_categoria" id="categorias" class="form-select  <?= $dados['erroIdTCC'] ? 'is-invalid' : '' ?>">
                        <?php
                        foreach ($dados['allCater'] as $categoria) {
                            if ($categoria->id_categoria == $dados['tcc']->id_categoria) {
                                echo "<option value='" . $dados['tcc']->id_categoria . "' selected>" . $categoria->nm_categoria . "</option>";
                            } else {
                        ?>
                                <option value="<?= $categoria->id_categoria ?>"><?= $categoria->nm_categoria ?></option>
                        <?php
                            }
                        }
                        ?>
                    </select>
                    <div class="mb-3 my-4">
                        <input type="submit" class="form-control btn btn-success" value="Confirmar">
                    </div>
                </form>
                <h4 class="my-3">Integrantes</h4>
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 d-flex justify-content-start align-items-center">
                    <?php foreach ($dados['inter'] as $inter) { ?>
                        <div class="col d-flex justify-content-center flex-wrap align-items-center text-center">
                            <div class="card border border-0 bg-light">
                                <?php if ($inter->id_cargo == 1) { ?>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-star-fill mx-auto link-warning" viewBox="0 0 16 16">
                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                    </svg>
                                <?php } elseif ($inter->id_cargo == 2) { ?>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-star-half link-warning mx-auto" viewBox="0 0 16 16">
                                        <path d="M5.354 5.119 7.538.792A.516.516 0 0 1 8 .5c.183 0 .366.097.465.292l2.184 4.327 4.898.696A.537.537 0 0 1 16 6.32a.548.548 0 0 1-.17.445l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256a.52.52 0 0 1-.146.05c-.342.06-.668-.254-.6-.642l.83-4.73L.173 6.765a.55.55 0 0 1-.172-.403.58.58 0 0 1 .085-.302.513.513 0 0 1 .37-.245l4.898-.696zM8 12.027a.5.5 0 0 1 .232.056l3.686 1.894-.694-3.957a.565.565 0 0 1 .162-.505l2.907-2.77-4.052-.576a.525.525 0 0 1-.393-.288L8.001 2.223 8 2.226v9.8z" />
                                    </svg>
                                <?php } else { ?>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-mortarboard-fill mx-auto link-dark" viewBox="0 0 16 16">
                                        <path d="M8.211 2.047a.5.5 0 0 0-.422 0l-7.5 3.5a.5.5 0 0 0 .025.917l7.5 3a.5.5 0 0 0 .372 0L14 7.14V13a1 1 0 0 0-1 1v2h3v-2a1 1 0 0 0-1-1V6.739l.686-.275a.5.5 0 0 0 .025-.917l-7.5-3.5Z" />
                                        <path d="M4.176 9.032a.5.5 0 0 0-.656.327l-.5 1.7a.5.5 0 0 0 .294.605l4.5 1.8a.5.5 0 0 0 .372 0l4.5-1.8a.5.5 0 0 0 .294-.605l-.5-1.7a.5.5 0 0 0-.656-.327L8 10.466 4.176 9.032Z" />
                                    </svg>
                                <?php } ?>
                                <h5><?= $inter->nm_cargo ?></h5>
                                <svg xmlns="http://www.w3.org/2000/svg" width="75" height="75" fill="currentColor" class="bi bi-person-fill d-block mx-auto border border-0 rounded-circle bg-secondary p-2" viewBox="0 0 16 16">
                                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                </svg>
                                <div class="mx-3">
                                    <h5> <?= $inter->nm_usuario ?></h5>
                                    <h6 class="funcao_user"> <?php if ($inter->nm_funcao == null) {
                                                                    echo "Sem função";
                                                                } else {
                                                                    echo $inter->nm_funcao;
                                                                } ?> </h6>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="col d-flex justify-content-center flex-wrap align-items-center text-center">
                        <div class="card border border-0 bg-light">
                            <button id="myBtn" type="button" class="bg-light border border-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="75" height="75" fill="currentColor" class="bi bi-plus-lg btn btn_redes d-block mx-auto border border-0 rounded-circle bg-secondary p-2" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card bg-light border border-0">
                    <h3>Clique na imagem para alterar seu banner</h3>
                    <?= message("bannerOK") ?>
                    <form action="<?= $router->route("dashboard.bannerATT") ?>" enctype="multipart/form-data" method="POST">
                        <input type="file" id="select_file" accept="image/*" class="d-none" name="img_banner">
                        <img src="<?php if ($dados['tcc']->im_banner == null) {
                                        echo IMG . '/Logos/Maximizada colorida.png';
                                    } else {
                                        echo IMG . '/uploads/imgUpload/' . $dados['tcc']->im_banner;
                                    } ?>" alt="" width="100%" height="630" class="img_banner bg-secondary border border-0 rounded-3 p-0 btn shadow-sm my-2" id="img_banner">
                        <div class="row">
                            <div class="card bg-light border border-0">
                                <input type="submit" class="col btn btn-outline-success my-2">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div id="myModal" class="modal-inter-fundo">

        <!-- Modal content -->
        <div class="modal-inter topo">
            <span class="close">&times;</span>
            <div class="card my-3 border border-0">
                <div class="card-header topo border border-0">
                    <h3>Adicionar Integrante</h3>
                </div>
                <div class="card-body topo">
                    <form action="<?= $router->route('dashboard.dadosgerais'); ?>" name="form_inter" id="form-integrante" method="POST">
                        <?php
                        $dados['nm_tcc'] = $dados['tcc']->nm_tcc;
                        $dados['ds_tcc'] = $dados['tcc']->ds_tcc;
                        ?>
                        <div class="mb-3 busca_inter">
                            <label for="exampleFormControlInput1" class="form-label ">
                                <h5>Pesquisar</h5>
                            </label>
                            <input type="search" autocomplete="off" class="form-control" name="inter" id="pesquisa-inter" placeholder="Procure um integrante">
                            <select name="result-inter" id="result-inter" class="result-inter form-select topo border border-0">
                                <option value=""></option>
                            </select>
                            <div class="row my-4">
                                <div class="col">
                                    <select name="result-inter" id="result-inter" class="result-inter form-select">
                                        <option value="0" selected disabled> Cargo </option>
                                        <?php foreach ($dados['cargo'] as $result) { ?>
                                            <option value="<?= $result->id_cargo ?>"><?= $result->nm_cargo ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col">
                                    <select name="result-inter" id="result-inter" class="result-inter form-select">
                                        <option value="0" selected disabled>Função</option>
                                        <?php foreach ($dados['funcao'] as $result) { ?>
                                            <option value="<?= $result->id_funcao ?>"><?= $result->nm_funcao ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row my-4">
                                <input type="submit" class="btn btn-success col my-4" name="" id="" value="Adicionar Integrante">
                            </div>
                        </div>
                    </form>
                    <div class="result-inter" id="result-inter">

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $this->start("js"); ?>
<script>
    var modal = document.getElementById("myModal");

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks on the button, open the modal
    btn.onclick = function() {
        modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

    var viewImage = document.getElementById('img_banner')
    var select_file = document.getElementById('select_file');

    viewImage.addEventListener('click', () => {
        select_file.click();
    });

    select_file.addEventListener('change', (event) => {
        if (select_file.files.length <= 0) {
            return;
        }

        var reader = new FileReader();

        reader.onload = () => {
            viewImage.src = reader.result;
        }

        reader.readAsDataURL(select_file.files[0]);
    });

    $(function() {

    });
</script>
<?php $this->end(); ?>