<?php $this->layout("../_theme"); ?>
<main>
    <section class="container bg-light">
        <div class="row my-4">
            <div class="col-11 mx-auto">
                <h2 class="my-3">Crie seu TCC!</h2>
                <h5>Para começar é facil, basta falar o nome!</h5>
            </div>
        </div>
        <?php foreach ($dados['meusTCC'] as $meutcc) {
            $dados['idtcc'] = $meutcc->id_tcc;
        ?>
            <div class="row my-2">
                <div class="col-11 mx-auto btn-tcc">
                    <a href="<?= $router->route("dashboard.geral"); ?>" class="btn p-5 d-flex bg-success justify-content-center my-4">
                        <h1 class="p-2"><?= $meutcc->nm_tcc ?></h1>
                    </a>
                </div>
            </div>
        <?php

        } ?>
        <div class="row my-2">
            <div class="col-11 mx-auto">
                <div onclick="criarTCC()" class="criar_tcc btn p-5 d-flex justify-content-center my-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z" />
                    </svg>
                </div>
            </div>
        </div>
        <div class="row" id="formTCC">
            <form action="<?= $router->route("dashboard.index"); ?>" method="POST">
                <div class="col-11 mx-auto py-3">
                    <label for="TCC" class="form-label">Nome do TCC</label>
                    <input type="text" class="form-control <?= $dados['erroTCC'] ? 'is-invalid' : '' ?>" name="nm_tcc" id="TCC" placeholder="Aperte ENTER para criar" value="<?= $dados['nomeTCC'] ?>">
                    <div class="invalid-feedback">
                        <?= $dados['erroTCC'] ?>
                    </div>
                    <select name="id_categoria" id="" class="form-select my-3 <?= $dados['erroIdTCC'] ? 'is-invalid' : '' ?>">
                        <option value="0" disabled selected>Classifique seu TCC</option>
                        <?php
                        foreach ($dados['categorias'] as $categoria) {
                        ?>
                            <option value="<?= $categoria->id_categoria ?>"><?= $categoria->nm_categoria ?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <div class="invalid-feedback">
                        <?= $dados['erroIdTCC'] ?>
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

                    <input type="submit" class="btn btn-success" value="Criar">
                </div>
            </form>
        </div>
    </section>
</main>
<script>
    function criarTCC() {
        var nm_tcc = document.getElementById("formTCC");

        nm_tcc.style.display = "block";
    }
</script>