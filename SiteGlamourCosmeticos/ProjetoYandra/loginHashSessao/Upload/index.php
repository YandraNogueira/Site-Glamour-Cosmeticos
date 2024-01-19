<?php
session_start();
include_once "conexao.php";
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.111.3">
    <link rel="shortcut icon" type="image/png" href="logo_redonda.png" />

    <title> Listar produtos</title>
</head>
    

    <?php
    


    if(isset($_SESSION['msg'])){
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
?>

<link href="bootstrap.min.css" rel="stylesheet">
    <link href="product.css" rel="stylesheet">
<style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .d-block.w-100{
        width: 100px;
        height: 300px;
      }

      .b-example-divider {
        width: 100%;
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .cardall{
        padding: 5rem;
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        justify-content: space-around;
        gap: 70px;
      }

      #carouselExampleSlidesOnly{
        padding: 5rem;
      }

      .btn{
        color: aliceblue;
        background-color: rgb(133, 10, 10);
        transition: filter 0.2s;
      }

      .btn:hover{
        background-color: rgb(133, 10, 10);
        filter: brightness(0.8);
      }
      .bd-mode-toggle {
        z-index: 1500;
      }

      .cart-table {
  width: 100%;
  border-collapse: collapse;
}

.table-head-item {
  text-align: start;
  border-bottom: 1px solid gray;
  padding-bottom: 6px;
  text-transform: uppercase;
}

.second-col,
.third-col {
  width: 26%;
}

.cart-product td {
  padding: 8px 0;
}

.product-identification {
  display: flex;
  align-items: center;
}

.cart-product-image {
  width: 120px;
  height: 70px;
}

.cart-product-title {
  margin-left: 16px;
  font-size: 18px;
}

.cart-product-price {
  font-family: "Raleway", sans-serif;
}

.product-qtd-input {
  width: 48px;
  height: 34px;
  border-radius: 6px;
  border: 2px solid #c23616;
  text-align: center;
  background: #eee;
}

.remove-product-button {
  margin-left: 12px;
  background: #c23616;
  color: white;
  padding: 10px 8px;
  border: 0;
  border-radius: 6px;
  transition: filter 0.2s;
  text-decoration: none;
}

.remove-product-button:hover {
  filter: brightness(0.8);
  text-decoration: none;
}

.cart-total-container {
  border-top: 1px solid gray;
  text-align: end;
  padding: 6px 16px 0 0;
  font-size: 18px;
}

.cart-total-container strong {
  margin-right: 12px;
}

.section-title{
  display: flex;
  justify-content: center;
}

.purchase-button {
  display: flex;
  margin: 22px auto 0;
  background: #c23616;
  color: white;
  border: 0;
  border-radius: 6px;
  padding: 14px 18px;
  text-transform: uppercase;
  font-size: 18px;
  font-weight: bold;

  transition: filter 0.2s;
}

.purchase-button:hover {
  filter: brightness(0.8);
}

.navbar-text{
  margin-left:10px;
}
.button-hover-background {
  width: 180px;
  height: 40px;
  background-color: #A83F3F;
  border: none;
  border-radius: 50px;
  color: rgb(255, 255, 255);
  font-weight: 600;
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 5px;
  cursor: pointer;
  box-shadow: 1px 3px 0px #500000;
  transition-duration: .3s;
}
.button-hover-background > a {
    text-decoration:none;
    color: #ffff;
}
.cartIcon {
  width: 14px;
  height: fit-content;
}

.cartIcon path {
  fill: white;
}

.button-hover-background:active {
  transform: translate(2px ,0px);
  box-shadow: 0px 1px 0px rgb(139, 113, 255);
  padding-bottom: 1px;
  text-decoration: none;
}

#produtos {
  
  margin-left:10px;
  display: inline-block;
}

</style>
</head>

