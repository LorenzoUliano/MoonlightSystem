<?php
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
   <h2>Cadastro de Produtos</h2>
   <a href="formListaGrupo.php">Lista de Grupos</a> <br> <br>
<form method="post" action="GravaGrupo.php">
<?php
  if ($_GET['id'])  {
    ?>
      <label>ID: </label> <br>
      <input type="TEXT " name="id" readonly="readonly" value=<?php echo $item['id_grupo'] ?> > <br> <br>
<?php     
  }
  ?>
  <label>Nome:</label> <br>
  <input type="TEXT" name="nome" value=<?php echo $item['nm_grupo']?> > <br> <br>
                                                      
  <input type="submit" name="Salvar" value="Salvar">
</form>