<?php $this->layout("../_theme"); ?>
<main class="container my-5 fundo">
    <div class="col-10 mx-auto shadow">
        <div class="row">
            <?php include 'menu_config.php'; ?>
            <div class="col p-3 bg-light">
                <div class="container my-3">
                    <h3 class="mx-4"><?= $dados['titulo'] ?></h3>
                    <form action="<?= $router->route("configure.perfil"); ?>" class="container my-4 row" method="POST" enctype="multipart/form-data">
                        <div class="my-1 d-flex align-items-center" id="myBtn">
                            <img src="<?php if ($_SESSION['im_usuario'] == null) {
                                            echo ICON . "/person.png";
                                        } elseif ($_SESSION['im_usuario'] == URL . "/") {
                                            echo ICON . "/person.png";
                                        } else {
                                            echo $_SESSION['im_usuario'];
                                        } ?>" alt="" width="100" height="100" class="bg-secondary rounded-circle p-0 btn" id="img_att">
                            <input type="file" name="im_usuario" class="d-none" id="select_file" accept="image/*">
                        </div>
                        <label for="exampleFormControlInput1" class="form-label my-2">Clique na imagem para alterar</label>
                        <div>
                            <div class="mb-3 my-2">
                                <label for="exampleFormControlInput1" class="form-label">Nome</label>
                                <input type="text" name="nm_usuario" class="form-control <?= $dados['erro_nome'] ? 'is-invalid' : '' ?>" id="exampleFormControlInput1" placeholder="Digite um novo nome" value="<?php if ($dados['nome'] == null) {
                                                                                                                                                                                                                    echo $_SESSION['nm_usuario'];
                                                                                                                                                                                                                } else {
                                                                                                                                                                                                                    echo $dados['nome'];
                                                                                                                                                                                                                } ?>">
                                <div class="invalid-feedback">
                                    <?= $dados['erro_nome'] ?>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Apelido</label>
                                <input type="text" name="nm_apelido" class="form-control <?= $dados['erro_apelido'] ? 'is-invalid' : '' ?>" id="exampleFormControlInput1" placeholder="Digite um apelido" value="<?php if ($dados['apelido'] == null) {
                                                                                                                                                                                                                        echo $_SESSION['nm_apelido'];
                                                                                                                                                                                                                    } else {
                                                                                                                                                                                                                        echo $dados['apelido'];
                                                                                                                                                                                                                    } ?>">
                                <div class="invalid-feedback">
                                    <?= $dados['erro_apelido'] ?>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">E-mail</label>
                                <input type="email" name="nm_email" class="form-control <?= $dados['erro_email'] ? 'is-invalid' : '' ?>" id="exampleFormControlInput1" placeholder="Digite um novo email" value="<?php if ($dados['email'] == null) {
                                                                                                                                                                                                                        echo $_SESSION['nm_email'];
                                                                                                                                                                                                                    } else {
                                                                                                                                                                                                                        echo $dados['email'];
                                                                                                                                                                                                                    } ?>">
                                <div class="invalid-feedback">
                                    <?= $dados['erro_email'] ?>
                                </div>
                            </div>
                        </div>
                        <div class="row my-2 mx-0">
                            <input type="submit" class="btn btn-success form-control" value="Salvar">
                        </div>
                        <div class="row my-2 mx-0">
                            <a href="<?= URL ?>/configuracao/geral/<?= $_SESSION['id_usuario'] ?>" class="btn btn-outline-danger">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
<?php $this->start("js"); ?>
<script>
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