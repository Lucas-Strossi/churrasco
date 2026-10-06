<?php
require_once 'conexao.php';

$sql = "SELECT id, nome, turma, tipo_churrasco, confirmado, pago FROM participantes";
$resultado = $con->query($sql);

$nome = "";
$pagamento = "";
$presenca = "";


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
        <?php
            while($usuario = $resultado->fetch_assoc()){
                echo "<tr>
                        <td> {$usuario['nome']}</td>
                        <td>{$usuario['turma']}</td>
                        <td>{$usuario['tipo_churrasco']}</td>
                        <td>{$usuario['confirmado']}</td>
                        <td>{$usuario['pago']}</td>
                        <td>
                            <a href='editar.php?id={$usuario['id']}'>Editar</a> \ 
                            <a href='excluir.php?id={$usuario['id']}' onclick=\"return confirm('Tem certeza que deseja excluir este participante?');\">Excluir</a>
                        </td>
                    </tr>";
            }
        ?>
        </tbody>
        <br>  
    </table>
    <form id="form_pesquisa" action="" method="get">
            <input type="text" placeholder="Pesquise um nome" name="nome" required>
            <div id="pagamentos">
            <h4>Pagamentos: </h4>
            Todos<input type="radio" name="pagamento" value="*" checked>
            Pagos<input type="radio" name="pagamento" value="Pago">
            Pendente<input type="radio" name="pagamento" value="Pendente">
            </div>

            <div id="presencas">
            <h4>Presença: </h4>
            Todos<input type="radio" name="presenca" value="*" checked>
            Confirmados<input type="radio" name="presenca" value="Confirmado">
            Não Confirmados<input type="radio" name="presenca" value="NConfirmado">               
            </div>

            <button type="submit">Pesquisar</button>
        </form>
        <form action="logout.php">
            <button type="submit">LogOut</button>
        </form>
    </table>
</body>
</html>

