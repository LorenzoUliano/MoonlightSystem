<?php
include '../conexao/conecta.php';
$id=$_GET['id'];
$sql="DELETE FROM tb_funcionario WHERE id_funcionario=$id";
mysqli_query($conexao,$sql);
header ('location:formListaFuncionario.php');
?>