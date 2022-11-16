<?php
include '../formMenu.php';
 include '../conexao/conecta.php';
  $sql = "SELECT * FROM tb_vendedor";
  $resultado=mysqli_query($conexao, $sql);
   if($resultado==false) {
   	 die("Erro: ".mysqli_error($conexao));
   }

?>
<meta charset="utf-8">
<h2> Lista de Vendedores</h2>
<a href="formFuncionario.php">Novo</a>
<table class="table table-bordered bg-white container text-center">
	<tr>
		<th>ID </th>
		<th>Nome </th>
		<th colspan="2">Ações</th>
	</tr>
	<?php
         while ( $item=mysqli_fetch_array($resultado)) {
         	echo "<tr>";
         	echo "<td> $item[id_vendedor] </td>";
         	echo "<td> $item[nm_vendedor] </td>";
         	echo "<td><a href='formFuncionario.php?id=$item[id_vendedor]'>Editar</a></td>";
         	echo "<td><a href='formExcluirFuncionario.php?id=$item[id_vendedor]'>Excluir</a></td>";
         }
?>
</table>