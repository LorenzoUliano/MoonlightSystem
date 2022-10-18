<?php
$local='localhost';
$usuario='root';
$senha='';
$banco='Banco302';
$conexao=mysqli_connect($local,$usuario,$senha,$banco);
if ($conexao==false) {
	die( "Erro: ".mysqli_connect_error());
}

?>