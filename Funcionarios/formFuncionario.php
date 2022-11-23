<?php 
    include '../formMenu.php';
    error_reporting(0);
    include '../conexao/conecta.php';
    if ($_GET['id']) {
    $id=$_GET['id'];
     $sql="SELECT * FROM tb_vendedor WHERE id_vendedor=$id";
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
   <link rel="stylesheet" href="../layouts/style.css">
   <h2>Cadastro de Vendedores</h2>
   <a href="formListaFuncionario.php" class="btn btn-primary">Lista de Vendedores</a>
<form method="post" action="gravaFuncionario.php" class="d-flex flex-column w-100 align-items-center pt-3">
<?php
  if ($_GET['id'])  {
    ?>
      <label>ID: </label>
      <input type="TEXT" name="id" readonly="readonly" value=<?php echo $item['id_vendedor'] ?> >
<?php     
  }
  ?>
  <label>Nome:</label> 
  <input type="TEXT" name="nome" value=<?php echo $item['nm_vendedor']?> >             
  <input type="submit" name="Salvar" value="Salvar" class="btn btn-success mt-3">
</form>