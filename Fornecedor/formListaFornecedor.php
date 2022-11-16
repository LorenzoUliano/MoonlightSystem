<?php
include '../formMenu.php';
include '../conexao/conecta.php';
$sql="SELECT forn.id_fornecedor, forn.nm_fornecedor, forn.cnpj_fornecedor, cid.nm_cidade FROM tb_fornecedor forn INNER JOIN tb_cidade cid ON cid.id_cidade=forn.fk_id_cidade";
$resultado= mysqli_query($conexao,$sql);
if ($resultado==false) {
	die("Erro: ".mysqli_error($conexao));
}
?>
<meta charset="utf-8">
<h2> Lista de Fornecedores</h2>
<a href="formFornecedor.php">Novo</a>
<table class="table table-bordered bg-white container text-center">
	<tr>
		<th>ID </th>
		<th>Fornecedor</th>
		<th>CNPJ</th>
		<th>Cidades</th>
		<th colspan="2">Ações</th>
	</tr>
	<?php
         while ( $item=mysqli_fetch_array($resultado)) {
         	echo "<tr>";
         	echo "<td> $item[id_fornecedor] </td>";
         	echo "<td> $item[nm_fornecedor] </td>";
         	echo "<td> $item[cnpj_fornecedor] </td>";
         	echo "<td> $item[nm_cidade] </td>";
         	echo "<td><a href='formFornecedor.php?id=$item[id_fornecedor]'>Editar</a></td>";
         	echo "<td><a href='formExcluirFornecedor.php?id=$item[id_fornecedor]'>Excluir</a></td>";
         }
?>
</table>