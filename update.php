<?php 
include "index.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>

    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    
</head>
<body>

<?php
if (isset($_POST['Editar'])){
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $Snome = $_POST['sobre-nome'];
    $email = $_POST['email'];

    $id = $_POST['id'];


    $sql = mysqli_query($conn, "UPDATE tb_pessoa SET Nome = '$nome', Telefone = '$telefone', Sobrenome = '$Snome', Gmail = '$email' WHERE id = '$id' ");  
  }
  if($sql){
    echo "Atualizado com sucesso!!!";
    header('Location:conteudo.php');
  }
  ?> 

<form method="POST" action="">
  <div>
    <div class="col">
      <input type="text" class="form-control" placeholder="Digite seu nome" name="nome">
    </div>

    <div class="col">
      <input type="text" class="form-control" placeholder="Digite seu sobrenome" name="sobre-nome">
    </div>

    <div class="col">
     <input type="text" class="form-control" placeholder="Digite seu telefone" name="telefone"> 
    </div>

    <div class="col">
      <input type="email" class="form-control" placeholder="Digite seu E-mail" name="email">
    </div>

    <div class="col">
      <button type="submit" class="btn btn-info" name="Enviar">Cadastrar dados</button>
    </div>
  </div>
</form>

<table class="table table-dark" style="text-align: center;">
  <thead>
  <h1 style="text-align: center;"><strong>Lista de Cadastrados</strong></h1>

    <tr>
      <th scope="col">Nome</th>
      <th scope="col">Sobrenome</th>
      <th scope="col">Telefone</th>
      <th scope="col">Gmail</th>
      <th scope="col"><strong>Editar/Excluir</strong></th>
    </tr>
  </thead>
  <tbody>
  <?php
  
    $sql = "SELECT * FROM tb_pessoa";
    $res = mysqli_query($conn, $sql);
      while($dados = mysqli_fetch_array($res)):
   ?>
    <tr>
      <td><?php echo $dados['Nome']; ?></td>
      <td><?php echo $dados['Sobrenome']; ?></td>
      <td><?php echo $dados['Telefone']; ?></td>
      <td><?php echo $dados['Gmail']; ?></td>  

      <td><a href=""><em class="btn btn-success">Editar</em></a>
      <a href="<?php ?>"><button type="button" class="btn btn-danger">Excluir</button></td></a>
      
    </tr>
      <?php endwhile;?>
  
  </tbody>
</table>


</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</html>
