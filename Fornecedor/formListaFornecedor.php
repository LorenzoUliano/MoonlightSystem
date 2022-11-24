<?php
include '../formMenu.php';
include '../conexao/conecta.php';
$sql="SELECT forn.id_fornecedor, forn.nm_fornecedor, forn.cnpj_fornecedor, cid.nm_cidade FROM tb_fornecedor forn INNER JOIN tb_cidade cid ON cid.id_cidade=forn.fk_id_cidade ORDER BY id_fornecedor";
$resultado= mysqli_query($conexao,$sql);
if ($resultado==false) {
	die("Erro: ".mysqli_error($conexao));
}
?>
<meta charset="utf-8">
<div class="container pt-5">
	<h2 class="fw-bold"> Lista de Fornecedores</h2>
	<a href="formFornecedor.php" class="btn btn-info fw-bold text-white mb-2">ADICIONAR FORNECEDOR</a>
	<table class="table table-striped table-dark container text-center">
		<tr class="fs-4">
			<th>ID </th>
			<th>Fornecedor</th>
			<th>CNPJ</th>
			<th>Cidades</th>
			<th colspan="2">Ações</th>
		</tr>
		<?php
			while ( $item=mysqli_fetch_array($resultado)) {
				echo "<tr class='fs-5'>";
				echo "<td> $item[id_fornecedor] </td>";
				echo "<td> $item[nm_fornecedor] </td>";
				echo "<td> $item[cnpj_fornecedor] </td>";
				echo "<td> $item[nm_cidade] </td>";
				echo "<td><a href='formFornecedor.php?id=$item[id_fornecedor]' class='btn btn-outline-warning'>Editar</a></td>";
				echo "<td><a href='formExcluirFornecedor.php?id=$item[id_fornecedor]' class='btn btn-danger'>Excluir</a></td>";
			}
	?>
	</table>
</div>