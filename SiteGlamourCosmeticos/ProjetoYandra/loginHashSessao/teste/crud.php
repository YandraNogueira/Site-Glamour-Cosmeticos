<?php

class Crud
{
    private $connect;

    private $nome;
    private $preco;
    private $descricao;
    private $imagem;


    function __construct($conect)
    {
        $this->connect = $conect;
    }


    public function readInfoAll($nome = null){
        if(isset($nome)){
             $sql = $this->connect->prepare("SELECT * FROM produtos WHERE nome LIKE ?");
             $sql->bindValue(1,"%$nome%");
             $sql->execute();

             $result = $sql->fetchAll(PDO::FETCH_ASSOC);
             return $result;

        }else{
            $this->getAll();
        }
    }

    

}   
?>