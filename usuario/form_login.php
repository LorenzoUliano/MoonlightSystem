<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="../assets/css/bootstrap.css">
    	<script src="../assets/js/bootstrap.js" defer></script>
		<title> Login de Usuário </title>
		<style>
			body{
				background-color: #212529;
				color: #fff;
			}
			input{
				height: 45px;
				margin-bottom: 15px;
			}
		</style>
	</head>
	<body>
		<section class="container text-center pt-xxl-5">
		<div class="content">  
			<form class="login" method="POST" action="cad_login.php">
				<h1><i class="icon icon-key-1"></i> Entre no Sistema: </h1>
				<div class="d-flex flex-column text-center">
					<label>
						<input type="text" class="w-25" placeholder=" E-mail" name="login" id="login"><br>
					</label>
					<label>
						<input type="password" class="w-25" placeholder=" Senha" name="senha" id="senha"><br>
					</label>
					<input type="submit" class="btn btn-success w-25 m-auto" value="Entrar" id="entrar" name="entrar"><br>
					<a class="link" href="form_usuario.php" class="btn btn-primary">Cadastre-se</a>
				</div>
			</form>
		</div>
	</body>
</html>