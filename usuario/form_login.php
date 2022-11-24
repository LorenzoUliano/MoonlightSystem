<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="../assets/css/bootstrap.css">
    	<script src="../assets/js/bootstrap.js" defer></script>
		<title> Login de Usuário </title>
		<style>
			@import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
			body{
				font-family: 'Montserrat', sans-serif;
				background-color: #212529;
				color: #fff;
			}
			.input-group{
				height: 45px;
				margin-bottom: 15px !important;
			}
			.logo{
			font-size: 25px;
			font-weight: bold;
			letter-spacing: 2px;
			}	
			.logo span{
			color: #003566;
			}
			.nav-logo{
				background-color: #CED4DA;
			}
		</style>
	</head>
	<body>
		<div class="text-center py-5 nav-logo">
			<h1 class="logo"><a href="../venda/formListaVenda.php" class="text-decoration-none text-black"><span>MOONLIGHT</span> SYSTEM</a></h1>
		</div>
		<section class="container text-center pt-xxl-5">
		<div class="content">  
			<form class="login" method="POST" action="cad_login.php">
				<h1><i class="icon icon-key-1"></i> Entre no Sistema</h1>
				<div class="d-flex flex-column text-center">
					<div class="input-group w-25 m-auto">
						<span class="input-group-text">Email</span>
						<input type="text" class="form-control" name="login" id="login">
					</div>
					<div class="input-group w-25 m-auto">
						<span class="input-group-text">Senha</span>
						<input type="password" class="form-control" name="senha" id="senha"><br>
					</div>
					<input type="submit" class="btn btn-success w-25 m-auto" value="Entrar" id="entrar" name="entrar"><br>
					<a href="form_usuario.php" class="btn btn-primary m-auto">Cadastre-se</a>
				</div>
			</form>
		</div>
	</body>
</html>