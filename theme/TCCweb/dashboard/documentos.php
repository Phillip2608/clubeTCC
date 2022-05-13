<?php $this->layout("../_theme"); ?>
<section class="container my-5">
    <?php
    include 'menu_respon.php';
    ?>
    <div class="col-11 mx-auto bg-light py-3">
        <div class="row p-4 row-cols-1 row-cols-sm-2 g-3 d-flex">
            <div class="col">
                <h2><?= $dados['titulo'] ?></h2>
                <?= message('DocsOK') ?>
                <form action="<?= $router->route("dashboard.documentos"); ?>" method="POST" enctype="multipart/form-data">
                    <input multiple type="file" name="file_docs[]" id="file_docs" style="display: none;">
                    <label for="addDocs" class="row my-3">
                        <h5 class="my-1">Adicionar documento</h5>
                    </label>
                    <svg xmlns="http://www.w3.org/2000/svg" id="addDocs" width="80" height="80" fill="currentColor" class="bi bi-file-earmark-plus-fill" viewBox="0 0 16 16">
                        <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zM8.5 7v1.5H10a.5.5 0 0 1 0 1H8.5V11a.5.5 0 0 1-1 0V9.5H6a.5.5 0 0 1 0-1h1.5V7a.5.5 0 0 1 1 0z" />
                    </svg>
                    <input type="submit">
                </form>

            </div>
            <div class="col d-flex justify-content-center">
                <img src="<?= TCC ?>" width="180" height="180">
            </div>
        </div>
    </div>
</section>
<?php $this->start("js"); ?>
<script>
    var fileDocs = document.getElementById("file_docs");
    var addDocs = document.getElementById("addDocs");
    addDocs.addEventListener('mouseover', e => {
        addDocs.style.cursor = "pointer";
    });
    addDocs.addEventListener('click', e => {
        fileDocs.click();
    });
</script>
<?php $this->end(); ?>