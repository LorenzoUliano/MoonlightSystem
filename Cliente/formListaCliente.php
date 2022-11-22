<?php
include '../formMenu.php';
include '../conexao/conecta.php';
$sql="SELECT cli.id_cliente, cli.nm_cliente, cli.cpf_cliente, cid.nm_cidade FROM tb_cliente cli INNER JOIN tb_cidade cid ON cid.id_cidade=cli.fk_id_cidade ORDER BY cli.id_cliente";
$resultado= mysqli_query($conexao,$sql);
if ($resultado==false) {
	die("Erro: ".mysqli_error($conexao));
}
?>
<meta charset="utf-8">
<div class="container pt-5">
	<h2 class="fw-bold"> Lista de Clientes</h2>
	<a href="formCliente.php" class="btn btn-info fw-bold text-white mb-2">ADICIONAR CLIENTE</a>
	<table class="table table-striped table-dark container text-center">
		<tr class="fs-4">
			<th>ID </th>
			<th>Cliente</th>
			<th>Cpf</th>
			<th>Cidade</th>
			<th colspan='2'>Ações</th>
		</tr>
		<?php
			while ( $item=mysqli_fetch_array($resultado)) {
				echo "<tr class='fs-5'>";
				echo "<td> $item[id_cliente] </td>";
				echo "<td> $item[nm_cliente] </td>";
				echo "<td>$item[cpf_cliente]</td>";
				echo "<td> $item[nm_cidade] </td>";
				echo "<td><a href='formCliente.php?id=$item[id_cliente]' class='btn btn-outline-warning'>Editar</a></td>";
				echo "<td><a href='formExcluirCliente.php?id=$item[id_cliente]' class='btn btn-danger'>Excluir</a></td>";
			}
	?>
	</table>
</div>
