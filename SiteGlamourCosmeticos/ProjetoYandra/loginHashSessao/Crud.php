<?php

class Crud
{
    private $connect;

    private $nome;
    private $email;
    private $endereco;
    private $telefone;
    private $senha;


    function __construct($conect)
    {
        $this->connect = $conect;
    }


    public function decodeUser($userEmpresa)
    {
        $sql = $this->connect->prepare("SELECT * FROM log WHERE usuario=?");

        $sql->bindValue(1,$userEmpresa);

        $sql->execute();

        $result = $sql->fetchAll(PDO::FETCH_ASSOC);

        return $result;

    }

    public function setDados($nome,$email,$endereco,$telefone,$senha){
        $this->nome = $nome;
        $this->email = $email;
        $this->endereco = $endereco;
        $this->telefone = $telefone;
        $this->senha = $senha;
    }
    
    public function insertDados(){
        $sql = $this->connect->prepare("INSERT INTO clientes(nome,endereco,email,telefone,senha,data_now)VALUES(?,?,?,?,?,now())");
        
        $sql->bindParam(1,$this->nome);
        $sql->bindParam(2,$this->endereco);
        $sql->bindParam(3,$this->email);
        $sql->bindParam(4,$this->telefone);
        $sql->bindParam(5,$this->senha);

        if ($sql->execute()) {
            echo "<center>Dados inseridos com sucesso!<br>";
        }else{
            echo "<center>Erro! Dados não inseridos.<br>";
        }
    }

    public function readInfo($id = null){
       if(isset($id)){
        $sql = $this->connect->prepare("SELECT * FROM clientes WHERE id=?");

        $sql->bindValue(1,$id);
        $sql->execute();

        $result = $sql->fetch(PDO::FETCH_OBJ);

        return $result;

    }else{
       $this->getAll(); 
  }
}

    public function getAll(){
        $sql = $this->connect->query("SELECT * FROM clientes");
        return $sql->fetchAll();

        
    }


    public function readInfoAll($nome = null){
        if(isset($nome)){
             $sql = $this->connect->prepare("SELECT * FROM clientes WHERE nome LIKE ?");
             $sql->bindValue(1,"%$nome%");
             $sql->execute();

             $result = $sql->fetchAll(PDO::FETCH_ASSOC);
             return $result;

        }else{
            $this->getAll();
        }
    }

    public function update($id,$nome,$endereco,$email,$telefone,$senha){
        $sql = $this->connect->prepare("UPDATE clientes SET nome=?, endereco=?, email=?, telefone=?, senha=? WHERE id=?");

        $sql->bindValue(1,$nome,PDO::PARAM_STR);
        $sql->bindValue(2,$endereco,PDO::PARAM_STR);
        $sql->bindValue(3,$email,PDO::PARAM_STR);
        $sql->bindValue(4,$telefone,PDO::PARAM_STR);
        $sql->bindValue(5,$senha,PDO::PARAM_STR);
        $sql->bindValue(6,$id,PDO::PARAM_STR);

        if ($sql->execute()) {
            echo "<center>Registro Atualizado! <br> <a href='formRead.php'> Voltar </a>";
        }else{
            echo "<center>Problemas ao tentar atualizar registro! <br> <a href='readAll.php'> Voltar </a>";
        }

    }


    public function delete($id){
        $sql = $this->connect->prepare("DELETE FROM clientes WHERE id=?");

        $sql->bindValue(1,$id,PDO::PARAM_STR);

        if ($sql->execute()) {
            echo "<center>Registro Excluído! <br> <a href='formRead.php'> Voltar </a>";
        }else{
            echo "<center>Problemas ao tentar atualizar registro! <br> <a href='readAll.php'> Voltar </a>";
        }

    }

}

?>