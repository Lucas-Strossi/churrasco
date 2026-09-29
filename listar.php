<?php
require_once 'conexao.php';

$sql = "SELECT nome, turma, tipo_churrasco, confirmado, pago FROM participantes";
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
                    <td><a href='editar.php'>Editar</a> \ <a href='excluir.php'>Excluir</a></td>
                </tr>";
            }
        ?>
        </tbody>
        <br>  
    </table>
    <form action="" method="get">
            <input type="text" placeholder="Pesquise um nome" name="nome" required> <br>
            <h4>Pagamentos: </h4>
            Todos<input type="radio" name="pagamento" value="*" checked> <br>
            Pagos<input type="radio" name="pagamento" value="Pago"> <br>
            Pendente<input type="radio" name="pagamento" value="Pendente"> <br>
            <br>
            <h4>Presença: </h4>
            Todos<input type="radio" name="presenca" value="*" checked> <br>
            Confirmados<input type="radio" name="presenca" value="Confirmado"> <br>
            Não Confirmados<input type="radio" name="presenca" value="NConfirmado"> <br>
            <br>
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
            $sqlNome = "SELECT nome, turma, tipo_churrasco, confirmado, pago FROM participantes WHERE nome LIKE '%{$nome}%'";
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
                                <td><a href='editar.php'>Editar</a> \ <a href='excluir.php'>Excluir</a></td>
                            </tr>";
                    }

                echo "</tbody>";
                echo "</table>";
        }

        else if($pagamento !== '*' && $presenca == '*'){
            $sqlNome = "SELECT nome, turma, tipo_churrasco, confirmado, pago FROM participantes WHERE nome LIKE '%{$nome}%' and pagamento = {$pagamento}";
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
                                <td><a href='editar.php'>Editar</a> \ <a href='excluir.php'>Excluir</a></td>
                            </tr>";
                    }

                echo "</tbody>";
                echo "</table>";
        }

        else if($pagamento == '*' && $presenca !== '*'){
            $sqlNome = "SELECT nome, turma, tipo_churrasco, confirmado, pago FROM participantes WHERE nome LIKE '%{$nome}%' and presenca = {$presenca}";
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
                                <td><a href='editar.php'>Editar</a> \ <a href='excluir.php'>Excluir</a></td>
                            </tr>";
                    }

                echo "</tbody>";
                echo "</table>";
        }

        else if($pagamento !== '*' && $presenca !== '*'){
            $sqlNome = "SELECT nome, turma, tipo_churrasco, confirmado, pago FROM participantes WHERE nome LIKE '%{$nome}%' and pagamento = {$pagamento} and presenca = {$presenca}";
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
                                <td><a href='editar.php'>Editar</a> \ <a href='excluir.php'>Excluir</a></td>
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
                    echo "<tr>
                        <td> {$usuario['nome']}</td>
                        <td>{$usuario['turma']}</td>
                        <td>{$usuario['tipo_churrasco']}</td>
                        <td>{$usuario['confirmado']}</td>
                        <td>{$usuario['pago']}</td>
                        <td><a href='editar.php'>Editar</a> \ <a href='excluir.php'>Excluir</a></td>
                    </tr>";
            }

        echo "</tbody>";
        echo "</table>";
?>
