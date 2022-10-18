<?php
include '../conexao/conecta.php';
$fk_id_cliente=$_POST['cliente'];
$fk_id_vendedor=$_POST['vendedor'];

if ($_POST['id']) {
	$id=$_POST['id'];
	$sql="UPDATE tb_pedido SET fk_id_cliente=$fk_id_cliente, fk_id_vendedor=$fk_id_vendedor WHERE id_pedido=$id";
}
else {

$sql="INSERT INTO tb_pedido (fk_id_cliente, fk_id_vendedor) VALUES ($fk_id_cliente, $fk_id_vendedor)";

}

if (mysqli_query ($conexao,$sql)==false) {
	die ("Erro: ".mysqli_error($conexao));

}
header("location:formListaPedido.php");


?>