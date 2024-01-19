<?php 
  session_start(); 
  if(isset($_SESSION['user'])){
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="bootstrap.min.css">

    <!-- <link rel="stylesheet" type="text/css" href="css/estilo.css"> -->
    <title>Tela do revendedor</title>
    <style type="text/css">
        h2{
            margin-top: 90px;
            text-align: center;
            color:#7C2A2A;
            font-size:50px;
        }
    </style>
</head>
<body> 
    <main>
    <header><strong><h2>Selecione a funcionalidade do site</h2></strong></header>
    <br>
    <section>
        <center><div class="container">
            <div class="mt-4 btn-group" role="group" aria-label="Basic outlined example">
                <button type="button" class="btn btn-outline btn-lg" style="width:500px; height:150px; bacKground-color:#7C2A2A; border: solid 1px #ffffff;"><a href="formInsert.php" style="text-decoration: none; color:#ffffff;">Cadastrar cliente</a></button>
                <button type="button" class="btn btn-outline btn-lg" style="width:500px; height:150px; bacKground-color:#7C2A2A; border: solid 1px #ffffff;"><a href="formRead.php" style="text-decoration: none; color:#ffffff;">Pesquisar cliente</a></button>
              </div>
        </div>
        <br>
        <br>

        <center><div class="container">
            <div class="btn-group" role="group" aria-label="Basic outlined example">
                <button type="button" class="btn btn-outline btn-lg" style="width:500px; height:150px; bacKground-color:#7C2A2A; border: solid 1px #ffffff;"><a href="../loginHashSessao/Upload/index.php" style="text-decoration: none; color:#ffffff;">Área dos produtos</a></button>
                <button type="button" class="btn btn-outline btn-lg" style="width:500px; height:150px; bacKground-color:#7C2A2A; border: solid 1px #ffffff;"><a href="#" style="text-decoration: none; color:#ffffff;">Número de pedidos</a></button>
              </div>
        </div>
        <br>
        <p> <a href="formLogin.php" class="mt-5 btn btn-lg btn" style="width:230px; bacKground-color:#7C2A2A; color:#ffffff;"> Retornar à página de login </a> 
    </section>
    </main>
    
    <script src="bootstrap.bundle.min.js"></script>

</body>
</html>
<?php 
  }else{
    echo "Acesso negado!"; 
  }
  ?>