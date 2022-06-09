<?php $this->layout("../_theme"); ?>
<section class="container">
    <div class="row">
        <h1 class="text-center my-4"> <?= $dados['titulo'] ?> </h1>
    </div>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 my-3 d-flex justify-content-start">
        <?php
        foreach ($dados['tccsH'] as $tccH) {
        ?>
            <div class="col card-cater">
                <form action="<?= $router->route("paginas.create"); ?>" class="form_tccH d-none" method="POST" enctype="multipart/form-data">
                    <input type="text" name="id_viewTCC" id="id_viewTCC" class="d-none" value="<?= $tccH->id_tcc ?>">
                    <input type="submit" class="d-none submitTCC<?= $tccH->id_tcc ?>">
                </form>
                <img src="<?php if ($tccH->im_banner == null) {
                                echo IMG . '/Logos/Maximizada colorida.png';
                            } else {
                                echo IMG . '/uploads/imgUpload/' . $tccH->im_banner;
                            } ?>" class="img-card-cater shadow rounded-3  imgTCC<?= $tccH->id_tcc ?>" alt="" onclick="clickForm(<?= $tccH->id_tcc ?>)">
            </div>
        <?php
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

        $(".form_tccH").submit(function(e) {
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