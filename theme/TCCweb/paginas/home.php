<style>
  .name-cater {
    text-decoration: none;
  }

  .title-slider {
    cursor: pointer;
  }
</style>
<?php $this->layout("../_theme"); ?>
<section class="container">
  <div class="row my-5">
    <div class="col d-flex justify-content-center">
      <img src="<?= TCC ?>" width="150" height="150">
    </div>
  </div>
  <div class="row my-5">
    <div class="col d-flex justify-content-center">
      <h1 class="text-center">Venha se divertir com o futuro do TCC !</h2>
    </div>
  </div>
</section>
<section class="row-slider my-4">
  <div class="top-slider">
    <a href="<?= URL ?>/categoriasTCC/Humanas/1" id="Hlink" class="d-none"></a>
    <h1 class="title-slider" id="H"> Humanas </h1>
    <div class="progress-bar-slider"></div>
  </div>
  <div class="cont color-slider">
    <button class="handle left-handle">
      <div class="handle-text">
        &#8249;
      </div>
    </button>
    <div class="slider">
      <?php
      foreach ($dados['humanas'] as $humanas) {
        if ($humanas->id_privado == 0) {
      ?>

          <img src="<?php if ($humanas->im_banner == null) {
                      echo IMG . '/Logos/Maximizada colorida.png';
                    } else {
                      echo IMG . '/uploads/imgUpload/' . $humanas->im_banner;
                    } ?>" class="rounded-3" alt="">

      <?php
        }
      }
      ?>

    </div>
    <button class="handle right-handle">
      <div class="handle-text">
        &#8250;
      </div>
    </button>
  </div>
</section>
<section class="row-slider my-4">
  <div class="top-slider">
    <a href="<?= URL ?>/categoriasTCC/Exatas/2" id="Elink" class="d-none"></a>
    <h1 class="title-slider cor_letras_body" id="E">Exatas</h1>
    <div class="progress-bar-slider"></div>
  </div>
  <div class="cont color-slider">
    <button class="handle left-handle">
      <div class="handle-text">
        &#8249;
      </div>
    </button>
    <div class="slider">
      <?php
      foreach ($dados['exatas'] as $exatas) {
        if ($exatas->id_privado == 0) {
      ?>
          <img src="<?php if ($exatas->im_banner == null) {
                                echo IMG . '/Logos/Maximizada colorida.png';
                            } else {
                                echo IMG . '/uploads/imgUpload/' . $exatas->im_banner;
                            } ?>" class="shadow rounded-3" alt="" >
      <?php
        }
      }
      ?>

    </div>
    <button class="handle right-handle">
      <div class="handle-text">
        &#8250;
      </div>
    </button>
  </div>
</section>
<section class="row-slider my-4">
  <div class="top-slider">
    <a href="<?= URL ?>/categoriasTCC/Biologicas/3" id="Blink" class="d-none"></a>
    <h1 class="title-slider cor_letras_body" id="B">Biológicas</h3>
      <div class="progress-bar-slider"></div>
  </div>
  <div class="cont color-slider">
    <button class="handle left-handle">
      <div class="handle-text">
        &#8249;
      </div>
    </button>
    <div class="slider">
      <?php
      foreach ($dados['biologicas'] as $biologicas) {
        if ($biologicas->id_privado == 0) {
      ?>
          <img src="<?php if ($biologicas->im_banner == null) {
                                echo IMG . '/Logos/Maximizada colorida.png';
                            } else {
                                echo IMG . '/uploads/imgUpload/' . $biologicas->im_banner;
                            } ?>" class="shadow rounded-3" alt="">
      <?php
        }
      }
      ?>

    </div>
    <button class="handle right-handle">
      <div class="handle-text">
        &#8250;
      </div>
    </button>
  </div>
</section>

