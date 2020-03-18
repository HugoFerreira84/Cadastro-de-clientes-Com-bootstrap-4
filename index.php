<?php
require_once 'CLASSES/usuarios.php';
$u = new Usuario();
?>

<html lang="pt-br">

<head>
	<meta charset="utf-8" />
	<title>Login</title>
	<link rel="stylesheet" href="CSS/estilo.css">
	<link rel="stylesheet" href="CSS/bootstrap.min.css">
	<link rel="stylesheet" href="CSS/all.min.css">
	<meta name="viewport" content="width=device-width">
</head>

<body>

	<div class="container d-flex justify-content-center" style="margin-top: 150px">

		<form method="POST">
			<h1 class="d-flex justify-content-center" style="color:aqua"><i class="fas fa-sign-in-alt" style="font-size: 35pt; color:aqua"></i>&nbsp; Login</h1>
			<div class="form-group">

				<label class="text-white" for="inputEmail">Email</label>
				<input class="form-control" name="email" id="inputEmail" type="email" placeholder="Email">

			</div>
			<div class="form-group">

				<label class="text-white" for="inputPassword">Password</label>
				<input class="form-control mb-3" name="senha" id="inputPassword" type="password" placeholder="Senha">

			</div>
			<div class="form-group">

				<button class="btn btn-md btn-primary mt-3 p-0 px-5" type="submit">Acessar</button>

				<a class="btn btn-md btn-success mt-3 p-0 px-3 " href="cadastrar.php"><b>Cadastre-se!</b></a>
			</div>

		</form>

	</div>

	<?php
	if (isset($_POST['email'])) {
		$email = addslashes($_POST['email']);
		$senha = addslashes($_POST['senha']);

		if (!empty($email) && !empty($senha)) {
			$u->conectar("tela_login", "localhost", "root", "");
			if ($u->msgErro == "") {
				if ($u->logar($email, $senha)) {
					header("location: AreaPrivada.php");
				} else {
	?>
					<div class="container col-4 text-center alert alert-danger mt-4 mb-4" role="alert">
						Email e/ou senha estão incorretos!
					</div>
				<?php
				}
			} else {
				?>
				<div class="container col-4 text-center alert alert-danger mt-4 mb-4" role="alert">
					<?php echo "Erro: " . $u->msgErro; ?>
				</div>
			<?php
			}
		} else {
			?>
			<div class="container col-4 text-center alert alert-danger mt-4 mb-4" role="alert">
				Preencha todos os campos!
			</div>
	<?php
		}
	}
	?>
</body>
<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/popper.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/all.min.js"></script>

</html>