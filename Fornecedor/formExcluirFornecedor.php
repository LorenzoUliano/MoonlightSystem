<?php
include '../conexao/conecta.php';
$id=$_GET['id'];
$sql="DELETE FROM tb_fornecedor WHERE id_fornecedor=$id";
mysqli_query($conexao,$sql);
header ('location:formListaFornecedor.php');
?>