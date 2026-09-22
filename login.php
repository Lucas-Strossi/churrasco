<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form action="autenticar.php" method="post">
        <input type="text" placeholder="E-mail" name="email">
        <input type="password" placeholder="senha" name="senha">
        <button>Logar</button>
    </form>
</body>
</html>
<?php


if(isset($_POST['email']) && isset($_POST['senha'])){
    $email = $_POST['email']?? false;
    $senha = $_POST['senha']?? false;    
}
?>