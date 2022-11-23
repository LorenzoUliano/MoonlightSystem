<?php
  error_reporting(0);
  include '../formMenu.php';
   include '../conexao/conecta.php';
    if ($_GET['id']) {
  $id=$_GET['id'];
  $sql="SELECT id_grupo, nm_grupo FROM tb_grupo WHERE id_grupo=$id";
  $resultado=mysqli_query($conexao,$sql);
  if ($resultado==false) {
    die("Erro: ".mysqli_error($conexao));
  } else
  {
    $item=mysqli_fetch_array($resultado)
    ;
  }
     
   }
   ?>
   <meta charset="utf-8">
   <link rel="stylesheet" href="../layouts/style.css">
   <h2>Cadastro de Produtos</h2>
   <a href="formListaGrupo.php" class="btn btn-primary">Lista de Grupos</a> <br> <br>
<form method="post" action="GravaGrupo.php" class="d-flex flex-column w-100 align-items-center pt-3">
<?php
  if ($_GET['id'])  {
    ?>
      <label>ID: </label> <br>
      <input type="TEXT" name="id" readonly="readonly" value=<?php echo $item['id_grupo'] ?> > <br> <br>
<?php     
  }
  ?>
  <label>Nome</label> <br>
  <input type="TEXT" name="nome" value=<?php echo $item['nm_grupo']?> > <br> <br>
                                                      
  <input type="submit" name="Salvar" value="Salvar" class="btn btn-success">
</form>