<?php $this->start("js"); ?>
<script>
  var Hlink = document.getElementById("Hlink");
  var Humanas = document.getElementById("H");
  Humanas.addEventListener('click', e => {
    Hlink.click();
  });

  var Elink = document.getElementById("Elink");
  var Exatas = document.getElementById("E");
  Exatas.addEventListener('click', e => {
    Elink.click();
  });

  var Blink = document.getElementById("Blink");
  var Biologicas = document.getElementById("B");
  Biologicas.addEventListener('click', e => {
    Blink.click();
  });


  document.addEventListener('click', e => {
    let handle;

    if (e.target.matches(".handle")) {
      handle = e.target;
    } else {
      handle = e.target.closest(".handle");
    }
    if (handle != null) onHandleClick(handle);
  });

  const throttleProgressBar = throttle(() => {
    document.querySelectorAll(".progress-bar-slider").forEach(calcProgressBar);
  }, 250);

  window.addEventListener("resize", throttleProgressBar);

  document.querySelectorAll(".progress-bar-slider").forEach(calcProgressBar);

  function calcProgressBar(progressBar) {
    progressBar.innerHTML = "";
    const slider = progressBar.closest(".row-slider").querySelector(".slider");
    const itemCount = slider.children.length;
    const itemsPerScreen = parseInt(getComputedStyle(slider).getPropertyValue("--items-per-screen"));
    let sliderIndex = parseInt(getComputedStyle(slider).getPropertyValue("--slide-index"));
    const progressBarItemCount = Math.ceil(itemCount / itemsPerScreen);

    if (sliderIndex >= progressBarItemCount) {
      slider.style.setProperty("--slide-index", progressBarItemCount - 1);
      sliderIndex = progressBarItemCount - 1;
    }

    for (let i = 0; i < progressBarItemCount; i++) {
      const barItem = document.createElement("div");
      barItem.classList.add("progress-item");
      if (i === sliderIndex) {
        barItem.classList.add("active");
      }
      progressBar.append(barItem);
    }
  }

  function onHandleClick(handle) {
    const progressBar = handle.closest(".row-slider").querySelector(".progress-bar-slider");
    const slider = handle.closest(".cont").querySelector(".slider");
    const sliderIndex = parseInt(getComputedStyle(slider).getPropertyValue("--slide-index"));
    const progressBarItemCount = progressBar.children.length;

    console.log(sliderIndex);
    if (handle.classList.contains("left-handle")) {
      if (sliderIndex - 1 < 0) {
        slider.style.setProperty("--slide-index", progressBarItemCount - 1);
        progressBar.children[sliderIndex].classList.remove("active");
        progressBar.children[progressBarItemCount - 1].classList.add("active");
      } else {
        slider.style.setProperty("--slide-index", sliderIndex - 1);
        progressBar.children[sliderIndex].classList.remove("active");
        progressBar.children[sliderIndex - 1].classList.add("active");
      }

    }
    if (handle.classList.contains("right-handle")) {
      if (sliderIndex + 1 >= progressBarItemCount) {
        slider.style.setProperty("--slide-index", 0);
        progressBar.children[sliderIndex].classList.remove("active");
        progressBar.children[0].classList.add("active");
      } else {
        slider.style.setProperty("--slide-index", sliderIndex + 1);
        progressBar.children[sliderIndex].classList.remove("active");
        progressBar.children[sliderIndex + 1].classList.add("active");
      }

    }
  }

  function throttle(cb, delay = 1000) {
    let shouldWait = false
    let waitingArgs
    const timeoutFunc = () => {
      if (waitingArgs == null) {
        shouldWait = false
      } else {
        cb(...waitingArgs)
        waitingArgs = null
        setTimeout(timeoutFunc, delay)
      }
    }

    return (...args) => {
      if (shouldWait) {
        waitingArgs = args
        return
      }

      cb(...args)
      shouldWait = true
      setTimeout(timeoutFunc, delay)
    }
  }
</script>
<?php $this->end(); ?>