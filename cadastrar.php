<?php
require_once 'CLASSES/usuarios.php';
$u = new Usuario();
?>

<html lang="pt-br">

<head>
	<meta charset="utf-8" />
	<title>Projeto Login</title>
	<link rel="stylesheet" href="CSS/estilo.css">
	<link rel="stylesheet" href="CSS/bootstrap.min.css">
	<link rel="stylesheet" href="CSS/all.min.css">
</head>

<body>
	<div class="container d-flex justify-content-center pt-5">

		<form class="pt-5" method="POST" id="form-cad">
			<h1 class="text-center lead pt-3" style="color:aqua; font-size: 30pt"><i class="fas fa-user-plus" style="font-size: 30pt; color:aqua"></i>&nbsp; Cadastrar usuários</h1>
			<div class="form-row pt-5">
				<div class="col-6">
					<label class="text-white" for="nome">Nome:</label>
					<input class="form-control mb-3" type="text" name="nome" placeholder="Nome Completo" maxlength="30">
				</div>
				<div class="col-6">
					<label class="text-white" for="telefone">Telefone:</label>
					<input class="form-control mb-3" type="text" name="telefone" placeholder="Telefone" maxlength="30">
				</div>
			</div>
			<div class="form-row">
				<div class="col-4">
					<label class="text-white" for="email">Email:</label>
					<input class="form-control mb-3" type="email" name="email" placeholder="Email" maxlength="40">
				</div>
				<div class="col-4">
					<label class="text-white" for="senha">Senha:</label>
					<input class="form-control mb-3" type="password" name="senha" placeholder="Senha" maxlength="15">
				</div>
				<div class="col-4">
					<label class="text-white" for="senha">Confirmar senha:</label>
					<input class="form-control mb-4" type="password" name="confSenha" placeholder="Confirmar Senha" maxlength="15">
				</div>
			</div>
			<div class="form-row d-flex justify-content-end">
				<div class="col-4">
					<input class="btn btn-sm btn-success btn-block text-white p-0 mr-4 mb-3" style="border: none" type="submit" value="Cadastrar">
				</div>
				<div class="col-4">
					<a href="index.php" class="btn btn-sm btn-primary btn-block text-white p-0 mr-1 mb-3" type="submit">Voltar Login</a>
				</div>
			</div>



		</form>

	</div>

	<?php
	//verificar se clicou no botao
	if (isset($_POST['nome'])) {
		$nome = addslashes($_POST['nome']);
		$telefone = addslashes($_POST['telefone']);
		$email = addslashes($_POST['email']);
		$senha = addslashes($_POST['senha']);
		$confirmarSenha = addslashes($_POST['confSenha']);
		//verificar se esta preenchido
		if (!empty($nome) && !empty($telefone) && !empty($email) && !empty($senha) && !empty($confirmarSenha)) {
			$u->conectar("tela_login", "localhost", "root", "");
			if ($u->msgErro == "") //se esta tudo ok
			{
				if ($senha == $confirmarSenha) {
					if ($u->cadastrar($nome, $telefone, $email, $senha)) {
	?>
						<div class="container col-4 text-center alert alert-success mt-4 mb-4" role="alert" id="msg-sucesso">
							Cadastrado com sucesso! Acesse para entrar!
						</div>
					<?php
					} else {
					?>
						<div class="container col-4 text-center alert alert-danger mt-4 mb-4" role="alert">
							Email já cadastrado!
						</div>
					<?php
					}
				} else {
					?>
					<div class="container col-4 text-center alert alert-danger mt-4 mb-4">
						Senhas não correspondem.
					</div>
				<?php
				}
			} else {
				?>
				<div class="container col-4 text-center alert alert-danger mt-4 mb-4">
					<?php echo "Erro: " . $u->msgErro; ?>
				</div>
			<?php
			}
		} else {
			?>
			<div class="container col-4 text-center alert alert-danger mt-4 mb-4">
				Preencha todos os campos!
			</div>
	<?php
		}
	}


	?>
</body>
<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/popper.js"></script>
<script src="js/all.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</html>