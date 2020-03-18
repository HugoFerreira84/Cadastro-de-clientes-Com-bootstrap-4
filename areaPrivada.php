<?php
require_once 'CLASSES/usuarios.php';

session_start();
if (!isset($_SESSION['id_usuario'])) {
	header("location: index.php");
	exit;
}

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

	<nav class="text-white bg-secondary border-0 P-2">
		<ul class="nav justify-content-end">
			<li class="nav-item">
				SEJA BEM VINDO!&nbsp;&nbsp;
				<a class="btn btn-md py-1 btn-danger" href="sair.php">Sair</a>
			</li>
		</ul>
	</nav>
	<div class="container mt-3 d-flex justify-content-end">
		<div class="form-row">
			<div class="form-group">
			</div>
		</div>
	</div>


</body>

<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/popper.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/all.min.js"></script>

</html>