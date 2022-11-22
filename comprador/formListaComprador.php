<?php
include '../formMenu.php';
 include '../conexao/conecta.php';
  $sql = "SELECT * FROM tb_comprador";
  $resultado=mysqli_query($conexao, $sql);
   if($resultado==false) {
   	 die("Erro: ".mysqli_error($conexao));
   }

?>
<meta charset="utf-8">
<div class="container pt-5">
	<h2 class="fw-bold"> Lista de compradores</h2>
	<a href="formComprador.php" class="btn btn-info fw-bold text-white mb-2">ADICIONAR comprador</a>
	<table class="table table-striped table-dark container text-center">
		<tr class="fs-4">
			<th>ID </th>
			<th>Nome </th>
			<th colspan="2">Ações</th>
		</tr>
		<?php
			while ( $item=mysqli_fetch_array($resultado)) {
				echo "<tr class='fs-5'>";
				echo "<td> $item[id_comprador] </td>";
				echo "<td> $item[nm_comprador] </td>";
				echo "<td><a href='formComprador.php?id=$item[id_comprador]' class='btn btn-outline-warning'>Editar</a></td>";
				echo "<td><a href='formExcluirComprador.php?id=$item[id_comprador]' class='btn btn-danger'>Excluir</a></td>";
			}
	?>
	</table>
</div>
