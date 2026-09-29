<?php
require_once 'conexao.php';

$id = $_POST['id'];
$nome = $_POST['nome'];
$turma = $_POST['turma'];
$tipo_churrasco = $_POST['tipo_churrasco'];
$confirmado = $_POST['confirmado'];
$pago = $_POST['pago'];

$sql = "UPDATE participantes SET nome = '$nome', turma = '$turma', tipo_churrasco = '$tipo_churrasco', confirmado = '$confirmado', pago = '$pago' WHERE id = $id";

    if ($con->query($sql)) {
        header("Location: listar.php");
    } 
    else {
        echo "Erro ao atualizar: " . $con->error;
    }
    exit;
