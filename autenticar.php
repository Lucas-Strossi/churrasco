<?php
session_start();
require_once 'conexao.php';

$email = mysqli_real_escape_string($con, $_POST['email'] ?? '');
$senha = mysqli_real_escape_string($con, $_POST['senha'] ?? '');

$sql = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
$resultado = mysqli_query($con, $sql);


if (mysqli_num_rows($resultado) > 0) {

    $usuario = mysqli_fetch_assoc($resultado);
    
    $_SESSION['usuario_id'] = $usuario['id'];
    header("Location: painel.php");
    exit;
} else {
    echo "E-mail ou senha incorretos! <a href='login.php'>Voltar</a>";
}
?>