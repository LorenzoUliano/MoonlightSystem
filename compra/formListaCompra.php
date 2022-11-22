<?php
error_reporting(0);
include '../formMenu.php';
include '../conexao/conecta.php';
$sql="SELECT com.id_compra, com.dt_compra, forn.nm_fornecedor, pra.nm_comprador, com.vl_total FROM tb_compra com 
INNER JOIN tb_fornecedor forn ON forn.id_fornecedor=com.fk_id_fornecedor INNER JOIN tb_comprador pra ON pra.id_comprador=com.fk_id_comprador";
$resultado= mysqli_query($conexao,$sql);
if ($resultado==false) {
	die("Erro: ".mysqli_error($conexao));
}
?>
<meta charset="utf-8">
<style>
	.date{
		letter-spacing: 2px;
	}
</style>
<div class="container pt-5">
<h2 class="fw-bold"> Lista de Compras</h2>
<a class="btn btn-info mb-2 text-white fw-bold" href="formEditaCompra.php">ADICIONAR COMPRA</a>
	<table class="table table-striped table-dark container text-center">
		<tr class="fs-4">
			<th>ID </th>
			<th>Data de compra</th>
			<th>fornecedor</th>
			<th>comprador</th>
			<th>Valor Total</th>
			<th colspan="3" class="text-center">Ações</th>
		</tr>
		<?php
			while ( $item=mysqli_fetch_array($resultado)) {
				echo "<tr class='fs-5'>";
					echo "<td> $item[id_compra] </td>";
					$novaData = date("d/m/Y", strtotime($item['dt_compra']));
					echo "<td class='date'> $novaData </td>";
					echo "<td> $item[nm_fornecedor] </td>";
					echo "<td> $item[nm_comprador] </td>";
					echo "<td> R$$item[vl_total] </td>";
					echo "<td><a href='formEditaCompra.php?id=$item[id_compra]' class='btn btn-outline-warning'>Editar</a></td>";
					echo "<td><a href='formExcluirCompra.php?id=$item[id_compra]' class='btn btn-danger'>Excluir</a></td>";
					echo "<td>";
					echo "<a href='../compra1/detalheCompra.php?id=$item[id_compra]'><img src='../img/circle-info-solid.svg' alt='Detalhes' title='Detalhes' width='40'>";			
					echo "</td>";
				echo "</tr>";


			}
	?>
	</table>
</div>
