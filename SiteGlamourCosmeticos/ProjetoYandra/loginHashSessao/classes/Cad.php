<?php

class Cad 
{
    private $conect;
    
    // private $nome;
    private $senha;
    private $email;
    
    function __construct($conect)
    {
        $this->connect = $conect;
    }

    public function setDadosCad($email,$senha)
    {
       
        $this->senha = $senha;
        $this->email = $email;

    }

    public function insertCad()
    {
        $sql = $this->connect->prepare("INSERT INTO log(email,senha) VALUES(?,?)");
        $sql->bindParam(1,$this->email);
        $sql->bindParam(2,$this->senha);

        if($sql->execute()){
            echo "<center>Dados Enviados!<br>";
        }else{
            echo "<center>Dados Não Enviados!<br>";
        }
    }

}

?>