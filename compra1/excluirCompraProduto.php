<?php

include '../conexao/conecta.php';

//$sql = "DELETE FROM tb_compra_produto WHERE cd_compra = $_GET[compra] AND cd_produto = $_GET[produto]";


$sql = "DELETE FROM tb_itens_compra WHERE fk_id_compra = $_GET[compra] AND fk_id_produto = $_GET[produto]";


if (!mysqli_query($conexao, $sql)){
	die("SQL: " . $sql . "<br />" . mysqli_query($conexao));
} else {
	header("location: detalhecompra.php?id=$_GET[compra]");
}