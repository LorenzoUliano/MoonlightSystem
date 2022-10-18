<?php
   include '../formMenu.php';
   include '../conexao/conecta.php';
   if ($_GET['id']) {
    $id=$_GET['id'];
     $sql="SELECT id_produto, nm_produto, precocompra,precovenda, fk_id_grupo,obs FROM tb_produto WHERE id_produto=$id";
     $resultado=mysqli_query($conexao,$sql);
     if ($resultado==false) {
       die("Erro: ".mysqli_error($conexao));
      } else
      {
        $item=mysqli_fetch_array($resultado);
      }
     
   }

   $sqlgrupo="SELECT id_grupo, nm_grupo FROM tb_grupo ORDER BY nm_grupo";
   $resultadoGrupo=mysqli_query($conexao,$sqlgrupo);
   $itemGrupo=mysqli_fetch_array($resultadoGrupo);
   ?>
   <meta charset="utf-8">
   <h2>Cadastro de Produtos</h2>
   <a href="formListaProduto.php">Lista de Produtos</a> <br> <br>
<form method="post" action="GravaProduto.php">
<?php
  if ($_GET['id'])  {
    ?>
      <label>ID: </label> <br>
      <input type="TEXT " name="id" readonly="readonly" value=<?php echo $item['id_produto'] ?> > <br> <br>
<?php     
  }
  ?>
  <label>Nome:</label> <br>
  <input type="TEXT" name="nome" value=<?php echo $item['nm_produto']?> > <br> <br>
  <label>Preço de Compra</label> <br>
  <input type="TEXT" name="precocompra" value=<?php echo $item['precocompra']?> /> <br><br>
  <label>Preço de Venda</label> <br>
 <input type="TEXT" name="precovenda" value=<?php echo $item['precovenda']?> /> <br><br>
 <label>Grupo</label> <br>

 <select  name="grupo">
  <option>Selecione</option>
  <?php 
   while ($itemGrupo=mysqli_fetch_array($resultadoGrupo)) {
    if ($itemGrupo['id_grupo']==$item['fk_id_grupo'])
    {
      echo "<option value='$itemGrupo[id_grupo]' selected='selected'>";
    }else
    {
      echo "<option value='$itemGrupo[id_grupo]' >";
    }
    echo $itemGrupo['nm_grupo'];
    echo "</option>";

   }
   ?>

 </select>
 <br> <br>

  <label>Observação:</label>
  <TEXTAREA cols=30 rows=05 id="obs" name="obs" ><?php echo $item['obs']?> </TEXTAREA> <br/> <br/>                                                      
  <input type="submit" name="Salvar" value="Salvar">
</form>