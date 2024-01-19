<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
    <!-- <link rel="stylesheet" type="text/css" href="css/estilo.css"> -->
    <title>Pesquisar no BD</title>
    <style type="text/css">
        h2{
            margin-top: 90px;
            text-align: center;
	          font-size: 50px;
	          color:  #7C2A2A;

        }
    </style>
</head>
<body>
    <main class="form-signin w-100 m-auto">
    <section>
    <header><strong><h2>Pesquisar cliente</h2></strong></header>
    <br>
    <nav>
  <div class="container">
    <form class="d-flex" role="search" action="readInfo.php" method="post">
      <input class="form-control me-2" type="search" name="nome" placeholder="Pesquisar" aria-label="Pesquisar">
      <button class="btn btn-outline-primary" style="background-color:#541B1B; border: solid 1px #541B1B; color:#ffffff;" type="submit">Pesquisar</button>
    </form>
    <br>
    <br>
    <br>
    <br><br><br>
    <center><p> <a href="index.php" class="mt-5 btn btn-lg btn" style="width:230px; bacKground-color:#7C2A2A; color:#ffffff;"> Tela de funcionalidades </a> 

  </div>
    </nav>
        <!-- <p> <input type="text" name="nome" size="80"> </p>
        <button type="submit"> Pesquisar </button> -->
     </section>
     </main>
     <script src="bootstrap.bundle.min.js"></script>
</body>
</html>