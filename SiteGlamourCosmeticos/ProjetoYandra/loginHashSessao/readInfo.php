<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Update</title>
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
	<link rel="stylesheet" href="fontawesomee/css/all.min.css">

</head>
<body>
<?php
include_once("conect.php");

include_once("Crud.php");

//$obj = new Crud($conect);

//$obj->readInfo();

// $dado = $obj->getAll();

// foreach ($dado as $info) {
// 	echo $info['id']." - ".$info['nome']." - ".$info['idade']." - ".$info['email']." - ".$info['data_now']."<br>";
// }


// echo "<table border='1'>";
// echo "<tr><th> Nome </th><th> Idade </th><th> E-mail </th><th> Data </th></tr>";
// foreach ($dado as $info) {
// 	echo "<tr><td>".$info['nome']."</td>
// 	<td>".$info['idade']."</td>
// 	<td>".$info['email']."</td>
// 	<td>".$info['data_now']."</td></tr>";
// }

// echo "</table>";
$nome = $_POST['nome'];
$obj = new Crud($conect);
$dado = $obj->readInfoAll($nome);


?>

<link rel="stylesheet" type="text/css" href="css/estiloo.css">

<main>
<center><header><strong>Registro(s) da pesquisa</strong></header></center>

<?php  

echo "<table class='table table-dark'>";
 echo "<thead>";
   echo "<tr>
     <th scope='col'>Nome</th>
	 <th scope='col'>Endereço</th>
	 <th scope='col'>E-mail</th>
	 <th scope='col'>Telefone</th>
	 <th scope='col'>Senha</th>
	 <th scope='col'>Data</th>
	 <th scope='col'>Alterar</th>
	 <th scope='col'>Deletar</th>
   </tr>";
   echo "</thead>";

foreach ($dado as $info) {
	echo "<tbody><tr><td>".$info['nome']."</td>
	<td>".$info['endereco']."</td>
	<td>".$info['email']."</td>
	<td>".$info['telefone']."</td>
	<td>".$info['senha']."</td>
	<td>".$info['data_now']."</td>
	<td><a href=formEdit.php?id=".$info['id']."><i class='fa-solid fa-pen-to-square'></i>
	</a></td>
	<td><a href=delete.php?id=".$info['id']."><i class='fa-solid fa-trash-can'></i></a></td></tr></tbody>";

}

echo "</table>";
	// echo "<tr><td>".$dado['nome']."</td>
	// <td>".$dado['idade']."</td>
	// <td>".$dado['email']."</td>
	// <td>".$dado['data_now']."</td></tr>";

?>
</main>
<script src="bootstrap.bundle.min.js"></script>	
</body>
</html>