<body>

    <header class="site-header sticky-top py-1 " style="background-color:#391111">
        <nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
          <div class="container-fluid">
            <a class="navbar-brand" href="#" style="color: rgb(212, 211, 211);">Glamour</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link" href="upload.php" style="color:rgb(170, 168, 168);">Cadastrar produto</a>
                </li>
              </ul>
              <form class="d-flex" role="search" action="readInfo.php" method="post">
                <input class="form-control" type="search" placeholder="Pesquisar" aria-label="Pesquisar" name="nome">
                <button class="btn btn-outline-primary" type="submit" style="margin-left:5px; border: 2px solid #340F0F;">Pesquisar</button>
              </form>
              
              <span class="navbar-text" style="color: rgb(212, 211, 211);">
                <em> Glamour cosméticos e perfumaria </em> 
                </span>
            </div>
          </div>
        </nav>
      </header>

      <scroll-container>
<?php
    $query_usuarios = "SELECT id, nome, preco, descricao, imagem FROM produtos ORDER BY id 
     DESC";
    $result_usuarios = $conn->prepare($query_usuarios);
    $result_usuarios->execute();

    while($row_usuario = $result_usuarios->fetch(PDO::FETCH_ASSOC)){
        //var_dump($row_usuario);
        extract($row_usuario);
        //echo "ID: " . $row_usuario['id'] . "<br>";
        // echo "ID: $id <br>";
        // echo "Nome: $nome <br>";
        // echo "Preço: $preco <br>";
        // echo "Descrição: $descricao <br>";
        // echo "Foto: $imagem <br>"; 

        //echo "<img src='imagens/" . $row_usuario['id'] . "/" . $row_usuario['foto_usuario'] ."' width='150'>";
        

        if((!empty($imagem)) and (file_exists("imagens/$id/$imagem"))){
            echo "<scroll-page id='produtos'>

            <div class='cardall'>
            <div class='card' style='width: 20rem;'>
            <img src='imagens/$id/$imagem'  alt='imagem do produto' class='product-image card-img-top'  style='width:318px; height:300px;'>
            <div class='card-body'>
              <h5 class='product-title ard-titlce'>$nome</h5>
            </div>
            <ul class='list-group list-group-flush'>
              <li class='list-group-item'>$descricao</li>
              
              <li class='product-price list-group-item'>$preco</li>
            </ul>
            <div class='card-body'>
            <button  type='button' class='button-hover-background btn btn-primary'> <a href='visualizar.php?id=$id'>Visualizar</a>
        <path d='M0 24C0 10.7 10.7 0 24 0H69.5c22 0 41.5 12.8 50.6 32h411c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3H170.7l5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5H488c13.3 0 24 10.7 24 24s-10.7 24-24 24H199.7c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5H24C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z'></path>
        </button>
        <br>
            <button  type='button' class='button-hover-background btn btn-primary'> <a href='editar.php?id=$id'>Editar informações</a>
        <path d='M0 24C0 10.7 10.7 0 24 0H69.5c22 0 41.5 12.8 50.6 32h411c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3H170.7l5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5H488c13.3 0 24 10.7 24 24s-10.7 24-24 24H199.7c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5H24C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z'></path>
        </button>
        <br>
            <button  type='button' class='button-hover-background btn btn-primary'> <a href='editar_foto.php?id=$id'>Editar imagem</a>
        <path d='M0 24C0 10.7 10.7 0 24 0H69.5c22 0 41.5 12.8 50.6 32h411c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3H170.7l5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5H488c13.3 0 24 10.7 24 24s-10.7 24-24 24H199.7c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5H24C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z'></path>
        </button>
        <br>
          <button  type='button' class='button-hover-background btn btn-primary'> <a href='apagar.php?id=$id'>Deletar</a>
        <path d='M0 24C0 10.7 10.7 0 24 0H69.5c22 0 41.5 12.8 50.6 32h411c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3H170.7l5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5H488c13.3 0 24 10.7 24 24s-10.7 24-24 24H199.7c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5H24C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z'></path>
        </button>
          </div>
          
          </div>
        
          </div>
          </scroll-page>";
                }else{
            echo "<img src='imagens/icon_user.png' width='150'><br>";
            //echo "<a href='imagens/$id/$foto_usuario'>Download</a>";
        }
        
    }
    
    ?>

</body>

</html>