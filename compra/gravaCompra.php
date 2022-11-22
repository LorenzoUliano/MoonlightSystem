<?php
include '../conexao/conecta.php';
$dt=$_POST['dt'];
$fornecedor=$_POST['fornecedor'];
$comprador=$_POST['comprador'];
$vl=$_POST['vl'];


if ($_POST['id']) {
	$id=$_POST['id'];
	$sql="UPDATE tb_compra SET dt_compra='$dt', fk_id_fornecedor='$fornecedor', fk_id_comprador='$comprador', vl_total='$vl' WHERE id_compra='$id'";
}
else {

$sql="INSERT INTO tb_compra (dt_compra, fk_id_fornecedor, fk_id_comprador, vl_total) VALUES ('$dt', '$fornecedor', '$comprador', '$vl')";

}

if (mysqli_query ($conexao,$sql)==false) {
	die ("Erro: ".mysqli_error($conexao));

}
header("location:formListaCompra.php");


?>