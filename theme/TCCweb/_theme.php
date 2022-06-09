<html lang="pt-br">
<head>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- BOOTSTRAP -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

	<!-- GOOGLE FONTS -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Rowdies&display=swap" rel="stylesheet">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,500;0,900;1,300&display=swap" rel="stylesheet">

	<!-- CSS BRUTO DO SITE -->
	<link rel="stylesheet" href="<?= CSS ?>/cores.css">
	<link rel='stylesheet' href="<?= CSS ?>/Style.css">
	<link rel="stylesheet" href="<?= CSS ?>/Carousel.css">
	<link rel="stylesheet" href="<?= CSS ?>/StyleCategorias.css">
    <?php
	if (($_SESSION['id_tema'] == null) || ($_SESSION['id_tema'] == 1)) {
		echo "<link rel='stylesheet' href='" . CSS . "/temas/Branco.css'>";
	} elseif ($_SESSION['id_tema'] == 2) {
		echo "<link rel='stylesheet' href='" . CSS . "/temas/esscuro.css'>";
	} elseif ($_SESSION['id_tema'] == 3) {
		echo "<link rel='stylesheet' href='" . CSS . "/temas/vermelho.css'>";
	} elseif ($_SESSION['id_tema'] == 4) {
		echo "<link rel='stylesheet' href='" . CSS . "/temas/azul.css'>";
	} elseif ($_SESSION['id_tema'] == 5) {
		echo "<link rel='stylesheet' href='" . CSS . "/temas/roxo.css'>";
	} elseif ($_SESSION['id_tema'] == 7) {
		echo "<link rel='stylesheet' href='" . CSS . "/temas/roxo.css'>";
	}
	?>
	
</head>

<body class="fundo">
    <?php include "topo.php"?>

    <main class="content">
        <?= $this->section("content"); ?>
    </main>

    <?php include "rodape.php" ?>
    <script src="<?= url("/theme/assets/js/jquery.js"); ?>"></script>
    <?= $this->section("js"); ?>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>

</html>