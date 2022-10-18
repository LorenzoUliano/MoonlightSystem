<?php
include '../conexao/conecta.php';
$nm_funcionario=$_POST['nome'];
$email=$_POST['email'];
$cpf=$_POST['cpf'];
$telefone=$_POST['telefone'];
$rg=$_POST['rg'];
$dt_nasc=$_POST['dt_nasc'];
$senha=$_POST['senha'];


if ($_POST['id']) {
	$id=$_POST['id'];
	$sql="UPDATE tb_funcionario SET nm_funcionario='$nm_funcionario', email='$email', cpf='$cpf', senha='$senha' ,telefone='$telefone', rg='$rg', dt_nascimento='$dt_nasc'  WHERE id_funcionario=$id";
}
else {

$sql="INSERT INTO tb_funcionario (nm_funcionario, email, cpf, senha, telefone, rg, dt_nascimento) VALUES ('$nm_funcionario', '$cpf', '$senha', '$telefone', '$rg', '$dt_nasc')";

}

if (mysqli_query ($conexao,$sql)==false) {
	die ("Erro: ".mysqli_error($conexao));

}
header("location:formListaFuncionario.php");


?>