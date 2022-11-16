<?php
error_reporting(0);
include '../formMenu.php';
include '../conexao/conecta.php';
$sql="SELECT ven.id_venda, ven.dt_venda, cli.nm_cliente, vendor.nm_vendedor, ven.vl_total FROM tb_venda ven 
INNER JOIN tb_cliente cli ON cli.id_cliente=ven.fk_id_cliente INNER JOIN tb_vendedor vendor ON vendor.id_vendedor=ven.fk_id_vendedor";
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
<h2 class="fw-bold"> Lista de Vendas</h2>
<a class="btn btn-info mb-2 text-white fw-bold" href="formEditaVenda.php">ADICIONAR VENDA</a>
	<table class="table table-striped table-dark container text-center">
		<tr class="fs-4">
			<th>ID </th>
			<th>Data de Venda</th>
			<th>Cliente</th>
			<th>Vendedor</th>
			<th>Valor Total</th>
			<th colspan="3" class="text-center">Ações</th>
		</tr>
		<?php
			while ( $item=mysqli_fetch_array($resultado)) {
				echo "<tr class='fs-5'>";
				echo "<td> $item[id_venda] </td>";
				$novaData = date("d/m/Y", strtotime($item['dt_venda']));
				echo "<td class='date'> $novaData </td>";
				echo "<td> $item[nm_cliente] </td>";
				echo "<td> $item[nm_vendedor] </td>";
				echo "<td> R$$item[vl_total] </td>";
				

				echo "<td><a href='formEditaVenda.php?id=$item[id_venda]' class='btn btn-outline-warning'>Editar</a></td>";
				echo "<td><a href='formExcluirVenda.php?id=$item[id_venda]' class='btn btn-danger'>Excluir</a></td>";

				echo "<td>";

			

			echo "<a href='../venda1/detalheVenda.php?id=$item[id_venda]'><img src='../img/circle-info-solid.svg' alt='Detalhes' title='Detalhes' width='40'>";
			
			echo "</td>";


			}
	?>
	</table>
</div>
