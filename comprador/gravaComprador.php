<?php
include '../conexao/conecta.php';
$nm_comprador=$_POST['nome'];


if ($_POST['id']) {
	$id=$_POST['id'];
	$sql="UPDATE tb_comprador SET nm_comprador='$nm_comprador' WHERE id_comprador=$id";
}
else {

$sql="INSERT INTO tb_comprador (nm_comprador) VALUES ('$nm_comprador')";

}

if (mysqli_query ($conexao,$sql)==false) {
	die ("Erro: ".mysqli_error($conexao));

}
header("location:formListaComprador.php");


?>