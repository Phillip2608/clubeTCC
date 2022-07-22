<?php $this->layout("../_theme"); ?>
<section class="container">
    <div class="row">
        <h1 class="text-center my-4"> <?= $dados['titulo'] ?> </h1>
    </div>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 my-3 d-flex justify-content-start">
        <?php
        foreach ($dados['tccsB'] as $tccB) {
            if($tccB->id_privado == 0){
        ?>
            <div class="col card-cater">
                <form action="<?= $router->route("paginas.create"); ?>" class="form_tccB d-none" method="POST" enctype="multipart/form-data">
                    <input type="text" name="id_viewTCC" id="id_viewTCC" class="d-none" value="<?= $tccB->id_tcc ?>">
                    <input type="submit" class="d-none submitTCC<?= $tccB->id_tcc ?>">
                </form>
                <img src="<?php if ($tccB->im_banner == null) {
                                echo IMG . '/Logos/Maximizada colorida.png';
                            } else {
                                echo IMG . '/uploads/imgUpload/' . $tccB->im_banner;
                            } ?>" class="img-card-cater shadow rounded-3 imgTCC<?= $tccB->id_tcc ?>" alt="" onclick="clickForm(<?= $tccB->id_tcc ?>)">
            </div>
        <?php
            }
        }
        ?>
    </div>
    <div class="cont-tcc" id="modalTCC" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modalTCC">
        </div>
    </div>
</section>
<?php $this->start("js"); ?>
<script>
    const activeModalClass = 'modal-show';
    var modalTCC = document.querySelector(".cont-tcc");
    var modal = document.querySelector(".modalTCC");
    var data_tcc = modal.getElementsByTagName("div");

    function closeModal() {
        modal.removeChild(data_tcc[0]);
        modalTCC.classList.remove(activeModalClass);
    }

    function clickForm(id_tcc) {
        var imgTCC = document.querySelector(".imgTCC" + id_tcc);
        var submitTCC = document.querySelector(".submitTCC" + id_tcc);
        modalTCC.classList.add(activeModalClass);

        modalTCC.addEventListener("click", e => {
            if (modal.contains(e.target)) {
                return;
            }
            closeModal();

        });
        console.log("cliquei" + id_tcc);
        submitTCC.click();
    }

    $(function() {
        function load(action) {
            var load_div = $(".ajax_load");
        }

        $(".form_tccB").submit(function(e) {
            e.preventDefault();
            var form = $(this);
            var form_ajax = $(".form_ajax");
            var tcc = $(".modalTCC");

            $.ajax({
                url: form.attr("action"),
                data: form.serialize(),
                type: "POST",
                dataType: "json",
                beforeSend: function() {

                },
                success: function(callback) {
                    if (callback.tcc) {
                        console.log(callback);
                        tcc.prepend(callback.tcc);
                    }
                },
                complete: function() {

                }
            });
        });
    });
</script>
<?php $this->end(); ?>