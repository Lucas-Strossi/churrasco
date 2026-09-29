<?php
require_once 'conexao.php';

    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $sql = "DELETE FROM participantes WHERE id = $id";

        if($con->query($sql)) {
            header("Location: listar.php?status=excluido");
        }
        else{
            echo "Erro ao excluir participante: " . $con->error;
        }
    } 
        else{
            header("Location: listar.php");
        }
    exit;
?>