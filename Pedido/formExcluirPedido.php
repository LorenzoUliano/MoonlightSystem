<?php
include '../conexao/conecta.php';
$id=$_GET['id'];
$sql="DELETE FROM tb_pedido WHERE id_pedido=$id";
mysqli_query($conexao,$sql);
header ('location:formListaPedido.php');
?>