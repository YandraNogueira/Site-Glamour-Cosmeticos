<?php

session_start();
ob_start();

// Incluir a conexao com BD
include_once ("conexao.php");

// Receber o ID do registro
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

// Acessa o IF quando nao existe o ID
if (empty($id)) {
    $_SESSION['msg'] = "<center><p style='color: #f00;'>Erro: Produto não encontrado!</p></center>";
    header("Location: index.php");
} else {
    // QUERY para recuperar os dados do registro
    $query_usuario = "SELECT id, imagem FROM produtos WHERE id=:id LIMIT 1";
    $result_usuario = $conn->prepare($query_usuario);
    $result_usuario->bindParam(':id', $id, PDO::PARAM_INT);
    $result_usuario->execute();

    // Verificar se encontrou o registro no banco de dados
    if (($result_usuario) and ($result_usuario->rowCount() != 0)) {
        $row_usuario = $result_usuario->fetch(PDO::FETCH_ASSOC);
        //var_dump($row_usuario);
    } else {
        $_SESSION['msg'] = "<center><p style='color: #f00;'>Erro: Produto não encontrado!</p></center>";
        header("Location: index.php");
    }
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Editar imagem</title>
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
.input-group-lg{
      margin-top: 1em;
      margin-bottom: 1em;
    }
    h2{
      margin-top: 50px;
      text-align: center;
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
                  <a class="nav-link active" aria-current="page" href="index.php" style="color: rgb(212, 211, 211);">Listar produtos</a> 
                </li>
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="upload.php" style="color: rgb(212, 211, 211);">Cadastrar produto</a> 
                </li>
              </ul>
              
              
              <span class="navbar-text" style="color: rgb(212, 211, 211);">
                <em> Glamour cosméticos e perfumaria </em> 
                </span>
            </div>
          </div>
        </nav>
      </header>


      <scroll-container>
   

    <h2>Editar imagem do produto</h2>
    <br>

    <?php
    // Receber os dados do formulario
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);    

    // Verificar se o usuario clicou no botao
    if(!empty($dados['EditarFoto'])){
        // Receber a foto
        $arquivo = $_FILES['imagem'];
        var_dump($arquivo);
        // Verificar se o usuario esta enviando a foto
        if((isset($arquivo['name'])) and (!empty($arquivo['name']))){
            // Criar a QUERY editar no banco de dados
            $query_edit_usuario = "UPDATE produtos SET imagem=:imagem, modified = NOW() WHERE id=:id";
            $edit_usuario = $conn->prepare($query_edit_usuario);
            $edit_usuario->bindParam(':imagem', $arquivo['name'], PDO::PARAM_STR);
            $edit_usuario->bindParam(':id', $id, PDO::PARAM_INT);

            // Verificar se editou com sucesso
            if($edit_usuario->execute()){
                // Diretorio onde o arquivo sera salvo
                $diretorio = "imagens/$id/";

                // Verificar se o diretorio existe
                if((!file_exists($diretorio)) and (!is_dir($diretorio))){
                    // Criar o diretorio
                    mkdir($diretorio, 0755);
                }

                // Upload do arquivo
                $nome_arquivo = $arquivo['name'];
                if(move_uploaded_file($arquivo['tmp_name'], $diretorio . $nome_arquivo)){
                    // Verificar se existe o nome da imagem salva no banco de dados e o nome da imagem salva no banco de dados he diferente do nome da imagem que o usuario esta enviando
                    if(((!empty($row_usuario['imagem'])) or ($row_usuario['imagem'] != null)) and ($row_usuario['imagem'] != $arquivo['name'])){
                        $endereco_imagem = "imagens/$id/". $row_usuario['imagem'];
                        if(file_exists($endereco_imagem)){
                            unlink($endereco_imagem);
                        }
                    }

                    $_SESSION['msg'] = "<center><p style='color: green;'>Imagem editada com sucesso!</p></center>";
                    header("Location: visualizar.php?id=$id");
                }else{
                    echo "<center><p style='color: #f00;'>Erro: Informações não editadas com sucesso!</p></center>";
                }
            }else{
                echo "<center><p style='color: #f00;'>Erro: Informações não editadas com sucesso!</p></center>";
            }
        }else{
            echo "<p style='color: #f00;'>Erro: Necessário selecionar uma imagem!</p>";
        }
    }
    ?>
<section>
  <div class="container">
    <form name="edit_foto" method="POST" action="" enctype="multipart/form-data">
    <div class="input-group input-group-lg">
    <span class="input-group-text" id="inputGroup-sizing-lg">Imagem do produto:</span>
    <input type="file" name="imagem" id="imagem" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
    </div>
        <!-- <label>Foto: </label>
        <input type="file" name="imagem" id="imagem"><br><br> -->

        <center><button type="submit" class="mt-3 btn btn-lg btn" name="EditarFoto" value="Salvar"> Salvar </button>
          <center><p class="mt-3 mb-3 text-body-secondary">&copy; 2023–2024</p>
        </form>
     </div>
     </section>
        <script src="bootstrap.bundle.min.js"></script>



</body>

</html>