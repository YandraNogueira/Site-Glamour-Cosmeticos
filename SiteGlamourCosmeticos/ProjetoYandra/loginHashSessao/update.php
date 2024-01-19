<?php 
$nome = $_POST['pessoa'];
$endereco = $_POST['endereco'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$senha = $_POST['senha'];
$id = $_POST['id'];

include_once("conect.php");

include_once("Crud.php");

$obj = new Crud($conect);

$obj->update($id,$nome,$endereco,$email,$telefone,$senha);


 ?>