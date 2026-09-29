<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <form id="form_login" action="autenticar.php" method="post">
        <h2>Sistema Churrasco 🍖</h2>
        <img src="perfil.webp" alt="">
        <input type="text" placeholder="E-mail" name="email" required>
        <input type="password" placeholder="senha" name="senha" required>
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