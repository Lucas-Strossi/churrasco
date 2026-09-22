<?php
require_once 'conexao.php';

while($usuario = $con->fetch_assoc()){
    echo "<tr>
                <td> {$usuario['nome']}</td>
                <td>{$usuario['turma']}</td>
                <td>{$usuario['tipo']}</td>
                <td>{$usuario['presenca']}</td>
                <td>{$usuario['pagamento']}</td>
                <td>{$usuario['acoes']}</td>
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