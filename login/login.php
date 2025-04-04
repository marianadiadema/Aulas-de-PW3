<?php
require 'UsuarioOld.class.php';

$sucesso = $usuario = new Usuario();
//

$nome = $_POST["Nome"];
$email = $_POST["Email"];
$senha = $_POST["Senha"];

$user1 = $usuario->cadastrar($nome, $email, $senha);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Login PHP</title>
</head>
<body>
    

    <form action="" method="post">
    <h1>Login</h1>
        <div>
            <p>Nome: </p>
            <input type="text" name="Nome">
        </div>

        <div>
            <p>Email: </p>
            <input type="text" name="Email">
        </div>
        
        <div>
            <p>Senha: </p>
            <input type="password" name="Senha">
        </div>

        <input type="submit" name="button" value="Cadastrar" id="btn">

    </form>
</body>
</html>



