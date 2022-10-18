<?php
include '../formMenu.php';
 include '../conexao/conecta.php';
  $sql = "SELECT * FROM tb_funcionario";
  $resultado=mysqli_query($conexao, $sql);
   if($resultado==false) {
   	 die("Erro: ".mysqli_error($conexao));
   }

?>
<meta charset="utf-8">
<h2> Lista de Funcionarios</h2>
<a href="formFuncionario.php">Novo</a>
<table border="1">
	<tr>
		<th>ID </th>
		<th>Nome </th>
        <th>Email </th>
		<th>Cpf </th>
		<th>Telefone </th>
		<th>RG </th>
        <th>Data de nascimento</th>
		<th colspan="2">Ações</th>
	</tr>
	<?php
         while ( $item=mysqli_fetch_array($resultado)) {
         	echo "<tr>";
         	echo "<td> $item[id_funcionario] </td>";
         	echo "<td> $item[nm_funcionario] </td>";
          echo "<td> $item[email] </td>";
          echo "<td> $item[cpf] </td>";
          echo "<td> $item[telefone] </td>";
          echo "<td> $item[rg] </td>";
          echo "<td> $item[dt_nascimento] </td>";
         	echo "<td><a href='formFuncionario.php?id=$item[id_funcionario]'>Editar</a></td>";
         	echo "<td><a href='formExcluirFuncionario.php?id=$item[id_funcionario]'>Excluir</a></td>";
         }
?>
</table>