<?php
include '../formMenu.php';
include '../conexao/conecta.php';
error_reporting(0);

$id = $_GET['id'];

//$sql = "SELECT cd_compra, nm_comprador, dt_compra FROM tb_compra WHERE cd_compra = $cod";

$sql = "SELECT c.id_compra, cp.nm_comprador, forn.nm_fornecedor,c.dt_compra FROM tb_compra c INNER JOIN tb_comprador cp ON c.fk_id_comprador=cp.id_comprador INNER JOIN tb_fornecedor forn ON forn.id_fornecedor=c.fk_id_fornecedor WHERE c.id_compra=$id";

$resultado = mysqli_query($conexao, $sql);

if (!$resultado) {
	die("SQL: " . $sql . "" . mysqli_error($conexao));
} else {
	$compra = mysqli_fetch_array($resultado);
}

// LISTA DE PRODUTOS
$sqlProdutos = "SELECT id_produto, nm_produto, precocompra FROM tb_produto ORDER BY nm_produto";
$resultadoProdutos = mysqli_query($conexao, $sqlProdutos);
if (!$resultadoProdutos) {
	die("SQL: " . $sql . "" . mysqli_error($conexao));
} 

// LISTA DE PRODUTOS VENDIDOS
//$sqlProdutosVendidos = "SELECT p.cd_produto, p.nm_produto, p.vl_preco, vp.qt_comprada FROM tb_produto p JOIN tb_compra_produto vp ON p.cd_produto = vp.cd_produto WHERE cd_compra = $cod";

$sqlProdutosVendidos = "SELECT p.id_produto, p.nm_produto, p.precocompra, it.qtd_compra FROM tb_produto p JOIN tb_itens_compra it ON p.id_produto = it.fk_id_produto WHERE it.fk_id_compra = $id";

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
<h2 class="pt-4">Detalhes da compra</h2>
<p class="fs-5">Código: <?php echo $compra['id_compra'] ?></p>
<p class="fs-5">Comprador: <?php echo $compra['nm_comprador'] ?></p>
<?php
$novaData = date("d/m/Y", strtotime($compra['dt_compra']));
?>
<p class="fs-5">Data: <?php echo $novaData ?></p>

<form method="post" action="gravacompraProduto.php" >
	<fieldset class="d-flex flex-column w-25 m-auto">
		<legend class="fs-3">Adicionar Produto</legend>
		<div class="input-group pb-4">
		<span class="input-group-text">Produto</span> 
		<input type="hidden" name="compra" value="<?php echo $id ?>">
		<select name="produto" class="form-select">
			<option>Selecione</option>
			<?php
				while($linha = mysqli_fetch_array($resultadoProdutos)) {
					echo "<option value='$linha[id_produto]'>";
					echo $linha['nm_produto'] . " - (R$ ".$linha['precocompra'].")";
					echo "</option>";
				}
			?>
		</select> 
		</div>
		<div class="input-group pb-4">
		<span class="input-group-text">Quantidade:</span>
		<input type="text" name="quantidade" class="form-control">&nbsp;&nbsp;
		</div>
		<input type="submit" value="Adicionar" class="btn btn-success">
	</fieldset>
</form>

<h3 class="pt-3">Produtos Vendidos</h3>
<table class="table table-striped table-dark w-50 m-auto">
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
		echo "<td>R$ $linha[precocompra]</td>";
		echo "<td>$linha[qtd_compra]</td>";
		echo "<td>R$ ". $linha['precocompra'] * $linha['qtd_compra'] ."</td>";
		echo "<td>";
		echo "<a href='excluircompraProduto.php?produto=$linha[id_produto]&compra=$id' class='btn btn-danger'>Excluir</a>";
		echo "</td>";
		echo "</tr>";
		$total = $total + ($linha['precocompra'] * $linha['qtd_compra']);
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
<?php mysqli_query($conexao,"UPDATE tb_compra SET vl_total=$total WHERE id_compra=$id ");
?>


<a href="../compra/formListacompra.php" class="btn btn-success mt-3">Finalizar compra</a>
