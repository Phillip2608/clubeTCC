<head>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?= CSS ?>/STYLE_LOGin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="<?= URL ?>/theme/TCCweb/9976Maximizadacolorida.ico" type="image/x-icon">
    <title> Clube do TCC </title>
</head>
<body>
    <main class="login_fundo">
            <section class="caixa_login cor_diploma p-1 rounded-2 shadow">
                <div class="m-4 border-top border-bottom border-warning">
                    <div class="text-center">
                        <img class="my-2" src="<?= IMG ?>/Logos/Minimizada_colorida.svg" width="200" height="165">
                        <h1 class="tamanho_1 my-1">Entre e faça parte do futuro do seu TCC</h1>
                        <h3 class="tamanho_2 my-1">Juntos, podemos ser maiores!</h3>
                        <h3 class="tamanho_2 my-1">Aqui você pode desfrutar do conhecimento e da facilidade de criar seu próprio TCC do zero.</h3>
                        <h3 class="tamanho_2 my-1">Então não deixe de fazer parte e creça conosco, aqui o mundo é bem maior.</h3>
                    </div>
                    <form class="" action="<?= $router->route("users.login"); ?>" method="POST">
                        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 g-3 d-flex justify-content-center my-3">
                            <div class="col d-flex justify-content-center flex-row">
                                <input type="email" id="email" name="nm_email_login" class="input_login <?= $dados['email_erro'] ? 'is-invalid' : '' ?>" placeholder="E-mail" aria-label="Username" aria-describedby="basic-addon1" value="<?= $dados['email_login'] ?>">
                                <div class="invalid-feedback">
                                    <?= $dados['email_erro'] ?>
                                </div>
                            </div>
                            
                            <div class="col d-flex justify-content-center">
                                <input type="password" id="senha" name="id_senha_login" class="input_login <?= $dados['senha_erro'] ? 'is-invalid' : '' ?>" placeholder="Senha" aria-label="Username" aria-describedby="basic-addon1" value="<?= $dados['senha_login'] ?>">
					            <div class="invalid-feedback">
                                    <?= $dados['senha_erro'] ?>
                                </div>
                            </div>
                            <div class="col d-flex justify-content-center">
                                <input type="submit" class="butao_login my-3" value="Confirmar">
                            </div>
                        </div>
                        
                        
                    </form>
                    <div class="row my-2">
						<div class="col d-flex justify-content-center">
							<a href="<?= URL.'/users/cadastrar'?>" class="text-center">
							    <h6>Não possuí uma conta?</h6>
							    <h6>Cadastre-se!</h6>
							</a>
						</div>
					</div>
                </div>
            </section>
    </main>
</body>
