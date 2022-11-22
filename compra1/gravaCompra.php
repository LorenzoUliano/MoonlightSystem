<?php

include '../conexao/conecta.php';

$sql = "INSERT INTO tb_compra (fk_id_vendedor, dt_compra, fk_id_cliente) VALUES ('$_POST[vendedor]', '$_POST[dt]', '$_POST[cliente]')";

if (!mysqli_query($conexao, $sql)) {
	die("Erro: " . mysqli_error($conexao) . "<br />SQL: " . $sql);
} else {
	header("location: formListacompra.php");
}