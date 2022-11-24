<?php
include '../conexao/conecta.php';
$nm_cliente=$_POST['nome'];
$cpf_cliente=$_POST['cpf_cliente'];
$fk_id_cidade=$_POST['cidade'];
var_dump($_POST);

if ($_POST['id']) {
	$id=$_POST['id'];
	$sql="UPDATE tb_cliente SET nm_cliente='$nm_cliente', cpf_cliente='$cpf_cliente', fk_id_cidade=$fk_id_cidade WHERE id_cliente=$id";
}
else {

$sql="INSERT INTO tb_cliente (nm_cliente, cpf_cliente, fk_id_cidade) VALUES ('$nm_cliente', '$cpf_cliente', $fk_id_cidade)";

}

if (mysqli_query ($conexao,$sql)==false) {
	die ("Erro: ".mysqli_error($conexao));

}
header("location:formListaCliente.php");


?>