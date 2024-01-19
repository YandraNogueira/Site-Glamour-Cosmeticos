<?php
include_once("connect.php"); 

$usuario = $_POST['usuario'];
$senha = $_POST['senha'];
try {
   $stmt = $conn->prepare("SELECT * FROM login");
   $stmt->execute();

   $result = $stmt->fetch(PDO::FETCH_OBJ);

  if(password_verify($usuario,$result->usuario) && password_verify($senha,$result->senha)){
     session_start(); 
     $_SESSION['user'] = $usuario; 
     $_SESSION['id'] = $result->id; //opcional
     header("Location:index.php");
     exit(); 
  }else{
    echo "<center><br><p style='color: #f00; font-size:35px;'>Usuário não encontrado, tente novamente! </p></center><br>";
    echo "<center><p> <a href='formLogin.php'> Voltar à página de login </a> "; 
  } 

} catch(Exception $e) {
    echo "Erro de consulta ao BD: ".utf8_encode($e->getMessage());
}

