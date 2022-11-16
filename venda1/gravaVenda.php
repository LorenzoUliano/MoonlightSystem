<?php

include '../conexao/conecta.php';

$sql = "INSERT INTO tb_venda (fk_id_vendedor, dt_venda, fk_id_cliente) VALUES ('$_POST[vendedor]', '$_POST[dt]', '$_POST[cliente]')";

if (!mysqli_query($conexao, $sql)) {
	die("Erro: " . mysqli_error($conexao) . "<br />SQL: " . $sql);
} else {
	header("location: formListaVenda.php");
}