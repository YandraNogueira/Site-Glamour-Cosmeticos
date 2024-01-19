<?php

class Sessao 
{

    private $connect;
    private $sql;

    function __construct($conect)
    {
        $this->connect = $conect;
    }

    public function readUsers()
    { 
        $this->sql = $this->connect->prepare("SELECT * FROM log"); 
        $this->sql->execute(); 
        $result = $this->sql->fetchAll(PDO::FETCH_OBJ);
        return $result;  
    }

    public static function autorizado($link,$emp)
    {
        session_start();
        $_SESSION['login'] = session_id();
        $_SESSION['user'] = $emp;
        header("location:$link"); 
    }

    public static function logoff(){  
        session_start();
        session_destroy();
        header("location:../loginHashSessao/forms/form-loginCliente.php");
        exit; 
    }

}

?>