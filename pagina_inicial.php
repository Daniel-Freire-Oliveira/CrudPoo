<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Bem vindo</title>
	<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
<style type="text/css">
	body{
		display: flex;
		justify-content: center;
		align-items: center;
		height: 100vh;
	}
	.header{
		display: flex;
		justify-content: center;
		align-items: center;
		height: 50%;
		width: 50%;
		flex-direction: column;
	}
	.header form{

		flex-direction: column;
	}
</style>

</head>
<body>
	<header class="header">
		<h1>Cadastrar </h1>
		<form method="POST">
			  <div class="mb-3">
			  	<label for="exampleInputEmail1" class="form-label">Your Name</label>
			  	<input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
			    <label for="exampleInputEmail1" class="form-label">Email address</label>
			    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
			    <div id="emailHelp" class="form-text">Precisamos de um email valido</div>
			  </div>
			  <div class="mb-3">
			    <label for="exampleInputPassword1" class="form-label">Password</label>
			    <input type="password" name="pass" class="form-control" id="exampleInputPassword1">
			  </div>
			  <div class="mb-3 form-check">
			    <input type="checkbox" class="form-check-input" id="exampleCheck1">
			    <label class="form-check-label" for="exampleCheck1">Checar</label>
			  </div>
			  <button type="submit" class="btn btn-primary">Enviar</button>
			  <label class="emailHelp"><a href="visu.php">Ver clientes cadastrados</a></label>
		</form>

	</header>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
<script type="text/javascript">
	function ini(){
		var marcador = false;
		var btn1 = document.querySelector(".form-check-input");
		var checar = document.querySelector("#exampleInputPassword1")
		btn1.addEventListener("click",function(){
			if(checar.type == "password"){
				checar.type = "text"
			}else{
				checar.type = "password"
			}
		})
	}
	window.addEventListener("load",ini)
</script>

</body>
</html>
<?php
  $senha = null;
  $email = null;
  $name = null;

  $erroName = null;
  $erroEmail = null;
  $erroPass = null;

  if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(empty($_POST["name"])){
      $erroName = "Porfavor digite o seu nome";
    }else{
      $name = limpa($_POST['name']);
    }

    if(empty($_POST["email"])){
      $erroEmail = "Profavor digite seu email";
    }else{
      if(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
        $erroEmail  = "Porfavor digite um email valido";
      }else{
        $email = limpa($_POST['email']);
      }
    }

    if(empty($_POST['pass'])){
      $erroPass = "Porfavor digite sua senha";
    }else{
      if(strlen($_POST['pass']) > 9){
        $erroPass = "A senha deve ter no maximo 9 characteres";
      }else{
        $senha = limpa($_POST['pass']);
      }
    }

    if(strlen($erroName) > 0 && strlen($erroEmail) > 0 && strlen($erroPass) > 0){
        echo "Erro <br> $erroName";
        echo "$erroEmail";
        echo "$erroPass";
      }else{
      	require_once("./models/clientes.php");
		require_once("./models/conexao.php");
		require_once("./models/insert.php");
      	$c = new Clientes();
      	$i = new Insert();
      	$c->setEmail($email);
      	$c->setSenha($senha);
      	$c->setNome($name);
      	$i->create($c);

      }
  }
  function limpa($post){
    $post = htmlspecialchars($post);
    $post = trim($post);
    $post = stripslashes($post);
    return $post;
  }

?>