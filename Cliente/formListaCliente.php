<?php
include '../formMenu.php';
include '../conexao/conecta.php';
$sql="SELECT cli.id_cliente, cli.nm_cliente, cli.cpf_cliente, cid.nm_cidade FROM tb_cliente cli INNER JOIN tb_cidade cid ON cid.id_cidade=cli.fk_id_cidade";
$resultado= mysqli_query($conexao,$sql);
if ($resultado==false) {
	die("Erro: ".mysqli_error($conexao));
}
?>
<meta charset="utf-8">
<h2> Lista de Clientes</h2>
<a href="formCliente.php">Novo</a>
<table class="table table-bordered bg-white container text-center">
	<tr>
		<th>ID </th>
		<th>Cliente</th>
		<th>Cpf</th>
		<th>Cidades</th>
	</tr>
	<?php
         while ( $item=mysqli_fetch_array($resultado)) {
         	echo "<tr>";
         	echo "<td> $item[id_cliente] </td>";
         	echo "<td> $item[nm_cliente] </td>";
         	echo "<td> $item[nm_cidade] </td>";
         	echo "<td><a href='formCliente.php?id=$item[id_cliente]'>Editar</a></td>";
         	echo "<td><a href='formExcluirCliente.php?id=$item[id_cliente]'>Excluir</a></td>";
         }
?>
</table>