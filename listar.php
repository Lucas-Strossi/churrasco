<?php
require_once 'conexao.php';

$sql = "SELECT nome, turma, tipo_churrasco, confirmado, pago FROM participantes";
$resultado = $con->query($sql);

while($usuario = $resultado->fetch_assoc()){
    echo "<tr>
                <td> {$usuario['nome']}</td>
                <td>{$usuario['turma']}</td>
                <td>{$usuario['tipo_churrasco']}</td>
                <td>{$usuario['confirmado']}</td>
                <td>{$usuario['pago']}</td>
                <td><a href='editar.php'>Editar</a> \ <a href='excluir.php'>Excluir</a></td>
            </tr>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Turma</th>
                <th>Tipo</th>
                <th>Presença</th>
                <th>Pagamento</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
</body>
</html>