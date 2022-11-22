<?php
  error_reporting(0);
   include '../formMenu.php';
   include '../conexao/conecta.php';
   if ($_GET['id']) {
    $id=$_GET['id'];
     $sql="SELECT id_produto, nm_produto, precocompra, precovenda, fk_id_grupo, obs FROM tb_produto WHERE id_produto=$id";
     $resultado=mysqli_query($conexao,$sql);
     if ($resultado==false) {
       die("Erro: ".mysqli_error($conexao));
      } else
      {
        $item=mysqli_fetch_array($resultado);
      }
     
   }

   $sqlgrupo="SELECT id_grupo, nm_grupo FROM tb_grupo";
   $resultadoGrupo=mysqli_query($conexao,$sqlgrupo);
   $itemGrupo=mysqli_fetch_array($resultadoGrupo);
   ?>
   <meta charset="utf-8">
   <link rel="stylesheet" href="../layouts/style.css">
<div class="text-center">
   <h2>Cadastro de Produtos</h2>
   <a href="formListaProduto.php" class="btn btn-primary">Lista de Produtos</a>
  <form method="post" action="GravaProduto.php" class="d-flex flex-column w-100 align-items-center pt-3">
  <?php
    if ($_GET['id'])  {
      ?>
        <label>ID: </label>
        <input type="TEXT " name="id" readonly="readonly" value=<?php echo $item['id_produto'] ?> > 
  <?php     
    }
    ?>
    <label>Nome</label> 
    <input type="TEXT" name="nome" value=<?php echo $item['nm_produto']?> > 
    <label>Preço de Compra</label> 
    <input type="TEXT" name="precocompra" value=<?php echo $item['precocompra']?> >
    <label>Preço de Venda</label>
  <input type="TEXT" name="precovenda" value=<?php echo $item['precovenda']?> > 
  <label>Grupo</label>

  <select  name="grupo">
    <option>Selecione</option>
    <?php 
    while ($itemGrupo=mysqli_fetch_array($resultadoGrupo)) {
      if ($itemGrupo['id_grupo']==$item['fk_id_grupo']){
        echo "<option value='$itemGrupo[id_grupo]' selected='selected'>";
      }else {
        echo "<option value='$itemGrupo[id_grupo]' >";
      }
      echo $itemGrupo['nm_grupo'];
      echo "</option>";

    }
    ?>

  </select>
    <label>Observação</label>
    <TEXTAREA cols=30 rows=05 id="obs" name="obs" ><?php echo $item['obs']?> </TEXTAREA>                                                   
    <input type="submit" name="Salvar" value="Salvar" class="btn btn-success mt-3">
  </form>
</div>
  