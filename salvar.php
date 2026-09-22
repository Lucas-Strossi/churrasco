<?php
require_once 'conexao.php';


$nome = $_POST['nome'];
$turma = $_POST['turma'];
$telefone = $_POST['telefone'];
$churrasco = $_POST['churrasco'];
$acompanhamento = $_POST['acompanhamento'];
$presenca = $_POST['presenca'];
$pagamento = $_POST['pagamento'];

$sql = "INSERT INTO participantes (nome, turma, telefone, tipo_churrasco, acompanhamento, confirmado, pago) 
        VALUES ('$nome', '$turma', '$telefone', '$churrasco', '$acompanhamento', '$presenca', '$pagamento')";

if ($con->query($sql)) {
    echo "Cadastrado com sucesso!";
} else {
    echo "Erro ao cadastrar.";
}
?>