<?php

    if(isset($_GET['nome'])){
        $nome = $_GET['nome'];

        if(isset($_GET['pagamento']) || isset($_GET['presenca'])){
            $pagamento = "";
            $presenca = "";

            if($_GET['pagamento'] == 'Pago'){
                $pagamento = 'Pago';
            }

            else if($_GET['pagamento'] == 'Pendente'){
                $pagamento = 'Pendente';
            }
            else if($_GET['pagamento'] == '*'){
                $pagamento = "*";
            }

            if($_GET['presenca'] == 'Confirmado'){
                $presenca = 'Confirmado';
            }
            else if($_GET['presenca'] == 'NConfirmado'){
                $presenca = 'Não Confirmado';
            }
            else{
                $presenca = "*";
            }
        }
            
        if($pagamento == '*' && $presenca == '*'){
            $sqlNome = "SELECT id, nome, turma, tipo_churrasco, confirmado, pago FROM participantes WHERE nome LIKE '%{$nome}%'";
                $resultadoNome = $con->query($sqlNome);

                echo "<table border='1'>";
                echo "<thead>
                    <tr>
                        <th>Nome</th>
                        <th>Turma</th>
                        <th>Tipo</th>
                        <th>Presença</th>
                        <th>Pagamento</th>
                        <th>Ações</th>
                    </tr>
                </thead>";
                echo "<tbody>";

                    while($usuario = $resultadoNome->fetch_assoc()){
                            echo "<tr>
                                <td> {$usuario['nome']}</td>
                                <td>{$usuario['turma']}</td>
                                <td>{$usuario['tipo_churrasco']}</td>
                                <td>{$usuario['confirmado']}</td>
                                <td>{$usuario['pago']}</td>
                                <td>
                                    <a href='editar.php?id={$usuario['id']}'>Editar</a> \ 
                                    <a href='excluir.php?id={$usuario['id']}' onclick=\"return confirm('Tem certeza que deseja excluir este participante?');\">Excluir</a>
                                </td>
                            </tr>";
                    }

                echo "</tbody>";
                echo "</table>";
        }

        else if($pagamento !== '*' && $presenca == '*'){
            $sqlNome = "SELECT id, nome, turma, tipo_churrasco, confirmado, pago FROM participantes WHERE nome LIKE '%{$nome}%' and pagamento = {$pagamento}";
                $resultadoNome = $con->query($sqlNome);

                echo "<table border='1'>";
                echo "<thead>
                    <tr>
                        <th>Nome</th>
                        <th>Turma</th>
                        <th>Tipo</th>
                        <th>Presença</th>
                        <th>Pagamento</th>
                        <th>Ações</th>
                    </tr>
                </thead>";
                echo "<tbody>";

                    while($usuario = $resultadoNome->fetch_assoc()){
                            echo "<tr>
                                <td> {$usuario['nome']}</td>
                                <td>{$usuario['turma']}</td>
                                <td>{$usuario['tipo_churrasco']}</td>
                                <td>{$usuario['confirmado']}</td>
                                <td>{$usuario['pago']}</td>
                                <td>
                                    <a href='editar.php?id={$usuario['id']}'>Editar</a> \ 
                                    <a href='excluir.php?id={$usuario['id']}' onclick=\"return confirm('Tem certeza que deseja excluir este participante?');\">Excluir</a>
                                </td>
                            </tr>";
                    }

                echo "</tbody>";
                echo "</table>";
        }

        else if($pagamento == '*' && $presenca !== '*'){
            $sqlNome = "SELECT id, nome, turma, tipo_churrasco, confirmado, pago FROM participantes WHERE nome LIKE '%{$nome}%' and presenca = {$presenca}";
                $resultadoNome = $con->query($sqlNome);

                echo "<table border='1'>";
                echo "<thead>
                    <tr>
                        <th>Nome</th>
                        <th>Turma</th>
                        <th>Tipo</th>
                        <th>Presença</th>
                        <th>Pagamento</th>
                        <th>Ações</th>
                    </tr>
                </thead>";
                echo "<tbody>";

                    while($usuario = $resultadoNome->fetch_assoc()){
                            echo "<tr>
                                <td> {$usuario['nome']}</td>
                                <td>{$usuario['turma']}</td>
                                <td>{$usuario['tipo_churrasco']}</td>
                                <td>{$usuario['confirmado']}</td>
                                <td>{$usuario['pago']}</td>
                                <td>
                                    <a href='editar.php?id={$usuario['id']}'>Editar</a> \ 
                                    <a href='excluir.php?id={$usuario['id']}' onclick=\"return confirm('Tem certeza que deseja excluir este participante?');\">Excluir</a>
                                </td>
                            </tr>";
                    }

                echo "</tbody>";
                echo "</table>";
        }

        else if($pagamento !== '*' && $presenca !== '*'){
            $sqlNome = "SELECT id, nome, turma, tipo_churrasco, confirmado, pago FROM participantes WHERE nome LIKE '%{$nome}%' and pagamento = {$pagamento} and presenca = {$presenca}";
                $resultadoNome = $con->query($sqlNome);

                echo "<table border='1'>";
                echo "<thead>
                    <tr>
                        <th>Nome</th>
                        <th>Turma</th>
                        <th>Tipo</th>
                        <th>Presença</th>
                        <th>Pagamento</th>
                        <th>Ações</th>
                    </tr>
                </thead>";
                echo "<tbody>";

                    while($usuario = $resultadoNome->fetch_assoc()){
                            echo "<tr>
                                <td> {$usuario['nome']}</td>
                                <td>{$usuario['turma']}</td>
                                <td>{$usuario['tipo_churrasco']}</td>
                                <td>{$usuario['confirmado']}</td>
                                <td>{$usuario['pago']}</td>
                                <td>
                                    <a href='editar.php?id={$usuario['id']}'>Editar</a> \ 
                                    <a href='excluir.php?id={$usuario['id']}' onclick=\"return confirm('Tem certeza que deseja excluir este participante?');\">Excluir</a>
                                </td>
                            </tr>";
                    }

                echo "</tbody>";
                echo "</table>";
        }
        
    }
    echo "<table border='1'>";
        echo "<thead>
            <tr>
                <th>Nome</th>
                <th>Turma</th>
                <th>Tipo</th>
                <th>Presença</th>
                <th>Pagamento</th>
                <th>Ações</th>
            </tr>
        </thead>";
        echo "<tbody>";

            while($usuario = $resultado->fetch_assoc()){
                $pago = "";
                $confirmado = "";

                if($usuario['pago'] == 1){
                    $pago = "Pago";
                }
                else {
                    $pago = "Pendente";
                }

                if($usuario['confirmado'] == 1){
                    $confirmado = "Confirmado";
                }
                else{
                    $confirmado = "Não Confirmado";
                }
                    echo "<tr>
                        <td> {$usuario['nome']}</td>
                        <td>{$usuario['turma']}</td>
                        <td>{$usuario['tipo_churrasco']}</td>
                        <td>{$confirmado}</td>
                        <td>{$pago}</td>
                        <td>
                            <a href='editar.php?id={$usuario['id']}'>Editar</a> \ 
                            <a href='excluir.php?id={$usuario['id']}' onclick=\"return confirm('Tem certeza que deseja excluir este participante?');\">Excluir</a>
                        </td>
                    </tr>";

            }

        echo "</tbody>";
        echo "</table>";
?>
