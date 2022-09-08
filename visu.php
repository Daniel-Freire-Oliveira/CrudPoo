<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>clientes</title>
	<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>
<?php
	require_once("./models/clientes.php");
	require_once("./models/conexao.php");
	require_once("./models/insert.php");
	$i = new Insert();
	foreach($i->write() as $key){
		echo "	<table class='table'>
				  <thead>
				    <tr>
				      <th scope='col'>Id</th>
				      <th scope='col'>Name</th>
				      <th scope='col'>E-mail</th>
				      <th scope='col'>Password</th>
				    </tr>
				  </thead>
				  <tbody>
				    <tr>
				      <th scope='row'>".$key['id']."</th>
				      <td>".$key['nome']."</td>
				      <td>".$key['email']."</td>
				      <td>".$key['senha']."</td>
				    </tr>
				  </tbody>
				</table>";
}



?>
<body>

	<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

</body>
</html>