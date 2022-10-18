<?php 
    include '../formMenu.php';
    error_reporting(0);
    include '../conexao/conecta.php';
    if ($_GET['id']) {
    $id=$_GET['id'];
     $sql="SELECT * FROM tb_funcionario WHERE id_funcionario=$id";
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
   <h2>Cadastro de Cidades</h2>
   <a href="formListaFuncionario.php">Lista de Cidades</a>
<form method="post" action="gravaFuncionario.php">
<?php
  if ($_GET['id'])  {
    ?>
      <label>ID: </label> <br>
      <input type="TEXT " name="id" readonly="readonly" value=<?php echo $item['id_funcionario'] ?> >
<?php     
  }
  ?>
  <label>Nome:</label> 
  <input type="TEXT" name="nome" value=<?php echo $item['nm_funcionario']?> > 
  <label>Email</label> 
  <input type="TEXT" name="email" value=<?php echo $item['email']?> > 
  <label>CPF</label>
  <input type="TEXT" name="cpf" value=<?php echo $item['cpf']?> > 
  <label>Telefone</label> 
  <input type="TEXT" name="telefone" value=<?php echo $item['telefone']?> > 
  <label>RG</label> 
  <input type="TEXT" name="rg" value=<?php echo $item['rg']?> > 
  <label>Data de nascimento</label>
  <input type="TEXT" name="dt_nasc" value=<?php echo $item['dt_nascimento']?> > 
  <label>Senha</label> 
  <input type="TEXT" name="senha" value=<?php echo $item['senha']?> >                                         
  <input type="submit" name="Salvar" value="Salvar">
</form>