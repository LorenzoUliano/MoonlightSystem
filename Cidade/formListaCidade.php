<?php
 include '../formMenu.php';
 include '../conexao/conecta.php';
  $sql = "SELECT id_cidade, nm_cidade, uf_cidade FROM tb_cidade ";
  $resultado=mysqli_query($conexao, $sql);
   if($resultado==false) {
   	 die("Erro: ".mysqli_error($conexao));
   }

?>
<meta charset="utf-8">
<div class="container pt-5">
	<h2 class="fw-bold"> Lista de Cidades</h2>
	<a href="formCidade.php" class="btn btn-info fw-bold text-white mb-2">ADICIONAR CIDADE</a>
	<table class="table table-striped table-dark container text-center">
		<tr class="fs-4">
			<th>ID </th>
			<th>Cidade </th>
		<th>UF </th>
			<th colspan="2">Ações</th>
		</tr>
		<?php
			while ( $item=mysqli_fetch_array($resultado)) {
				echo "<tr class='fs-5'>";
				echo "<td> $item[id_cidade] </td>";
				echo "<td> $item[nm_cidade] </td>";
			echo "<td> $item[uf_cidade] </td>";
				echo "<td><a href='formCidade.php?id=$item[id_cidade]' class='btn btn-outline-warning'>Editar</a></td>";
				echo "<td><a href='formExcluirCidade.php?id=$item[id_cidade]' class='btn btn-danger'>Excluir</a></td>";
			}
	?>
	</table>
</div>