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
<h2> Lista de Produtos</h2>
<a href="formProduto.php">Novo</a>
<table border="1">
	<tr>
		<th>ID </th>
		<th>Produto</th>
		<th>Preço de Compra</th>
		<th>Preço de Venda</th>
		<th>Grupo</th>
		<th colspan="2">Ações</th>
	</tr>
	<?php
         while ( $item=mysqli_fetch_array($resultado)) {
         	echo "<tr>";
         	echo "<td> $item[id_produto] </td>";
         	echo "<td> $item[nm_produto] </td>";
         	echo "<td> $item[precocompra] </td>";
         	echo "<td> $item[precovenda] </td>";
         	echo "<td> $item[nm_grupo] </td>";
         	echo "<td><a href='formProduto.php?id=$item[id_produto]'>Editar</a></td>";
         	echo "<td><a href='formExcluirProduto.php?id=$item[id_produto]'>Excluir</a></td>";
         }
?>
</table>