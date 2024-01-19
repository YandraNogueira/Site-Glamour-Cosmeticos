<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Editar cliente</title>
</head>
<body>
  
</body>
</html>
<?php 
$id = $_GET['id'];

include_once("conect.php");

include_once("Crud.php");

$obj = new Crud($conect);

$dados = $obj->readInfo($id);

//var_dump($dados);

// echo $dados['nome']."<br>";

 ?>

<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
<style type="text/css">
    .input-group-lg{
      margin-top: 1em;
      margin-bottom: 1em;
    }
    h1{
      margin-top: 50px;
      text-align: center;
      color:rgb(133, 10, 10);
    }
    body{
      background-image:url("fundoo.png");
      background-size:cover;
    }
    
  </style>
<main>
   <header><strong><h1>Altere os campos necessários</h1</strong></header>
<section>
<div class="container">
 <form action="update.php" method="post">
 <div class="input-group input-group-lg">
  <span class="input-group-text" id="inputGroup-sizing-lg">Nome:</span>
  <input type="text" name="pessoa"  value="<?=$dados->nome;?>" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
</div>
<div class="input-group input-group-lg">
  <span class="input-group-text" id="inputGroup-sizing-lg">Endereço:</span>
  <input type="text" name="endereco" value="<?=$dados->endereco;?>" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
</div>
<div class="input-group input-group-lg">
  <span class="input-group-text" id="inputGroup-sizing-lg">E-mail:</span>
  <input type="email" name="email" value="<?=$dados->email;?>" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
</div>
<div class="input-group input-group-lg">
  <span class="input-group-text" id="inputGroup-sizing-lg">Telefone:</span>
  <input type="tel" name="telefone" value="<?=$dados->telefone;?>" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
</div>
<div class="input-group input-group-lg">
  <span class="input-group-text" id="inputGroup-sizing-lg">Senha:</span>
  <input type="password" name="senha" value="<?=$dados->senha;?>" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
</div>
<p> <input type="hidden" name="id" value="<?=$dados->id;?>"> </p>
        <center><button type="submit" class="mt-3 btn btn-lg btn" style="background-color:rgb(133, 10, 10); color:#ffffff;"> Alterar </button>
          <center><p class="mt-3 mb-3 text-body-secondary">&copy; 2023–2024</p>
     </form>
     </div>
    </section>
 	
    <script src="bootstrap.bundle.min.js"></script>
 </form>
 </main>