<?php
include '../conexao/conecta.php';
$nm_produto=$_POST['nome'];
$precocompra=$_POST['precocompra'];
$precovenda=$_POST['precovenda'];
$fk_id_grupo=$_POST['grupo'];
$obs=$_POST['obs'];

if ($_POST['id']) {
	$id=$_POST['id'];
	$sql="UPDATE tb_produto SET nm_produto='$nm_produto', precocompra=$precocompra, precovenda=$precovenda,fk_id_grupo=$fk_id_grupo,obs='$obs' WHERE id_produto=$id";
}
else {

$sql="INSERT INTO tb_produto (nm_produto, precocompra, precovenda,fk_id_grupo,obs) VALUES ('$nm_produto', $precocompra, $precovenda,$fk_id_grupo,'$obs')";

}

if (mysqli_query ($conexao,$sql)==false) {
	die ("Erro: ".mysqli_error($conexao));

}
header("location:formListaProduto.php");


?>