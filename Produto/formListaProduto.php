<?php
include '../formMenu.php';
include '../conexao/conecta.php';
$sql="SELECT prod.id_produto, prod.nm_produto,prod.precocompra, prod.precovenda,gr.nm_grupo FROM tb_produto prod INNER JOIN tb_grupo gr ON gr.id_grupo=prod.fk_id_grupo";
$resultado= mysqli_query($conexao,$sql);
if ($resultado==false) {
	die("Erro: ".mysqli_error($conexao));
}
?>
<meta charset="utf-8">
<div class="container pt-5">
<h2 class="fw-bold"> Lista de Produtos</h2>
<a href="formProduto.php" class="btn btn-info fw-bold text-white mb-2">ADICIONAR PRODUTO</a>
	<table class="table table-striped table-dark container text-center">
		<tr class="fs-4">
			<th>ID </th>
			<th>Produto</th>
			<th>Preço de Compra</th>
			<th>Preço de Venda</th>
			<th>Grupo</th>
			<th colspan="2">Ações</th>
		</tr>
		<?php
			while ( $item=mysqli_fetch_array($resultado)) {
				echo "<tr class='fs-5'>";
				echo "<td> $item[id_produto] </td>";
				echo "<td> $item[nm_produto] </td>";
				echo "<td> $item[precocompra] </td>";
				echo "<td> $item[precovenda] </td>";
				echo "<td> $item[nm_grupo] </td>";
				echo "<td><a href='formProduto.php?id=$item[id_produto]' class='btn btn-outline-warning'>Editar</a></td>";
				echo "<td><a href='formExcluirProduto.php?id=$item[id_produto]' class='btn btn-danger'>Excluir</a></td>";
			}
	?>
	</table>
</div>
