<?php
include '../conexao/conecta.php';
$nm_fornecedor=$_POST['nome'];
$cnpj_fornecedor=$_POST['cnpj_fornecedor'];
$fk_id_cidade=$_POST['cidade'];

if ($_POST['id']) {
	$id=$_POST['id'];
	$sql="UPDATE tb_fornecedor SET nm_fornecedor='$nm_fornecedor', cnpj_fornecedor='$cnpj_fornecedor', fk_id_cidade=$fk_id_cidade WHERE id_fornecedor=$id";
}
else {

$sql="INSERT INTO tb_fornecedor (nm_fornecedor, cnpj_fornecedor, fk_id_cidade) VALUES ('$nm_fornecedor', '$cnpj_fornecedor', $fk_id_cidade)";

}

if (mysqli_query ($conexao,$sql)==false) {
	die ("Erro: ".mysqli_error($conexao));

}
header("location:formListaFornecedor.php");


?>