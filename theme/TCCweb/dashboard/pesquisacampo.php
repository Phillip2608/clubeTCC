<?php $this->layout("../_theme"); ?>
<section class="container my-5">
    <?php
    include 'menu_respon.php';
    ?>
    <div class="col-11 mx-auto bg-light py-3">
        <div class="row p-4 row-cols-1 row-cols-sm-2 g-3 d-flex align-items-center">
            <div class="col">
                <?= message("Pesquisa"); ?>
                <h2><?= $dados['titulo'] ?></h2>
                <form action="<?= URL ?>/dashboard/pesquisacampo/<?= $_SESSION['id_usuario'] ?>/<?= $_SESSION['id_tcc'] ?>" method="POST">
                    <div class="mb-3 my-4">
                        <label for="criar_titulo" class="form-label">
                            <h5>Título</h5>
                        </label>
                        <input type="text" autocomplete="off" class="form-control <?= $dados['nm_erro'] ? 'is-invalid' : '' ?>" id="criar_titulo" placeholder="Digite um título" name="nm_titulo" value="<?= $dados['nm_titulo'] ?>">
                        <div class="invalid-feedback">
                            <?= $dados['nm_erro'] ?>
                        </div>
                    </div>
                    <div class="mb-3 my-4">
                        <label for="criar_link" class="form-label">
                            <h5>Adicione o link da pesquisa</h5>
                        </label>
                        <input type="text" autocomplete="off" class="form-control <?= $dados['link_erro'] ? 'is-invalid' : '' ?>" id="criar_link" placeholder="Links baseados no GoogleForms" name="ds_link" value="<?= $dados['ds_link'] ?>">
                        <div class="invalid-feedback">
                            <?= $dados['link_erro'] ?>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="criar_desc" class="form-label">
                            <h5>Descrição</h5>
                        </label>
                        <textarea class="form-control" placeholder="Digite alguma descrição" id="criar_desc" rows="4" name="ds_pesquisa"><?= $dados['ds_pesquisa']; ?></textarea>
                    </div>
                    <div class="mb-3">
                        <input type="submit" name="createSearch" class="form-control btn btn-success" value="Confirmar">
                    </div>
                </form>
            </div>

            <div class="col d-flex justify-content-center">
                <img src="<?= TCC ?>" width="180" height="180">
            </div>
        </div>
        <div class="row mx-2">
            <div class="col-6 mx-1">
                <?= message("errorEdit"); ?>
            </div>
        </div>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 d-flex justify-content-start mx-3 view-pesquisas">
            <?php foreach ($dados['pesquisas'] as $pesquisas) { ?>
                <div class="col">
                    <div class="card shadow-sm">
                        <div class="card-header border border-0 rounded-top card_header_geral">
                            <h3><?= $pesquisas->nm_titulo ?></h3>
                        </div>
                        <svg class="bd-placeholder-img card-img-top" width="100%" height="200" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                            <title>Placeholder</title>
                            <rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
                        </svg>

                        <div class="card-body card_body_geral">
                            <p class="card-text"><?php if ($pesquisas->ds_pesquisa == null) {
                                                        echo "Pesquisa sem descrição!";
                                                    } else {
                                                        echo $pesquisas->ds_pesquisa;
                                                    } ?></p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="card-text">Criador:<?= $pesquisas->nm_usuario ?></div>
                                <small class="text-light">Em:<?= date("d/m/Y", strtotime($pesquisas->dt_pesquisa)) ?></small>
                            </div>
                        </div>
                    </div>
                    <div class="col my-2">
                        <div class="card bg-light">
                            <a href="<?= $pesquisas->ds_link ?>" target="_blank" class="btn btn-outline-dark p-2">
                                Visualizar pesquisa
                            </a>
                        </div>
                    </div>
                    <div class="row my-2">
                        <div class="col card bg-light border border-0 pesquisa-campo">
                            <button class="btn btn-outline-warning p-2" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatevertitulo="<?= $pesquisas->nm_titulo; ?>" data-bs-whateverdesc="<?= $pesquisas->ds_pesquisa; ?>" data-bs-whateverlink="<?= $pesquisas->ds_link; ?>" data-bs-whateverid="<?= $pesquisas->id_pesquisa; ?>">
                                Editar pesquisa
                            </button>
                        </div>
                        <div class="col card bg-light border border-0 pesquisa-campo">
                            <div class="btn btn-outline-danger p-2" data-bs-whateverid="<?= $pesquisas->id_pesquisa; ?>" data-bs-whatevertitulo="<?= $pesquisas->nm_titulo; ?>" data-bs-toggle="modal" data-bs-target="#modalDelete">
                                Deletar
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <div class="modal fade" id="modalDelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="left: 40%; top:25%; width:380px;">
        <div class="modal-dialog" style="width:380px;">
            <div class="modal-content card_header_geral" style="width:380px;">
                <div class="card-header d-flex justify-content-between">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                </div>
                <div class="modal-body">
                    <h6 class="modal-title my-2">Deseja mesmo deletar a pesquisa?</h6>
                    <form method="POST" action="<?= $router->route("dashboard.deletePesquisa"); ?>">
                        <input type="text" id="recipient-id" style="display: none;" name="idPesquisa">
                        <input type="submit" value="Deletar" class="btn btn-danger">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="left: 40%; top:25%; width:400px;">
        <div class="modal-dialog" style="width:400px;">
            <div class="modal-content card_header_geral" style="width:400px;">
                <div class="card-header d-flex justify-content-between">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="<?= $router->route("dashboard.editPesquisa"); ?>">
                        <input type="text" id="recipient-id" style="display: none;" name="idPesquisa">
                        <div class="mb-3">
                            <label for="recipient-title" class="col-form-label">Tiulo:</label>
                            <input type="text" class="form-control" id="recipient-title" name="titleEdit" value="<?= $dados['titleEdit'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-link" class="col-form-label">Link:</label>
                            <input type="text" class="form-control" id="recipient-link" name="linkEdit" value="<?= $dados['linkEdit'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-desc" class="col-form-label">Descrição:</label>
                            <textarea class="form-control" rows="4" id="recipient-desc" name="descEdit"><?= $dados['descEdit'] ?></textarea>
                        </div>
                        <input type="submit" value="Atualizar" class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>




<?php $this->start("js"); ?>
<script>
    var exampleModal = document.getElementById('exampleModal')
    exampleModal.addEventListener('show.bs.modal', function(event) {
        // Button that triggered the modal
        var button = event.relatedTarget
        // Extract info from data-bs-* attributes
        var recipientTitulo = button.getAttribute('data-bs-whatevertitulo')
        var recipientDesc = button.getAttribute('data-bs-whateverdesc')
        var recipientLink = button.getAttribute('data-bs-whateverlink')
        var recipientId = button.getAttribute('data-bs-whateverid')
        // If necessary, you could initiate an AJAX request here
        // and then do the updating in a callback.
        //
        // Update the modal's content.
        var modalTitle = exampleModal.querySelector('.modal-title')
        var inputTitle = exampleModal.querySelector('#recipient-title')
        var inputLink = exampleModal.querySelector('#recipient-link')
        var inputDesc = exampleModal.querySelector('#recipient-desc')
        var inputId = exampleModal.querySelector('#recipient-id')

        modalTitle.textContent = recipientTitulo
        inputTitle.value = recipientTitulo
        inputLink.value = recipientLink
        inputDesc.value = recipientDesc
        inputId.value = recipientId
    });
    // When the user clicks anywhere outside of the modal, close it

    var modalDelete = document.getElementById('modalDelete')
    modalDelete.addEventListener('show.bs.modal', function(event) {
        // Button that triggered the modal
        var button = event.relatedTarget
        // Extract info from data-bs-* attributes
        var recipientTitulo = button.getAttribute('data-bs-whatevertitulo')
        var recipientId = button.getAttribute('data-bs-whateverid')
        // If necessary, you could initiate an AJAX request here
        // and then do the updating in a callback.
        //
        // Update the modal's content.
        var modalTitle = modalDelete.querySelector('.modal-title')
        var inputId = modalDelete.querySelector('#recipient-id')

        modalTitle.textContent = recipientTitulo
        inputId.value = recipientId
    });
</script>
<?php $this->end(); ?>