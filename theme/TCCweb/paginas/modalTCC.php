<div class="data-tcc">
    <div class="row p-2">
        <div class="col d-flex justify-content-between align-items-center">
            <h1><?= $tcc['tcc']->nm_tcc ?></h1>
            <h1 onclick="closeModal()" class="close_tcc rounded-circle">X</h1>
        </div>

    </div>
    <div class="row p-2 row-cols-1 row-cols-sm-2 g-3">
        <div class="col">
            <img src="<?php if ($tcc['tcc']->im_banner == null) {
                            echo IMG . '/Logos/Maximizada colorida.png';
                        } else {
                            echo IMG . '/uploads/imgUpload/' . $tcc['tcc']->im_banner;
                        } ?>" alt="" width="100%" height="650" class="img_banner border border-0 rounded-3 p-0 shadow-sm my-2">

        </div>
        <div class="col">
            <div class="row">
                <div class="col d-flex align-items-center">
                    <img src="<?php if ($tcc['tcc']->im_usuario == null) {
                                    echo ICON . "/person.png";
                                } else {
                                    echo $tcc['tcc']->im_usuario;
                                } ?>" alt="" width="100" height="100" class="img_user_upp bg-secondary rounded-circle p-0">
                    <div class="mx-2">
                        <h4 class="text-branco"><?= $tcc['tcc']->nm_usuario ?></h4>
                        <h6 class="text-branco"><?= date("d F | h:i a ", strtotime($tcc['tcc']->dt_tcc)) ?></h6>
                    </div>
                </div>
            </div>
            <div class="row my-4 mx-1">
                <div class="col">
                    <h3 class="text-branco">Categoria</h3>
                    <h5 class="text-branco"><?php if ($tcc['tcc']->id_categoria == 1) {
                                                echo "Humanas";
                                            } elseif ($tcc['tcc']->id_categoria == 2) {
                                                echo "Exatas";
                                            } else {
                                                echo "Biologicas";
                                            } ?></h5>
                </div>
            </div>
            <div class="row my-4 mx-1">
                <div class="col">
                    <h3 class="text-branco">Descrição</h3>
                    <h5 class="text-branco"><?php if ($tcc['tcc']->ds_tcc == null) {
                                                echo "TCC sem documentação!";
                                            } else {
                                                echo $tcc['tcc']->ds_tcc;
                                            } ?></h5>
                </div>
            </div>
            <div class="row my-4 mx-1">
                <div class="col">
                    <h3 class="text-branco">Documentos</h3>
                    <h5 class="text-warning">Clique para download</h5>
                    <?php
                    if ($tcc['docs'] == null) {
                        echo "<div class='col mx-1 text-danger my-1'><h6>TCC sem documentação!</h6></div>";
                    } else {
                    ?>
                        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-1 d-flex justify-content-start">
                            <?php
                            foreach ($tcc['docs'] as $docs) {
                                $minusculasNM = strtolower($docs->nm_documento);
                                $minusculasEX = strtolower($docs->nm_tipoDocs);

                                if ($minusculasNM > 12) {
                                    if ($minusculasEX == "txt") {
                                        $up_caminho = "/txtUpload";
                                        $titulo_doc = substr($minusculasNM, 0, 5);
                            ?>
                                        <div class="card col-2 bg-escuro border border-0 my-2">
                                            <a href="<?= IMG . '/uploads' . $up_caminho . '/' . $docs->nm_newName ?>" download="<?= $docs->nm_documento ?>" class="text-reset mx-auto">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="currentColor" class="bi bi-file-earmark-font-fill mx-auto" viewBox="0 0 16 16">
                                                    <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zM5.057 6h5.886L11 8h-.5c-.18-1.096-.356-1.192-1.694-1.235l-.298-.01v5.09c0 .47.1.582.903.655v.5H6.59v-.5c.799-.073.898-.184.898-.654V6.755l-.293.01C5.856 6.808 5.68 6.905 5.5 8H5l.057-2z" />
                                                </svg>
                                            </a>
                                            <h5 class="mx-auto"><?= $titulo_doc . "." . $minusculasEX; ?></h5>
                                        </div>
                                    <?php
                                    } elseif ($minusculasEX == "ppt") {
                                        $titulo_doc = substr($minusculasNM, 0, 5);
                                        $up_caminho = "/pptUpload";
                                    ?>
                                        <div class="card col-2 bg-escuro border border-0 my-2">
                                            <a href="<?= IMG . '/uploads' . $up_caminho . '/' . $docs->nm_newName ?>" download="<?= $docs->nm_documento ?>" class="text-reset mx-auto">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="currentColor" class="bi bi-file-earmark-ppt-fill mx-auto" viewBox="0 0 16 16">
                                                    <path d="M8.188 10H7V6.5h1.188a1.75 1.75 0 1 1 0 3.5z" />
                                                    <path d="M4 0h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2zm5.5 1.5v2a1 1 0 0 0 1 1h2l-3-3zM7 5.5a1 1 0 0 0-1 1V13a.5.5 0 0 0 1 0v-2h1.188a2.75 2.75 0 0 0 0-5.5H7z" />
                                                </svg>
                                            </a>
                                            <h5 class="mx-auto"><?= $titulo_doc . "." . $minusculasEX; ?></h5>
                                        </div>
                                    <?php
                                    } elseif ($minusculasEX == "pdf") {
                                        $titulo_doc = substr($minusculasNM, 0, 5);
                                        $up_caminho = "/pdfUpload";
                                    ?>
                                        <div class="card col-2 bg-escuro border border-0 my-2">
                                            <a href="<?= IMG . '/uploads' . $up_caminho . '/' . $docs->nm_newName ?>" download="<?= $docs->nm_documento ?>" class="text-reset mx-auto">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="currentColor" class="bi bi-file-earmark-pdf-fill mx-auto" viewBox="0 0 16 16">
                                                    <path d="M5.523 12.424c.14-.082.293-.162.459-.238a7.878 7.878 0 0 1-.45.606c-.28.337-.498.516-.635.572a.266.266 0 0 1-.035.012.282.282 0 0 1-.026-.044c-.056-.11-.054-.216.04-.36.106-.165.319-.354.647-.548zm2.455-1.647c-.119.025-.237.05-.356.078a21.148 21.148 0 0 0 .5-1.05 12.045 12.045 0 0 0 .51.858c-.217.032-.436.07-.654.114zm2.525.939a3.881 3.881 0 0 1-.435-.41c.228.005.434.022.612.054.317.057.466.147.518.209a.095.095 0 0 1 .026.064.436.436 0 0 1-.06.2.307.307 0 0 1-.094.124.107.107 0 0 1-.069.015c-.09-.003-.258-.066-.498-.256zM8.278 6.97c-.04.244-.108.524-.2.829a4.86 4.86 0 0 1-.089-.346c-.076-.353-.087-.63-.046-.822.038-.177.11-.248.196-.283a.517.517 0 0 1 .145-.04c.013.03.028.092.032.198.005.122-.007.277-.038.465z" />
                                                    <path fill-rule="evenodd" d="M4 0h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2zm5.5 1.5v2a1 1 0 0 0 1 1h2l-3-3zM4.165 13.668c.09.18.23.343.438.419.207.075.412.04.58-.03.318-.13.635-.436.926-.786.333-.401.683-.927 1.021-1.51a11.651 11.651 0 0 1 1.997-.406c.3.383.61.713.91.95.28.22.603.403.934.417a.856.856 0 0 0 .51-.138c.155-.101.27-.247.354-.416.09-.181.145-.37.138-.563a.844.844 0 0 0-.2-.518c-.226-.27-.596-.4-.96-.465a5.76 5.76 0 0 0-1.335-.05 10.954 10.954 0 0 1-.98-1.686c.25-.66.437-1.284.52-1.794.036-.218.055-.426.048-.614a1.238 1.238 0 0 0-.127-.538.7.7 0 0 0-.477-.365c-.202-.043-.41 0-.601.077-.377.15-.576.47-.651.823-.073.34-.04.736.046 1.136.088.406.238.848.43 1.295a19.697 19.697 0 0 1-1.062 2.227 7.662 7.662 0 0 0-1.482.645c-.37.22-.699.48-.897.787-.21.326-.275.714-.08 1.103z" />
                                                </svg>
                                            </a>
                                            <h5 class="mx-auto"><?= $titulo_doc . "." . $minusculasEX; ?></h5>
                                        </div>
                                        <?php
                                    } elseif ($minusculasEX == "png" || $minusculasEX == "gif" || $minusculasEX == "jpg" || $minusculasEX == "jpeg") {
                                        $up_caminho = "/imgUpload";
                                        $titulo_doc = substr($minusculasNM, 0, 5);
                                        if ($docs->nm_tipoDocs == 'png' || $docs->nm_tipoDocs == 'gif' || $docs->nm_tipoDocs == 'jpg' || $docs->nm_tipoDocs == 'jpeg') {
                                        ?>
                                            <div class="card col-2 bg-escuro border border-0 my-2">
                                                <a href="<?= IMG . '/uploads' . $up_caminho . '/' . $docs->nm_newName ?>" download="<?= $docs->nm_documento ?>" class="text-reset mx-auto">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="currentColor" class="bi bi-file-earmark-image mx-auto" viewBox="0 0 16 16">
                                                        <path d="M6.502 7a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z" />
                                                        <path d="M14 14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5V14zM4 1a1 1 0 0 0-1 1v10l2.224-2.224a.5.5 0 0 1 .61-.075L8 11l2.157-3.02a.5.5 0 0 1 .76-.063L13 10V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4z" />
                                                    </svg>
                                                </a>
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
    </div>
    <div class="row p-2">
        <h1>Pesquisas de Campo</h1>
    </div>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 d-flex justify-content-start mx-3 view-pesquisas">
            <?php  if($tcc['pesq'] == null){
                echo "<div class='col mx-1 text-danger my-1'><h6>TCC sem pesquisa de campo!</h6></div>";
            }else{ ?>
            <?php foreach ($tcc['pesq'] as $pesquisas) { ?>
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
                        <div class="card bg-escuro">
                            <a href="<?= $pesquisas->ds_link ?>" target="_blank" class="btn btn-outline-primary p-2">
                                Visualizar pesquisa
                            </a>
                        </div>
                    </div>
                </div>
            <?php } } ?>
        </div>
</div>