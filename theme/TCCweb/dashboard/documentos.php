<?php $this->layout("../_theme"); ?>
<section class="container my-5">
    <?php
    include 'menu_respon.php';
    ?>
    <div class="col-11 mx-auto bg-light py-3">
        <div class="row p-4 row-cols-1 row-cols-sm-2 g-3 d-flex align-items-center">
            <div class="col">
                <h2><?= $dados['titulo'] ?></h2>
                <?= message('DocsOK') ?>
                <form action="<?= $router->route("dashboard.documentos"); ?>" method="POST" enctype="multipart/form-data">

                    <input multiple type="file" name="file_docs[]" id="file_docs" style="display: none;">
                    <label for="addDocs" class="row my-3">
                        <h5 class="my-1">Adicionar documento</h5>
                    </label>
                    <div class="card col-2 bg-light border border-0">
                        <svg xmlns="http://www.w3.org/2000/svg" id="addDocs" width="80" height="80" fill="currentColor" class="bi bi-file-earmark-plus-fill mx-auto my-3" viewBox="0 0 16 16">
                            <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zM8.5 7v1.5H10a.5.5 0 0 1 0 1H8.5V11a.5.5 0 0 1-1 0V9.5H6a.5.5 0 0 1 0-1h1.5V7a.5.5 0 0 1 1 0z" />
                        </svg>
                        <input type="submit" class="btn btn-success">
                    </div>
                </form>
                <div class="row">
                    <h5 class="row my-3 mx-1">Todos os documentos</h5>
                    <div class="row">
                        <?php
                        if ($dados['docs'] == null) {
                            echo "<div class='col mx-1 text-danger my-1'><h6>TCC sem documentação!</h6></div>";
                        } else {
                        ?>
                            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-1 mx-3 d-flex justify-content-start">
                                <?php
                                foreach ($dados['docs'] as $docs) {
                                    $minusculasNM = strtolower($docs->nm_documento);
                                    $minusculasEX = strtolower($docs->nm_tipoDocs);

                                    if ($minusculasNM > 12) {
                                        if ($minusculasEX == "txt") {
                                            $titulo_doc = substr($minusculasNM, 0, 5);
                                ?>
                                            <div class="card col-2 bg-light border border-0 my-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="currentColor" class="bi bi-file-earmark-font-fill mx-auto " viewBox="0 0 16 16">
                                                    <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zM5.057 6h5.886L11 8h-.5c-.18-1.096-.356-1.192-1.694-1.235l-.298-.01v5.09c0 .47.1.582.903.655v.5H6.59v-.5c.799-.073.898-.184.898-.654V6.755l-.293.01C5.856 6.808 5.68 6.905 5.5 8H5l.057-2z" />
                                                </svg>
                                                <h5 class="row mx-auto"><?= $titulo_doc . "." . $minusculasEX; ?></h5>
                                            </div>
                                        <?php
                                        } elseif ($minusculasEX == "ppt") {
                                            $titulo_doc = substr($minusculasNM, 0, 5);
                                        ?>
                                            <div class="card col-2 bg-light border border-0 my-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="currentColor" class="bi bi-file-earmark-ppt-fill mx-auto" viewBox="0 0 16 16">
                                                <path d="M8.188 10H7V6.5h1.188a1.75 1.75 0 1 1 0 3.5z" />
                                                <path d="M4 0h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2zm5.5 1.5v2a1 1 0 0 0 1 1h2l-3-3zM7 5.5a1 1 0 0 0-1 1V13a.5.5 0 0 0 1 0v-2h1.188a2.75 2.75 0 0 0 0-5.5H7z" />
                                            </svg>
                                            <h5 class="row mx-auto"><?= $titulo_doc . "." . $minusculasEX; ?></h5>
                                            </div>
                                        <?php
                                        } elseif ($minusculasEX == "pdf") {
                                            $titulo_doc = substr($minusculasNM, 0, 5);
                                        ?>
                                        <div class="card col-2 bg-light border border-0 my-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="currentColor" class="bi bi-file-earmark-pdf-fill d-block mx-auto mb-1 my-1" viewBox="0 0 16 16">
                                                <path d="M5.523 12.424c.14-.082.293-.162.459-.238a7.878 7.878 0 0 1-.45.606c-.28.337-.498.516-.635.572a.266.266 0 0 1-.035.012.282.282 0 0 1-.026-.044c-.056-.11-.054-.216.04-.36.106-.165.319-.354.647-.548zm2.455-1.647c-.119.025-.237.05-.356.078a21.148 21.148 0 0 0 .5-1.05 12.045 12.045 0 0 0 .51.858c-.217.032-.436.07-.654.114zm2.525.939a3.881 3.881 0 0 1-.435-.41c.228.005.434.022.612.054.317.057.466.147.518.209a.095.095 0 0 1 .026.064.436.436 0 0 1-.06.2.307.307 0 0 1-.094.124.107.107 0 0 1-.069.015c-.09-.003-.258-.066-.498-.256zM8.278 6.97c-.04.244-.108.524-.2.829a4.86 4.86 0 0 1-.089-.346c-.076-.353-.087-.63-.046-.822.038-.177.11-.248.196-.283a.517.517 0 0 1 .145-.04c.013.03.028.092.032.198.005.122-.007.277-.038.465z" />
                                                <path fill-rule="evenodd" d="M4 0h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2zm5.5 1.5v2a1 1 0 0 0 1 1h2l-3-3zM4.165 13.668c.09.18.23.343.438.419.207.075.412.04.58-.03.318-.13.635-.436.926-.786.333-.401.683-.927 1.021-1.51a11.651 11.651 0 0 1 1.997-.406c.3.383.61.713.91.95.28.22.603.403.934.417a.856.856 0 0 0 .51-.138c.155-.101.27-.247.354-.416.09-.181.145-.37.138-.563a.844.844 0 0 0-.2-.518c-.226-.27-.596-.4-.96-.465a5.76 5.76 0 0 0-1.335-.05 10.954 10.954 0 0 1-.98-1.686c.25-.66.437-1.284.52-1.794.036-.218.055-.426.048-.614a1.238 1.238 0 0 0-.127-.538.7.7 0 0 0-.477-.365c-.202-.043-.41 0-.601.077-.377.15-.576.47-.651.823-.073.34-.04.736.046 1.136.088.406.238.848.43 1.295a19.697 19.697 0 0 1-1.062 2.227 7.662 7.662 0 0 0-1.482.645c-.37.22-.699.48-.897.787-.21.326-.275.714-.08 1.103z" />
                                            </svg>
                                            <h5 class="row mx-auto"><?= $titulo_doc . "." . $minusculasEX; ?></h5>
                                        </div>
                                            <?php
                                        } elseif ($minusculasEX == "png" || $minusculasEX == "gif" || $minusculasEX == "jpg" || $minusculasEX == "jpeg") {
                                            $titulo_doc = substr($minusculasNM, 0, 5);
                                            if ($docs->nm_tipoDocs == 'png' || $docs->nm_tipoDocs == 'gif' || $docs->nm_tipoDocs == 'jpg' || $docs->nm_tipoDocs == 'jpeg') {
                                            ?>
                                                <div class="card col-2 bg-light border border-0 my-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="currentColor" class="bi bi-file-earmark-image mx-auto" viewBox="0 0 16 16">
                                                        <path d="M6.502 7a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z" />
                                                        <path d="M14 14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5V14zM4 1a1 1 0 0 0-1 1v10l2.224-2.224a.5.5 0 0 1 .61-.075L8 11l2.157-3.02a.5.5 0 0 1 .76-.063L13 10V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4z" />
                                                    </svg>
                                                    <h5 class="row mx-auto"><?= $titulo_doc . "." . $minusculasEX; ?></h5>
                                                </div>
                                <?php

                                            }
                                        } else {
                                            echo "Arquivo não encontrado ou inválido";
                                        }
                                    }
                                }
                                ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>

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