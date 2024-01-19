<?php 
$nome = $_POST['nome'];
$email = $_POST['e-mail'];
$endereco = $_POST['endereco'];
$telefone = $_POST['telefone'];
$senha = $_POST['senha'];


//echo $nome."-".$email."-".$idade;

include_once("conect.php");

include_once("Crud.php");

include_once("classes/Cad.php");

$obj = new Crud($conect);
$cad = new Cad($conect);

$obj->setDados($nome,$email,$endereco,$telefone,$senha);

$cad->setDadosCad($email, $senha);

$cad->insertCad();

$obj->insertDados();

