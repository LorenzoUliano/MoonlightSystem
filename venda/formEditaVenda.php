<?php
error_reporting(0);
include '../formMenu.php';
include '../conexao/conecta.php';

if ($_GET['id']) {
  $sql = "SELECT id_venda, dt_venda, fk_id_cliente, fk_id_vendedor, vl_total FROM tb_venda WHERE id_venda = " . $_GET['id'];

  $resultado = mysqli_query($conexao, $sql);

  if ($resultado == false) {
    die("Erro: " . mysqli_error($conexao));
  } else {
    $venda = mysqli_fetch_array($resultado);
  }
} 

$sqlCliente = "SELECT id_cliente, nm_cliente FROM tb_cliente ORDER BY nm_cliente";
$resultadoCliente = mysqli_query($conexao, $sqlCliente);

$sqlVendedor = "SELECT id_vendedor, nm_vendedor FROM tb_vendedor ORDER BY nm_vendedor";
$resultadoVendedor = mysqli_query($conexao, $sqlVendedor);
?>

<meta charset="utf-8">
<link rel="stylesheet" href="../layouts/style.css">
<h2>Cadastro de Vendas</h2>
<a href="formListaVenda.php" class="btn btn-primary">Lista de Vendas</a>  
<form method="POST" action="GravaVenda.php" class="d-flex flex-column w-100 align-items-center pt-3">

<?php
if ($_GET['id'])  {
  ?>
  <label>ID: </label> 
  <input type="TEXT" name="id" readonly="readonly" value=<?php echo $venda['id_venda'] ?> >  

  <label>Data de Venda:</label> 
  <input type="DATE" name="dt" value=<?php echo $venda['dt_venda']?>   > 

  <label>Cliente:</label> 
  <select name="cliente">
    <option>Selecione</option>
    <?php
    while ($itemCliente=mysqli_fetch_array($resultadoCliente)) {
      if ($itemCliente['id_cliente']==$venda['fk_id_cliente']) {
        echo "<option value='$itemCliente[id_cliente]' selected='selected' >";
        # code...
      } 
      else {
        echo "<option value='$itemCliente[id_cliente]' >";
      }
      echo $itemCliente['nm_cliente']; 
      echo "</option>";
      # code...
    }
  ?>
  </select>
  

  <label>Vendedor:</label> 
  <select name="vendedor">
    <option>Selecione</option>
    <?php
    while ($itemVendedor=mysqli_fetch_array($resultadoVendedor)) {
      if ($itemVendedor['id_vendedor']==$venda['fk_id_vendedor']) {
        echo "<option value='$itemVendedor[id_vendedor]' selected='selected' >";
        # code...
      } 
      else {
        echo "<option value='$itemVendedor[id_vendedor]' >";
      }
      echo $itemVendedor['nm_vendedor']; 
      echo "</option>";
      # code...
    }
  ?>
  </select>
  

  <label>Valor Total:</label> 
  <input type="TEXT" name="vl" value=<?php echo $venda['vl_total']?>   > 
  <?php
}

else {
  ?>

<label>Data de Venda:</label> 
  <input type="DATE" name="dt" > 

  <label>Cliente:</label> 
  <select name="cliente">
    <option>Selecione</option>
    <?php
    while ($itemCliente=mysqli_fetch_array($resultadoCliente)) {
      if ($itemCliente['id_cliente']==$venda['fk_id_cliente']) {
        echo "<option value='$itemCliente[id_cliente]' selected='selected' >";
        # code...
      } 
      else {
        echo "<option value='$itemCliente[id_cliente]' >";
      }
      echo $itemCliente['nm_cliente']; 
      echo "</option>";
      # code...
    }
  ?>
  </select>
  

  <label>Vendedor:</label> 
  <select name="vendedor">
    <option>Selecione</option>
    <?php
    while ($itemVendedor=mysqli_fetch_array($resultadoVendedor)) {
      if ($itemVendedor['id_vendedor']==$venda['fk_id_vendedor']) {
        echo "<option value='$itemVendedor[id_vendedor]' selected='selected' >";
        # code...
      } 
      else {
        echo "<option value='$itemVendedor[id_vendedor]' >";
      }
      echo $itemVendedor['nm_vendedor']; 
      echo "</option>";
      # code...
    }
  ?>
  </select>
  

  <label>Total de Produtos:</label> 
  <input type="TEXT" name="vl" readonly="readonly" > 
  <?php
}
?>                                                      
<input type="submit" name="Salvar" value="Salvar" class="btn btn-success mt-3">
</form>