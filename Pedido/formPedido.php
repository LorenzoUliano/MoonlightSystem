<?php
  error_reporting(0);
   include '../formMenu.php';
   include '../conexao/conecta.php';
   if ($_GET['id']) {
    $id=$_GET['id'];
     $sql="SELECT id_pedido, fk_id_cliente, fk_id_vendedor FROM tb_pedido WHERE id_pedido=$id";
     $resultado=mysqli_query($conexao,$sql);
     if ($resultado==false) {
       die("Erro: ".mysqli_error($conexao));
      } else
      {
        $item=mysqli_fetch_array($resultado);
      } 
     
   }

   $sqlcliente="SELECT id_cliente, nm_cliente, cpf_cliente FROM tb_cliente ORDER BY nm_cliente";
   $resultadoCliente=mysqli_query($conexao,$sqlcliente);
   $sqlvendedor="SELECT id_vendedor, nm_vendedor FROM tb_vendedor ORDER BY nm_vendedor";
   $resultadoVendedor=mysqli_query($conexao,$sqlvendedor);


   ?>
   <meta charset="utf-8">
   <link rel="stylesheet" href="../layouts/style.css">
   <h2>Cadastro de Clientes</h2>
   <a href="formListaCliente.php">Lista de Clientes</a> <br> <br>
<form method="post" action="gravaPedido.php" class="d-flex flex-column w-100 align-items-center pt-3">
<?php
  if ($_GET['id'])  {
    ?>
      <label>ID: </label> <br>
      <input type="TEXT " name="id" readonly="readonly" value=<?php echo $item['id_pedido'] ?> /> <br> <br>
<?php     
  }
  ?>
 <label>Cliente</label> <br>

 <select  name="cliente">
  <option>Selecione</option>
  <?php 
   while ($itemCliente=mysqli_fetch_array($resultadoCliente)) {
    if ($itemCliente['id_cliente']==$item['fk_id_cliente'])
    {
      echo "<option value='$itemCliente[id_cliente]' selected='selected'>";
    }else
    {
      echo "<option value='$itemCliente[id_cliente]' >";
    }
    echo $itemCliente['nm_cliente'];
    echo "</option>";
  }
   ?>
  </select><br> <br>
    <label>Vendedor</label> <br>

 <select  name="vendedor">
  <option>Selecione</option>
  <?php
   while ($itemVendedor=mysqli_fetch_array($resultadoVendedor)) {
    if ($itemVendedor['id_vendedor']==$item['fk_id_vendedor'])
    {
      echo "<option value='$itemVendedor[id_vendedor]' selected='selected'>";
    }else
    {
      echo "<option value='$itemVendedor[id_vendedor]' >";
    }
    echo $itemVendedor['nm_vendedor'];
    echo "</option>";

   }
   ?>


 </select>
  <br><br>
  <input type="submit" name="Salvar" value="Salvar">
</form>