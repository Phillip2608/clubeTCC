<?php $this->layout("../_theme"); ?>
<main class="container my-5 fundo">
    <div class="col-10 mx-auto shadow">
        <div class="row">
            <?php include 'menu_config.php'; ?>
            <div class="col p-3 bg-light">
                <h3 class="mx-3 my-2">Escolha seu tema</h3>
                <form action="<?= $router->route("configure.temas"); ?>" method="POST">
                    <div class="row my-4 d-flex align-items-center justify-content-around flex-wrap">
                        <div class="col btn-temas col-lg-1 d-flex justify-content-center flex-wrap align-items-center">
                            <input class="form-check-input p-5 bg-light rounded-2 border shadow" type="radio" name="nm_tema" id="flexRadioDefault1" value="1">
                            <label class="px-2 py-1" for="flexRadioDefault1">
                                Claro
                            </label>
                        </div>
                        <div class="col btn-temas col-lg-1 d-flex justify-content-center flex-wrap align-items-center">
                            <input class="form-check-input p-5 bg-dark rounded-2 border shadow" type="radio" name="nm_tema" id="flexRadioDefault2" value="2">
                            <label class="px-2 py-1" for="flexRadioDefault2">
                                Escuro
                            </label>
                        </div>
                        <div class="col btn-temas col-lg-1 d-flex justify-content-center flex-wrap align-items-center">
                            <input class="form-check-input p-5 bg-danger rounded-2 border shadow" type="radio" name="nm_tema" id="flexRadioDefault3" value="3">
                            <label class="px-2 py-1" for="flexRadioDefault3">
                                Vermelho
                            </label>
                        </div>
                        <div class="col btn-temas col-lg-1 d-flex justify-content-center flex-wrap align-items-center">
                            <input class="form-check-input p-5 bg-primary rounded-2 border shadow" type="radio" name="nm_tema" id="flexRadioDefault4" value="4">
                            <label class="px-3 py-1" for="flexRadioDefault4">
                                Azul
                            </label>
                        </div>
                    </div>
                    <div class="row my-4 d-flex align-items-center justify-content-around flex-wrap">
                        <div class="col btn-temas col-lg-1 d-flex justify-content-center flex-wrap align-items-center">
                            <input class="form-check-input p-5 rounded-2 border shadow cor-roxa" type="radio" name="nm_tema" id="flexRadioDefault1" value="7">
                            <label class="px-2 py-1" for="flexRadioDefault1">
                                Roxo
                            </label>
                        </div>
                    </div>
                    <h3 class="mx-3 my-2">Tema Contraste</h3>
                    <div class="row my-4 d-flex align-items-center justify-content-start mx-5 flex-wrap">
                        <div class="col mx-2 btn-temas col-lg-1 d-flex justify-content-center flex-wrap align-items-center">
                            <input class="form-check-input p-5 bg-dark rounded-2 border border-warning border-3 shadow" type="radio" name="nm_tema" id="flexRadioDefault5" value="5">
                            <label class="px-2 py-1" for="flexRadioDefault5">
                                Contraste
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mx-3 d-flex justify-content-center">
                            <input type="submit" class="btn btn-success" value="Salvar Tema!">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>