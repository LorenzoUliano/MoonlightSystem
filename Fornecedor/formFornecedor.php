<?php
   include '../formMenu.php';
   include '../conexao/conecta.php';
   if ($_GET['id']) {
    $id=$_GET['id'];
     $sql="SELECT id_fornecedor, nm_fornecedor, cnpj_fornecedor fk_id_cidade FROM tb_fornecedor WHERE id_fornecedor=$id";
     $resultado=mysqli_query($conexao,$sql);
     if ($resultado==false) {
       die("Erro: ".mysqli_error($conexao));
      } else
      {
        $item=mysqli_fetch_array($resultado);
      }
     
   }
   ?>
   <meta charset="utf-8">
   <h2>Cadastro de Fornecedores</h2>
   <a href="formListaFornecedor.php">Lista de Fornecedores</a> <br> <br>
<form method="post" action="GravaFornecedor.php">
<?php
  if ($_GET['id'])  {
    ?>
      <label>ID: </label> <br>
      <input type="TEXT " name="id" readonly="readonly" value=<?php echo $item['id_fornecedor'] ?> > <br> <br>
<?php     
  }
  ?>
  <label>Nome:</label> <br>
  <input type="TEXT" name="nome" value=<?php echo $item['nm_fornecedor']?> > <br> <br>
  <label>CNPJ</label> <br>
  <input type="TEXT" name="cnpj_fornecedor" value=<?php echo $item['cnpj_fornecedor']?> > <br><br>
 <label>ID Cidade</label> <br>
  <input type="TEXT" name="cidade" value=<?php echo $item['fk_id_cidade']?>> <br><br>
  <input type="submit" name="Salvar" value="Salvar">
</form>