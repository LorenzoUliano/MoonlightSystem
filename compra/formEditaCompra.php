<?php
error_reporting(0);
include '../formMenu.php';
include '../conexao/conecta.php';

if ($_GET['id']) {
  $sql = "SELECT id_compra, dt_compra, fk_id_fornecedor, fk_id_comprador, vl_total FROM tb_compra WHERE id_compra = " . $_GET['id'];

  $resultado = mysqli_query($conexao, $sql);

  if ($resultado == false) {
    die("Erro: " . mysqli_error($conexao));
  } else {
    $compra = mysqli_fetch_array($resultado);
  }
} 

$sqlfornecedor = "SELECT id_fornecedor, nm_fornecedor FROM tb_fornecedor ORDER BY nm_fornecedor";
$resultadofornecedor = mysqli_query($conexao, $sqlfornecedor);

$sqlcomprador = "SELECT id_comprador, nm_comprador FROM tb_comprador ORDER BY nm_comprador";
$resultadocomprador = mysqli_query($conexao, $sqlcomprador);
?>

<meta charset="utf-8">
<link rel="stylesheet" href="../layouts/style.css">
<h2>Cadastro de compras</h2>
<a href="formListaCompra.php">Lista de compras</a> <br> <br>
<form method="POST" action="gravaCompra.php">

<?php
if ($_GET['id'])  {
  ?>
  <label>ID: </label> <br>
  <input type="TEXT" name="id" readonly="readonly" value=<?php echo $compra['id_compra'] ?> > <br> <br>

  <label>Data de compra:</label> <br>
  <input type="DATE" name="dt" value=<?php echo $compra['dt_compra']?>   > <br>

  <label>Fornecedor:</label> <br>
  <select name="fornecedor">
    <option>Selecione</option>
    <?php
    while ($itemfornecedor=mysqli_fetch_array($resultadofornecedor)) {
      if ($itemfornecedor['id_fornecedor']==$compra['fk_id_fornecedor']) {
        echo "<option value='$itemfornecedor[id_fornecedor]' selected='selected' >";
        # code...
      } 
      else {
        echo "<option value='$itemfornecedor[id_fornecedor]' >";
      }
      echo $itemfornecedor['nm_fornecedor']; 
      echo "</option>";
      # code...
    }
  ?>
  </select>
  <br><br>

  <label>Comprador:</label> <br>
  <select name="comprador">
    <option>Selecione</option>
    <?php
    while ($itemcomprador=mysqli_fetch_array($resultadocomprador)) {
      if ($itemcomprador['id_comprador']==$compra['fk_id_comprador']) {
        echo "<option value='$itemcomprador[id_comprador]' selected='selected' >";
        # code...
      } 
      else {
        echo "<option value='$itemcomprador[id_comprador]' >";
      }
      echo $itemcomprador['nm_comprador']; 
      echo "</option>";
      # code...
    }
  ?>
  </select>
  <br><br>

  <label>Valor Total:</label> <br>
  <input type="TEXT" name="vl" value=<?php echo $compra['vl_total']?>   > <br>
  <?php
}

else {
  ?>

<label>Data de compra:</label> <br>
  <input type="DATE" name="dt" > <br>

  <label>Fornecedor:</label> <br>
  <select name="fornecedor">
    <option>Selecione</option>
    <?php
    while ($itemfornecedor=mysqli_fetch_array($resultadofornecedor)) {
      if ($itemfornecedor['id_fornecedor']==$compra['fk_id_fornecedor']) {
        echo "<option value='$itemfornecedor[id_fornecedor]' selected='selected' >";
      } 
      else {
        echo "<option value='$itemfornecedor[id_fornecedor]' >";
      }
      echo $itemfornecedor['nm_fornecedor']; 
      echo "</option>";
    }
  ?>
  </select>
  <br><br>

  <label>Comprador:</label> <br>
  <select name="comprador">
    <option>Selecione</option>
    <?php
    while ($itemcomprador=mysqli_fetch_array($resultadocomprador)) {
      if ($itemcomprador['id_comprador']==$compra['fk_id_comprador']) {
        echo "<option value='$itemcomprador[id_comprador]' selected='selected' >";
        # code...
      } 
      else {
        echo "<option value='$itemcomprador[id_comprador]' >";
      }
      echo $itemcomprador['nm_comprador  ']; 
      echo "</option>";
      # code...
    }
  ?>
  </select>
  <br><br>

  <label>Total de Produtos:</label> <br>
  <input type="TEXT" name="vl" readonly="readonly" > <br>
  <?php
}
?>                                                      
<input type="submit" name="Salvar" value="Salvar">
</form>