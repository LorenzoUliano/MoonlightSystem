<?php
 include '../formMenu.php';
 include '../conexao/conecta.php';
  $sql = "SELECT id_grupo, nm_grupo FROM tb_grupo ";
  $resultado=mysqli_query($conexao, $sql);
   if($resultado==false) {
   	 die("Erro: ".mysqli_error($conexao));
   }

?>
<meta charset="utf-8">
<div class="container pt-5">
	<h2 class="fw-bold"> Lista de Grupos</h2>
	<a href="formGrupo.php" class="btn btn-info text-white mb-2 fw-bold">ADICIONAR GRUPO</a>
	<table class="table table-striped table-dark container text-center">
		<tr class="fs-4">
			<th>ID </th>
			<th>Grupo </th>
			<th colspan="2">Ações</th>
		</tr>
		<?php
			while ( $item=mysqli_fetch_array($resultado)) {
				echo "<tr class='fs-5'>";
				echo "<td> $item[id_grupo] </td>";
				echo "<td> $item[nm_grupo] </td>";
				echo "<td><a href='formGrupo.php?id=$item[id_grupo]' class='btn btn-outline-warning'>Editar</a></td>";
				echo "<td><a href='formExcluirGrupo.php?id=$item[id_grupo]' class='btn btn-danger'>Excluir</a></td>";
			}
	?>
	</table>
</div>
