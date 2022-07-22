<?php $this->layout("../_theme"); ?>
<main>
    <section class="container my-5">
        <?php
        include 'menu_respon.php';
        ?>
        <div class="col-11 mx-auto bg-light py-1">
            <div class="col d-flex justify-content-center flex-column">
                <div class="card bg-light border-0">
                    <h2 class="titulo_web text-center"> Adicione um novo sistema </h2>
                    <div class="col-4 mx-auto my-3">
                        <buttom class="btn btn-success form-control" onclick="clickPJT()"> Novo sistema </buttom>
                        <div>
                            <?= message("SISOK"); ?>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <section class="cont-pjt">
        <div class="modalPJT" id="modaljt">
            <div class="card-header card_header_geral">
                <h2>Novo sistema</h2>
            </div>
            <div class="card-body">
                <form action="<?= $router->route('dashboard.sistema'); ?>" class="mx-auto" method="POST" enctype="multipart/form-data">
                    <div class="my-1 d-flex align-items-center">
                        <img src="" alt="" width="100" height="100" class="img_user_upp bg-secondary rounded-2 p-0 btn" id="img_att">
                        <div class="mx-3">
                            <input type="text" name="nm_sistema" class="form-control <?= $dados['erro_nome'] ? 'is-invalid' : '' ?>" id="exampleFormControlInput1" placeholder="Nome do sistema" value="<?= $dados['nm_sistema'] ?>">
                            <div class="invalid-feedback">
                                <?= $dados['erro_nome'] ?>
                            </div>
                            <h5 class="my-2 mx-2"><?= $dados['tcc']->nm_tcc ?></h5>
                        </div>
                    </div>
                    <label for="im_sistema" class="form-label my-2">
                        <h6 class="text-warning">Clique na imagem para alterar</h6>
                    </label>

                    <div class="mb-3">
                        <label for="ds_link" class="form-label">
                            <h5>Link</h5>
                        </label>
                        <input type="text" name="ds_link" class="form-control <?= $dados['erro_link'] ? 'is-invalid' : '' ?>" id="ds_link" placeholder="Digite o link do Sistema" value="<?= $dados['ds_link'] ?>">
                        <div class="invalid-feedback">
                            <?= $dados['erro_link'] ?>
                        </div>
                    </div>
                    <label for="">
                        <h5>Imagens do Sistema</h5>
                    </label>
                    <div class="my-1 d-flex align-items-center" id="myBtn">
                        <img src="" alt="" width="250" height="350" class="img_user_upp bg-secondary rounded-2 p-0 btn" id="img_att_more">
                    </div>
                    <div class="mb-3">
                        <label for="ds_sistema" class="form-label">
                            <h5>Descrição</h5>
                        </label>
                        <textarea class="form-control" placeholder="Fale um pouco sobre seu sistema" id="ds_sistema" rows="4" name="ds_sistema"><?= $dados['ds_sistema'] ?></textarea>
                    </div>
                    <div class="row mx-1 my-2">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="id_privado" id="inlineRadio1" value="0">
                            <label class="form-check-label" for="inlineRadio1">Público</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="id_privado" id="inlineRadio2" value="1">
                            <label class="form-check-label" for="inlineRadio2">Privado</label>
                        </div>
                    </div>
                    <div class="row my-2 mx-0">
                        <input type="submit" class="btn btn-success form-control" value="Criar">
                    </div>
                </form>
            </div>
        </div>
    </section>
</main>
<?php $this->start("js"); ?>
<script>
    const activeModalClass = 'modal-show-pjt';
    var contPJT = document.querySelector(".cont-pjt");
    var modalPJT = document.querySelector(".modalPJT");

    function closePJT() {
        contPJT.classList.remove(activeModalClass);
    }

    function clickPJT() {

        contPJT.classList.add(activeModalClass);

        contPJT.addEventListener("click", e => {
            if (modalPJT.contains(e.target)) {
                return;
            }
            closePJT();

        });
    }

    var viewImage = document.getElementById('img_att')
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
</script>
<?php $this->end(); ?>