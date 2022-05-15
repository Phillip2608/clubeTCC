<?php $this->layout("../_theme"); ?>
<main>
    <section class="container my-5">
        <?php
        include 'menu_respon.php';
        ?>
        <div class="col-11 mx-auto bg-light py-3">
            <div class="row p-4 row-cols-1 row-cols-sm-2 g-3">
                <div class="col">
                    <a href="">
                        <div class="card shadow-sm">
                            <svg class="bd-placeholder-img card-img-top" width="100%" height="630" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                                <rect width="100%" height="100%" fill="#55595c"></rect><text x="38%" y="50%" fill="#eceeef" dy=".3em">Adicionar um Banner</text>
                            </svg>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <div class="card border border-0 bg-light">


                        <h2><?= $dados['titulo'] ?></h2>

                        <div class="row my-3">
                            <div class="col">
                                <h4>Nome</h4>
                                <h6><?= $dados['tcc']->nm_tcc ?></h6>
                            </div>
                        </div>
                        <div class="row my-2">
                            <div class="col">
                                <h4>Descrição</h4>
                                <h6 class="card-text">
                                    <?php
                                    if ($dados['tcc']->ds_tcc == null) {
                                        echo "Nenhuma descrição foi feita";
                                    } else {
                                        echo $dados['tcc']->ds_tcc;
                                    }
                                    ?>
                                </h6>
                            </div>
                        </div>
                        <div class="row row-cols-1 my-2">
                            <div class="col">
                                <h4>Documentos</h4>
                                <div class="row">
                                    <?php
                                    if ($dados['docs'] == null) {
                                        echo "<div class='col mx-1 text-danger my-1'><h6>TCC sem documentação!</h6></div>";
                                    } else {
                                    ?>
                                        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-1 d-flex justify-content-start">
                                            <?php
                                            foreach ($dados['docs'] as $docs) {
                                                $minusculasNM = strtolower($docs->nm_documento);
                                                $minusculasEX = strtolower($docs->nm_tipoDocs);

                                                if ($minusculasNM > 12) {
                                                    if ($minusculasEX == "txt") {
                                                        $up_caminho = "/txtUpload";
                                                        $titulo_doc = substr($minusculasNM, 0, 5);
                                            ?>
                                                        <div class="card col-2 bg-light border border-0 my-2">

                                                            <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="currentColor" class="bi bi-file-earmark-font-fill mx-auto" viewBox="0 0 16 16">
                                                                <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zM5.057 6h5.886L11 8h-.5c-.18-1.096-.356-1.192-1.694-1.235l-.298-.01v5.09c0 .47.1.582.903.655v.5H6.59v-.5c.799-.073.898-.184.898-.654V6.755l-.293.01C5.856 6.808 5.68 6.905 5.5 8H5l.057-2z" />
                                                            </svg>

                                                            <h5 class="mx-auto"><?= $titulo_doc . "." . $minusculasEX; ?></h5>

                                                        </div>
                                                    <?php
                                                    } elseif ($minusculasEX == "ppt") {
                                                        $titulo_doc = substr($minusculasNM, 0, 5);
                                                        $up_caminho = "/pptUpload";
                                                    ?>
                                                        <div class="card col-2 bg-light border border-0 my-2">

                                                            <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="currentColor" class="bi bi-file-earmark-ppt-fill mx-auto" viewBox="0 0 16 16">
                                                                <path d="M8.188 10H7V6.5h1.188a1.75 1.75 0 1 1 0 3.5z" />
                                                                <path d="M4 0h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2zm5.5 1.5v2a1 1 0 0 0 1 1h2l-3-3zM7 5.5a1 1 0 0 0-1 1V13a.5.5 0 0 0 1 0v-2h1.188a2.75 2.75 0 0 0 0-5.5H7z" />
                                                            </svg>

                                                            <h5 class="mx-auto"><?= $titulo_doc . "." . $minusculasEX; ?></h5>
                                                        </div>
                                                    <?php
                                                    } elseif ($minusculasEX == "pdf") {
                                                        $titulo_doc = substr($minusculasNM, 0, 5);
                                                        $up_caminho = "/pdfUpload";
                                                    ?>
                                                        <div class="card col-2 bg-light border border-0 my-2">

                                                            <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="currentColor" class="bi bi-file-earmark-pdf-fill d-block mx-auto mb-1 my-1" viewBox="0 0 16 16">
                                                                <path d="M5.523 12.424c.14-.082.293-.162.459-.238a7.878 7.878 0 0 1-.45.606c-.28.337-.498.516-.635.572a.266.266 0 0 1-.035.012.282.282 0 0 1-.026-.044c-.056-.11-.054-.216.04-.36.106-.165.319-.354.647-.548zm2.455-1.647c-.119.025-.237.05-.356.078a21.148 21.148 0 0 0 .5-1.05 12.045 12.045 0 0 0 .51.858c-.217.032-.436.07-.654.114zm2.525.939a3.881 3.881 0 0 1-.435-.41c.228.005.434.022.612.054.317.057.466.147.518.209a.095.095 0 0 1 .026.064.436.436 0 0 1-.06.2.307.307 0 0 1-.094.124.107.107 0 0 1-.069.015c-.09-.003-.258-.066-.498-.256zM8.278 6.97c-.04.244-.108.524-.2.829a4.86 4.86 0 0 1-.089-.346c-.076-.353-.087-.63-.046-.822.038-.177.11-.248.196-.283a.517.517 0 0 1 .145-.04c.013.03.028.092.032.198.005.122-.007.277-.038.465z" />
                                                                <path fill-rule="evenodd" d="M4 0h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2zm5.5 1.5v2a1 1 0 0 0 1 1h2l-3-3zM4.165 13.668c.09.18.23.343.438.419.207.075.412.04.58-.03.318-.13.635-.436.926-.786.333-.401.683-.927 1.021-1.51a11.651 11.651 0 0 1 1.997-.406c.3.383.61.713.91.95.28.22.603.403.934.417a.856.856 0 0 0 .51-.138c.155-.101.27-.247.354-.416.09-.181.145-.37.138-.563a.844.844 0 0 0-.2-.518c-.226-.27-.596-.4-.96-.465a5.76 5.76 0 0 0-1.335-.05 10.954 10.954 0 0 1-.98-1.686c.25-.66.437-1.284.52-1.794.036-.218.055-.426.048-.614a1.238 1.238 0 0 0-.127-.538.7.7 0 0 0-.477-.365c-.202-.043-.41 0-.601.077-.377.15-.576.47-.651.823-.073.34-.04.736.046 1.136.088.406.238.848.43 1.295a19.697 19.697 0 0 1-1.062 2.227 7.662 7.662 0 0 0-1.482.645c-.37.22-.699.48-.897.787-.21.326-.275.714-.08 1.103z" />
                                                            </svg>

                                                            <h5 class="mx-auto"><?= $titulo_doc . "." . $minusculasEX; ?></h5>
                                                        </div>
                                                        <?php
                                                    } elseif ($minusculasEX == "png" || $minusculasEX == "gif" || $minusculasEX == "jpg" || $minusculasEX == "jpeg") {
                                                        $up_caminho = "/imgUpload";
                                                        $titulo_doc = substr($minusculasNM, 0, 5);
                                                        if ($docs->nm_tipoDocs == 'png' || $docs->nm_tipoDocs == 'gif' || $docs->nm_tipoDocs == 'jpg' || $docs->nm_tipoDocs == 'jpeg') {
                                                        ?>
                                                            <div class="card col-2 bg-light border border-0 my-2">

                                                                <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="currentColor" class="bi bi-file-earmark-image mx-auto" viewBox="0 0 16 16">
                                                                    <path d="M6.502 7a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z" />
                                                                    <path d="M14 14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5V14zM4 1a1 1 0 0 0-1 1v10l2.224-2.224a.5.5 0 0 1 .61-.075L8 11l2.157-3.02a.5.5 0 0 1 .76-.063L13 10V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4z" />
                                                                </svg>

                                                                <h5 class="mx-auto"><?= $titulo_doc . "." . $minusculasEX; ?></h5>
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
                        <div class="row">
                            <div class="col">
                                <a href="" class="btn btn-outline-dark mx-auto">
                                    ver todos os documentos
                                </a>
                            </div>
                        </div>
                        <h3 class="my-3">Integrantes</h3>
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
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-mortarboard-fill link-dark mx-auto" viewBox="0 0 16 16">
                                                <path d="M8.211 2.047a.5.5 0 0 0-.422 0l-7.5 3.5a.5.5 0 0 0 .025.917l7.5 3a.5.5 0 0 0 .372 0L14 7.14V13a1 1 0 0 0-1 1v2h3v-2a1 1 0 0 0-1-1V6.739l.686-.275a.5.5 0 0 0 .025-.917l-7.5-3.5Z" />
                                                <path d="M4.176 9.032a.5.5 0 0 0-.656.327l-.5 1.7a.5.5 0 0 0 .294.605l4.5 1.8a.5.5 0 0 0 .372 0l4.5-1.8a.5.5 0 0 0 .294-.605l-.5-1.7a.5.5 0 0 0-.656-.327L8 10.466 4.176 9.032Z" />
                                            </svg>
                                        <?php } ?>
                                        <h5><?= $inter->nm_cargo ?></h5>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="75" height="75" fill="currentColor" class="bi bi-person-fill d-block mx-auto border border-0 rounded-circle bg-secondary p-2" viewBox="0 0 16 16">
                                            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                        </svg>
                                        <div class="mx-2">
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
                        </div>
                        <div class="row">
                            <div class="col my-2">
                                <a href="<?= URL ?>/dashboard/dadosgerais/<?= $_SESSION['id_usuario'] ?>/<?= $_SESSION['id_tcc'] ?>" class="btn btn-outline-dark mx-auto">
                                    ver todos os integrantes
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mx-3">
                <h2 class="py-3">Pesquisa de Campo</h2>
            </div>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 d-flex justify-content-start mx-3">
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
                                <p class="card-text"><?= $pesquisas->ds_pesquisa ?></p>
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
                    </div>
                <?php } ?>
            </div>
        </div>

    </section>
</main>