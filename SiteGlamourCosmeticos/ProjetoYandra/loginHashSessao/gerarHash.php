<style>
    h1{color:blue}
</style>
<?php
$usuario = "suporte";
$senha = "sup@2023"; 
$user = password_hash($usuario,PASSWORD_DEFAULT); 
echo "Usuário:".$user."<br>";

$pass = password_hash($senha,PASSWORD_DEFAULT); 
echo "Senha:".$pass."<br>"; 


$usuario2 = "Suporte"; 
 if(password_verify($usuario2,$user)){
   echo "Usuário correto!"; 
}else{
    echo "Usuário Errado!"; 
}

