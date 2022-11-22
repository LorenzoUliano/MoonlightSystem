<?php
include '../conexao/conecta.php';

$sql = "INSERT INTO tb_itens_compra (fk_id_compra, fk_id_produto, qtd_compra) VALUES ($_POST[compra], $_POST[produto], $_POST[quantidade]) ";

if (!mysqli_query($conexao, $sql)) {
	die("SQL: " . $sql . "<br />" . mysqli_error($conexao));
} else {
	header("location: detalheCompra.php?id=$_POST[compra]");
}