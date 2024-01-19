<?php 
include_once("conect.php");

include_once("Crud.php");


$obj = new Crud($conect);

$obj->readInfo();

$dados = $obj->getAll();

?>

 <link rel="stylesheet" type="text/css" href="css/estilo.css">
<main>
	<header><strong>Delete um registro!</strong></header>


<?php  

echo "<table border='1'>";
echo "<tr><th> Nome </th><th> Endereço </th><th> E-mail </th><th> Telefone </th><th> Senha </th><th> Data </th><th>Excluir</th></tr>";
foreach ($dados as $info) {
 echo "<tr>
 <td>".$info['nome']."</td>
 <td>".$info['endereco']."</td>
 <td>".$info['email']."</td>
 <td>".$info['telefone']."</td>
 <td>".$info['senha']."</td>
 <td>".$info['data_now']."</td>
 <td><a href=delete.php?id=".$info['id'].">Excluir</a></td></tr>";
}

echo "</table>";

?>
</main>






 