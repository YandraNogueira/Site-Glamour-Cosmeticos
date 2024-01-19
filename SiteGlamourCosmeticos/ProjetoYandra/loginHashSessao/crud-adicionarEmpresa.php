<?php
//incluindo a conexão e as classes no arquivo
include_once("conect.php");
include_once("../classes/Cad.php");

//extraindo as variaveis
extract($_POST);

//comparando as senhas
if($senha == $confirmarSenha){
    //se a senha for igual vai usar o hash
    $email = password_hash("$email",PASSWORD_DEFAULT); 
    $senha = password_hash("$senha",PASSWORD_DEFAULT); 

    //chama a função do cad
    $obj = new Cad($conect);

    //esta setando o nome, senha e email nas variaveis la no Cad.php
    $obj->setDadosCad($email,$senha);

    //Está inserindo os dados no Banco de Dados :)
    $obj->insertCad();

}else{
    //caso as senhas forem diferentes
    echo "A senha tem que ser igual bobão";
}

 

?>