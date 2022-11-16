<?php
include '../conexao/conecta.php';
$nm_vendedor=$_POST['nome'];


if ($_POST['id']) {
	$id=$_POST['id'];
	$sql="UPDATE tb_vendedor SET nm_vendedor='$nm_vendedor' WHERE id_vendedor=$id";
}
else {

$sql="INSERT INTO tb_vendedor (nm_vendedor) VALUES ('$nm_vendedor')";

}

if (mysqli_query ($conexao,$sql)==false) {
	die ("Erro: ".mysqli_error($conexao));

}
header("location:formListaFuncionario.php");


?>