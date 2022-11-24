<?php
include '../formMenu.php';
include '../conexao/conecta.php';
error_reporting(0);

$id = $_GET['id'];

//$sql = "SELECT cd_venda, nm_vendedor, dt_venda FROM tb_venda WHERE cd_venda = $cod";

$sql = "SELECT v.id_venda, vd.nm_vendedor, cli.nm_cliente,v.dt_venda FROM tb_venda v INNER JOIN tb_vendedor vd ON v.fk_id_vendedor=vd.id_vendedor INNER JOIN tb_cliente cli ON cli.id_cliente=v.fk_id_cliente WHERE v.id_venda=$id";

$resultado = mysqli_query($conexao, $sql);

if (!$resultado) {
	die("SQL: " . $sql . "" . mysqli_error($conexao));
} else {
	$venda = mysqli_fetch_array($resultado);
}

// LISTA DE PRODUTOS
$sqlProdutos = "SELECT id_produto, nm_produto, precovenda FROM tb_produto ORDER BY nm_produto";
$resultadoProdutos = mysqli_query($conexao, $sqlProdutos);
if (!$resultadoProdutos) {
	die("SQL: " . $sql . "" . mysqli_error($conexao));
} 

// LISTA DE PRODUTOS VENDIDOS
//$sqlProdutosVendidos = "SELECT p.cd_produto, p.nm_produto, p.vl_preco, vp.qt_comprada FROM tb_produto p JOIN tb_venda_produto vp ON p.cd_produto = vp.cd_produto WHERE cd_venda = $cod";

$sqlProdutosVendidos = "SELECT p.id_produto, p.nm_produto, p.precovenda, it.qtd_venda FROM tb_produto p JOIN tb_itens_venda it ON p.id_produto = it.fk_id_produto WHERE it.fk_id_venda = $id";

$resultadoProdutosVendidos = mysqli_query($conexao, $sqlProdutosVendidos);
if (!$resultadoProdutosVendidos) {
	die("SQL: " . $sql . "" . mysqli_error($conexao));
} 

?>
<style>
	body{
		text-align: center;
	}
	input ,select{
		height: 45px;
	}
</style>
<h2 class="pt-4">Detalhes da Venda</h2>
<p class="fs-5">Código: <?php echo $venda['id_venda'] ?></p>
<p class="fs-5">Vendedor: <?php echo $venda['nm_vendedor'] ?></p>
<?php
$novaData = date("d/m/Y", strtotime($venda['dt_venda']));
?>
<p class="fs-5">Data: <?php echo $novaData ?></p>

<form method="post" action="gravaVendaProduto.php">
	<fieldset class="d-flex flex-column w-25 m-auto">
		<legend class="fs-3">Adicionar Produto</legend>
		<div class="input-group pb-4">
		<span class="input-group-text">Produto</span>
		<input type="hidden" name="venda" value="<?php echo $id ?>">
			<select name="produto" class="form-select">
			<option>Selecione</option>
			<?php
				while($linha = mysqli_fetch_array($resultadoProdutos)) {
					echo "<option value='$linha[id_produto]'>";
					echo $linha['nm_produto'] . " - (R$ ".$linha['precovenda'].")";
					echo "</option>";
				}
			?>
		</select> 
		</div>
		
		<div class="input-group pb-4">
		<span class="input-group-text">Quantidade</span>
		<input type="text" name="quantidade" class="form-control">&nbsp;&nbsp;
		</div>
		
		<input type="submit" value="Adicionar" class="btn btn-success">
	</fieldset>
</form>

<h3 class="pt-3">Produtos Vendidos</h3>
<table class="table table-dark table-striped w-50 m-auto">
	<tr class="fs-4">
		<td>ID</td>
		<td>Produto</td>
		<td>Preço</td>
		<td>Qtd</td>
		<td>Total</td>
		<td>Ação</td>
	</tr>
<?php
	$total = 0;
	while($linha = mysqli_fetch_array($resultadoProdutosVendidos)) {
		echo "<tr class='fs-5'>";
		echo "<td>$linha[id_produto]</td>";
		echo "<td>$linha[nm_produto]</td>";
		echo "<td>R$ $linha[precovenda]</td>";
		echo "<td>$linha[qtd_venda]</td>";
		echo "<td>R$ ". $linha['precovenda'] * $linha['qtd_venda'] ."</td>";
		echo "<td>";
		echo "<a href='excluirVendaProduto.php?produto=$linha[id_produto]&venda=$id' class='btn btn-danger'>Excluir</a>";
		echo "</td>";
		echo "</tr>";
		$total = $total + ($linha['precovenda'] * $linha['qtd_venda']);
	}
?>
	<tr>
		<td colspan="4" class="text-lg-start">TOTAL:
		<td>R$ <?php echo $total ?></td>
	</tr>

</table>
<form action="" method="post">
	
	<input type="hidden" name="total" value="<?php echo $total ?>">


</form> 
<?php mysqli_query($conexao,"UPDATE tb_venda SET vl_total=$total WHERE id_venda=$id ");
?>


<a href="../venda/formListaVenda.php" class="btn btn-success mt-3">Finalizar Venda</a>
