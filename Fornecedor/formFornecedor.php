<?php
  error_reporting(0);
   include '../formMenu.php';
   include '../conexao/conecta.php';
   if ($_GET['id']) {
    $id=$_GET['id'];
     $sql="SELECT id_fornecedor, nm_fornecedor, cnpj_fornecedor, fk_id_cidade FROM tb_fornecedor WHERE id_fornecedor=$id";
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
   <h2>Cadastro de Fornecedores</h2>
   <a href="formListaFornecedor.php" class="btn btn-primary">Lista de Fornecedores</a>  
<form method="post" action="GravaFornecedor.php" class="d-flex flex-column w-100 align-items-center pt-3">
  
<?php
  if ($_GET['id'])  {
    ?>
      <label>ID: </label> 
      <input type="TEXT" name="id" readonly="readonly" value=<?php echo $item['id_fornecedor'] ?> >  
<?php     
  }
  ?>
  <label>Nome</label> 
  <input type="TEXT" name="nome" value=<?php echo $item['nm_fornecedor']?> >  
  <label>CNPJ</label> 
  <input type="TEXT" name="cnpj_fornecedor" value=<?php echo $item['cnpj_fornecedor']?> >
  <label>Cidade</label> 
  <select name="cidade">
  <option>Selecione</option>
  <?php 
  var_dump($item);
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
  <input type="submit" name="Salvar" value="Salvar" class="btn btn-success mt-3">
</form>