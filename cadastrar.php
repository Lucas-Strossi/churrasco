<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar</title>
</head>
<body>
    <form action="salvar.php" method="post">
        <input type="text" name="nome" placeholder="nome" required><br><br>
        <input type="text" name="turma" placeholder="turma"><br><br>
        <input type="text" name="telefone" placeholder="telefone"><br><br>
        <input type="text" name="churrasco" placeholder="tipo de churrasco"><br><br>
        <input type="text" name="acompanhamento" placeholder="acompanhamento"><br><br>
        
        <p>Presença confirmada:</p>
        <span>Não <input type="radio" name="presenca" value= "Não Confirmado"></span>
        <span>Sim <input type="radio" name="presenca" value="Confirmado"></span><br><br>
        
        <p>Pagamento realizado:</p>
        <span>Não <input type="radio" name="pagamento" value='Pendente'></span>
        <span>Sim <input type="radio" name="pagamento" value='Pago'></span><br><br>
        
        <button type="submit">cadastrar</button>
    </form>
</body>
</html>
