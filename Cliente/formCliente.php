<?php
   error_reporting(0);
   include '../formMenu.php';
   include '../conexao/conecta.php';
   if ($_GET['id']) {
    $id=$_GET['id'];
     $sql="SELECT id_cliente, nm_cliente, cpf_cliente, fk_id_cidade FROM tb_cliente WHERE id_cliente=$id";
     $resultado=mysqli_query($conexao,$sql);
     if ($resultado==false) {
       die("Erro: ".mysqli_error($conexao));
      } else
      {
        $item=mysqli_fetch_array($resultado);
      } 
     
   }

   $sqlcidade="SELECT id_cidade, nm_cidade, uf_cidade FROM tb_cidade ORDER BY nm_cidade";
   $resultadoCidade=mysqli_query($conexao,$sqlcidade);
   $itemCidade=mysqli_fetch_array($resultadoCidade);
   ?>
   <meta charset="utf-8">
   <link rel="stylesheet" href="../layouts/style.css">
   <h2>Cadastro de Clientes</h2>
   <a href="formListaCliente.php">Lista de Clientes</a> <br> <br>
<form method="post" action="GravaCliente.php">
<?php
  if ($_GET['id'])  {
    ?>
      <label>ID: </label> <br>
      <input type="TEXT " name="id" readonly="readonly" value=<?php echo $item['id_cliente'] ?> > <br> <br>
<?php     
  }
  ?>
  <label>Nome:</label> <br>
  <input type="TEXT" name="nome" value=<?php echo $item['nm_cliente']?> > <br> <br>
  <label>CPF</label> <br>
  <input type="TEXT" name="cpf_cliente" value=<?php echo $item['cpf_cliente']?> > <br> <br>
 <label>Cidade</label> <br>

 <select  name="cidade">
  <option>Selecione</option>
  <?php 
   while ($itemCidade=mysqli_fetch_array($resultadoCidade)) {
    if ($itemCidade['id_cidade']==$item['fk_id_cidade'])
    {
      echo "<option value='$itemCidade[id_cidade]' selected='selected'>";
    }else
    {
      echo "<option value='$itemCidade[id_cidade]' >";
    }
    echo $itemCidade['nm_cidade'];
    echo "</option>";

   }
   ?>

 </select>
  <br><br>
  <input type="submit" name="Salvar" value="Salvar">
</form>