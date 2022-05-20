<style>
    .img_user_upp{
        object-fit: cover;
    }
</style>
<?php $this->layout("../_theme"); ?>
<main class="container my-5 fundo">
    <div class="col-10 mx-auto shadow">
        <div class="row">
            <?php include 'menu_config.php'; ?>
            <div class="col p-3 bg-light">
                <div class="my-3">
                    <h3 class="mx-4">Perfil</h3>
                    <?= message("dadosOK") ?>
                    <div class="row d-flex align-items-center flex-wrap">
                        <div class="col-3 mx-1 d-flex align-items-center mx-auto justify-content-lg-center">
                            <img src="<?php if($_SESSION['im_usuario'] == null){ echo ICON."/person.png"; }elseif($_SESSION['im_usuario'] == URL."/"){echo ICON."/person.png";}else{echo $_SESSION['im_usuario']; } ?>" alt="" width="100" height="100" class="img_user_upp bg-secondary rounded-circle p-0">
                        </div>
                        <table class="col table">
                            <tbody>
                                <tr>
                                    <td colspan="2">Nome</td>
                                    <th scope="row"><?= $_SESSION['nm_usuario'] ?></th>
                                </tr>
                                <tr>
                                    <td colspan="2">Apelido</td>
                                    <th scope="row"><?php if ($_SESSION['nm_apelido'] == null) {
                                                        echo "Nenhum apelido!";
                                                    } else {
                                                        echo $_SESSION['nm_apelido'];
                                                    } ?></th>
                                </tr>
                                <tr>
                                    <td colspan="2">E-mail</td>
                                    <th scope="row"><?= $_SESSION['nm_email'] ?></th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="row mx-0">
                        <a href="<?= URL ?>/configuracao/perfil/<?= $_SESSION['id_usuario'] ?>" class="mx-4 p-2 my-3 col-2 btn btn-outline-dark">Editar Perfil</a>
                    </div>
                    <h3 class="mx-4 my-4">Plano</h3>
                    <div class="container">
                        <div class="row d-flex d-flex align-items-center">
                            <div class="col">
                                Nenhum plano selecionado!
                                <a href="<?= URL ?>/configuracao/planos" class="btn btn-outline-dark mx-1">Selecionar Plano</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>