<?php
require_once 'conexao.php';

// 1. Pega o ID que veio lá da listar.php
$id = $_GET['id'];

// 2. Busca a linha desse participante específico
$sql = "SELECT id, nome, turma, tipo_churrasco, confirmado, pago FROM participantes WHERE id = $id";
$resultado = $con->query($sql);
$usuario = $resultado->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Participante</title>
</head>
<body>
    <h2>Editar Dados do Participante</h2>

    <form action="atualizar.php" method="POST">
        <!-- ID oculto para o atualizar.php saber quem ele vai modificar -->
        <input type="hidden" name="id" value="<?php echo $usuario['id']; ?>">

        <!-- INPUTS DE TEXTO -->
        <label>Nome:</label><br>
        <input type="text" name="nome" value="<?php echo $usuario['nome']; ?>"><br><br>

        <label>Turma:</label><br>
        <input type="text" name="turma" value="<?php echo $usuario['turma']; ?>"><br><br>

        <label>Tipo de Churrasco:</label><br>
        <input type="text" name="tipo_churrasco" value="<?php echo $usuario['tipo_churrasco']; ?>"><br><br>

        <!-- INPUTS DE RADIO -->
        <h4>Presença:</h4>
        <input type="radio" name="confirmado" value="Confirmado" <?php echo ($usuario['confirmado'] == 'Confirmado') ? 'checked' : ''; ?>> Confirmado <br>
        <input type="radio" name="confirmado" value="Não Confirmado" <?php echo ($usuario['confirmado'] == 'Não Confirmado' || $usuario['confirmado'] == 'NConfirmado') ? 'checked' : ''; ?>> Não Confirmado <br>

        <h4>Pagamento:</h4>
        <input type="radio" name="pago" value="Pago" <?php echo ($usuario['pago'] == 'Pago') ? 'checked' : ''; ?>> Pago <br>
        <input type="radio" name="pago" value="Pendente" <?php echo ($usuario['pago'] == 'Pendente') ? 'checked' : ''; ?>> Pendente <br><br>

        <button type="submit">Salvar Alterações</button>
        <a href="listar.php">Cancelar</a>
    </form>
</body>
</html>
    