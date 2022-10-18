<?php
include '../formMenu.php';
include '../conexao/conecta.php';
$sql="SELECT ped.id_pedido, cli.nm_cliente, ven.nm_vendedor FROM tb_pedido ped INNER JOIN tb_cliente cli ON cli.id_cliente=ped.fk_id_cliente INNER JOIN tb_vendedor ven ON ven.id_vendedor=ped.fk_id_vendedor";

$resultado= mysqli_query($conexao,$sql);
if ($resultado==false) {
	die("Erro: ".mysqli_error($conexao));
}
?>
<meta charset="utf-8">
<h2> Lista de Pedidos</h2>
<a href="formPedido.php">Novo</a>
<table border="1">
	<tr>
		<th>ID </th>
		<th>Clientes</th>
		<th>Vendedor</th>
	</tr>
	<?php
         while ( $item=mysqli_fetch_array($resultado)) {
         	echo "<tr>";
         	echo "<td> $item[id_pedido] </td>";
         	echo "<td> $item[nm_cliente] </td>";
         	echo "<td> $item[nm_vendedor] </td>";
         	echo "<td><a href='formPedido.php?id=$item[id_pedido]'>Editar</a></td>";
         	echo "<td><a href='formExcluirPedido.php?id=$item[id_pedido]'>Excluir</a></td>";
         }
?>
</table>