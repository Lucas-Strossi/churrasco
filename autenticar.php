<?php
session_start();
require_once 'conexao.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    
</body>
</html>

<?php
$email = mysqli_real_escape_string($con, $_POST['email'] ?? '');
$senha = mysqli_real_escape_string($con, $_POST['senha'] ?? '');

$sql = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
$resultado = mysqli_query($con, $sql);


if (mysqli_num_rows($resultado) > 0) {

    $usuario = mysqli_fetch_assoc($resultado);
    
    $_SESSION['usuario_id'] = $usuario['id'];
    header("Location: listar.php");
    exit;
} else {
    echo "<div id='mensagem'>E-mail ou senha incorretos! <a href='login.php'>Voltar</a></div>";
}
?>