<?php
error_reporting(0);
include '../formMenu.php';
include '../conexao/conecta.php';
$sql="SELECT ven.id_compra, ven.dt_compra, cli.nm_cliente, vendor.nm_vendedor, ven.vl_total FROM tb_compra ven 
INNER JOIN tb_cliente cli ON cli.id_cliente=ven.fk_id_cliente INNER JOIN tb_vendedor vendor ON vendor.id_vendedor=ven.fk_id_vendedor";
$resultado= mysqli_query($conexao,$sql);
if ($resultado==false) {
	die("Erro: ".mysqli_error($conexao));
}
?>
<meta charset="utf-8">
<link rel="stylesheet" href="../css/lista.css">
<h2> Lista de compras</h2>
<a class="acess" href="../inicio.php">Inicio</a>
<label>|</label>
<a class="acess" href="formEditacompra.php">Novo</a>
<table>
	<tr>
		<th>ID </th>
		<th>Data de compra</th>
		<th>Cliente</th>
		<th>Vendedor</th>
		<th>Valor Total</th>
		<th colspan="3">Ações</th>
	</tr>
	<?php
         while ( $item=mysqli_fetch_array($resultado)) {
         	echo "<tr>";
         	echo "<td> $item[id_compra] </td>";
         	echo "<td> $item[dt_compra] </td>";
			echo "<td> $item[nm_cliente] </td>";
			echo "<td> $item[nm_vendedor] </td>";
			echo "<td> $item[vl_total] </td>";
         	

         	echo "<td><a href='formEditacompra.php?id=$item[id_compra]'>Editar</a></td>";
         	echo "<td><a href='formExcluircompra.php?id=$item[id_compra]'>Excluir</a></td>";

            echo "<td>";

		

		echo "<a href='../compra1/detalhecompra.php?id=$item[id_compra]'><img src='editar.png' alt='Detalhes' title='Detalhes'>";
		
		echo "</td>";


         }
?>
</table>