<?php

    function statusLogin()
    {

        if(isset($_POST['name']) && isset($_POST['password']))
        {
            include('connection.php');
            $connection = new Connection();
    
            $name = $_POST['name'];
            $password = $_POST['password'];
    
            $query = $connection->getConn()->query("SELECT * FROM table_name WHERE name='$name' and password='$name';");
            $result = $query->fetchAll();
    
            if(count($result))
            {
                foreach($result as $row) {
                    if($row['name'] == $name && $row['password'] == $password)
                    {
                        header('Location: ./'); // INDEX COM USUARIO LOGADO;
                    } else {
                        echo "Usuário ou senha incorreto. Por favor, tente novamente";
                    }
                }
            } else {
                echo "Nenhum resultado retornado.";
            }
        }

    }
    

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entrar</title>
</head>
<body>
    <section id="main">
        <article>
            <form action="login.php" method="POST">
                <input type="text" id="name" name="name" placeholder="Digite o seu nome de usuário">
                <input type="text" id="password" name="password" placeholder="Digite sua senha">
                <button type="submit">Entrar</button>
            </form>
        </article>
        <article class="errorMessege">
            <span> <?php statusLogin() ?> </span>
        </article>
    </section>
</body>
</html>