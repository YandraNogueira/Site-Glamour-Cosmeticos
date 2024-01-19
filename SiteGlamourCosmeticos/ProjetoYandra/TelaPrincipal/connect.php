<?php 
$bank = "glamour1_login";
$host = "localhost";
$user_bd = "glamour1_login"; 
$pass_bd = "Login@12";
$charset = "utf8";

$config = "mysql:dbname=$bank;";
$config .= "host=$host;";
$config .= "charset=$charset";

try{
    $conn = new PDO($config,$user_bd,$pass_bd); 
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   
} catch(PDOException $e) {
    echo "Erro de conexão com BD: ".utf8_encode($e->getMessage());
}