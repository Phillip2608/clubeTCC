<?php $this->layout("../_theme"); ?>
<main class="container fundo">
	<div class="row justify-content-center mx-auto my-5">
		<div class="col-5 my-5">
			<div class="card my-5 shadow rounded-2">
				<div class="card-header rounded-2">
					<h1 class="text-white mx-4 my-3">Login</h1>
				</div>
				<div class="card-body rounded-2">
					<form class="row justify-content-center" action="<?= $router->route("users.login"); ?>" method="POST">
						<div class="row">
							<img src="<?= ICON.'/TCC_PRETO.svg'?>" width="80" height="80" class="my-3">
							<div class="col mx-4 my-3">
								<div class="input-group mb-3">
  									<label for="email"><span class="input-group-text" id="basic-addon1"><svg xmlns="	http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
  									<path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 	0 0 6z"/>
									</svg></span></label>
  									<input type="email" id="email" name="nm_email_login" class="form-control <?= $dados['email_erro'] ? 'is-invalid' : '' ?>" placeholder="E-mail" aria-label="Username" aria-describedby="basic-addon1" value="<?= $dados['email_login'] ?>">
									<div class="invalid-feedback">
                        				<?= $dados['email_erro'] ?>
                    				</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col mx-4 my-2">
								<div class="input-group mb-3">
  									<label for="senha"><span class="input-group-text" id="basic-addon1"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-key-fill" viewBox="0 0 16 16">
  									<path d="M3.5 11.5a3.5 3.5 0 1 1 3.163-5H14L15.5 8 14 9.5l-1-1-1 1-1-1-1 1-1-1-1 1H6.663a3.5 3.5 0 0 1-3.163 2zM2.5 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
									</svg></span></label>
  									<input type="password" id="senha" name="id_senha_login" class="form-control <?= $dados['senha_erro'] ? 'is-invalid' : '' ?>" placeholder="Senha" aria-label="Username" aria-describedby="basic-addon1" value="<?= $dados['senha_login'] ?>">
									<div class="invalid-feedback">
                        				<?= $dados['senha_erro'] ?>
                    				</div>
								</div>
							</div>
						</div>
						<div class="row my-3">
							<div class="input-group mb-3">
								<input type="submit" name="" class="col mx-4 form-control btn btn-outline-primary rounded-2" value="Confirmar">
								<div class="col">
									<a href="<?= URL.'/users/cadastrar'?>">Não possui uma conta? Cadastre-se</a>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</main>