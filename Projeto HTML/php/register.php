<?php

include("connection.php");
$con = new Connection();

if(isset($_POST['name']) && isset($_POST['pass']))
{
    $name = $_POST['name'];
    $pass = $_POST['pass'];

    $query = $con->getInstance()->query("SELECT * FROM usuarios WHERE name='$name' and password='$pass';");
    $result = $query->fetchAll();

    if(count($result))
    {
      echo "Este e-mail já está cadastrado. <a href='login.php'>Clique aqui</a> para realizar o login.";
    } else {
      $con->getInstance()->query("INSERT INTO usuarios (name,password) VALUES ('$name','$pass');");
      header('Location: login.php');
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Cadastrar</title>
</head>
<body>

  <section id="container">
    <article class="formContent">
      <form action="register.php" method="post">
        <input type="text" id="name" name="name" placeholder="Seu nome completo">
        <input type="password" id="pass" name="pass" placeholder="Palavra-passe">
        <button type="submit">Entrar</button>
      </form>
    </article>
  </section>
  
</body>
</html>