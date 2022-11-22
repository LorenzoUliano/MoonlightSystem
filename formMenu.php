<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Gestor - Sistema de Gestão Cormecial</title>
	<link rel="stylesheet" href="../assets/css/bootstrap.css">
    <script src="../assets/js/bootstrap.js" defer></script>
	<style>
		@import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
		body{
			background-color: #212529;
			color: #fff;
			font-family: 'Montserrat', sans-serif;
		}
		ul li{
			padding: 0px 20px;
		}
		ul{
			margin-top: 15px;
		}
		.nav{
			background-color: #CED4DA;
		}
		.btn-outline-dark{
			border: 2px solid #212529;
		}
		.logo{
			font-size: 25px;
			font-weight: bold;
			letter-spacing: 2px;
		}
		.logo span{
			color: #003566;
		}
	</style>
</head>
<body>
	<div class="p-4 d-flex justify-content-between align-items-center nav">
		<div>
			<h1 class="logo"><a href="../venda/formListaVenda.php" class="text-decoration-none text-black"><span>MOONLIGHT</span> SYSTEM</a></h1>
		</div>
		<ul class="d-flex list-unstyled align-items-center">
			<li> <a href="../Produto/formListaProduto.php" class="btn btn-outline-dark fw-bolder">Produto
			</a></li>
			<li> <a href="../Grupo/formListaGrupo.php" class="btn btn-outline-dark fw-bolder">Grupo
			</a></li>
			<li> <a href="../Cidade/formListaCidade.php" class="btn btn-outline-dark fw-bolder">Cidade
			</a></li>
			<li> <a href="../Cliente/formListaCliente.php" class="btn btn-outline-dark fw-bolder">Cliente
			</a></li>
			<li> <a href="../Fornecedor/formListaFornecedor.php" class="btn btn-outline-dark fw-bolder">Fornecedor
			</a></li>
			<li>
				<a href="../Funcionarios/formListaFuncionario.php" class="btn btn-outline-dark fw-bolder">Vendedor</a>
			</li>
			<li>
				<a href="../comprador/formListaComprador.php" class="btn btn-outline-dark fw-bolder">Comprador</a>
			</li>
			<li>
				<a href="../venda/formListaVenda.php" class="btn btn-primary btn-lg fw-bolder">Vendas</a>
			</li>
			<li>
				<a href="../compra/formListaCompra.php" class="btn btn-primary btn-lg fw-bolder">Compras</a>
			</li>
		</ul>
	</div>
</body>
</html>
