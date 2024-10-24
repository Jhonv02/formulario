<?php
include 'conexao.php';

// Listar clientes
$query = $conn->query("SELECT * FROM tb_clientes");
$clientes = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Clientes</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <h1>Cadastro de Clientes</h1>

    <form action="inserir.php" method="post">
        <label for="cpf_cliente">CPF:</label>
        <input type="text" name="cpf_cliente" required>
        <br>
        <label for="nome_cliente">Nome:</label>
        <input type="text" name="nome_cliente" required>
        <br>
        <label for="data_nascimento">Data de Nascimento:</label>
        <input type="date" name="data_nascimento" required>
        <br>
        <label for="celular_cliente">Celular:</label>
        <input type="text" name="celular_cliente" required>
        <br>
        <button type="submit">Cadastrar</button>
    </form>

    <h2>Lista de Clientes</h2>
    <table border="1">
        <tr>
            <th>CPF</th>
            <th>Nome</th>
            <th>Data de Nascimento</th>
            <th>Celular</th>
            <th>Ações</th>
        </tr>
        <?php foreach ($clientes as $cliente): ?>
        <tr>
            <td><?= $cliente['cpf_cliente'] ?></td>
            <td><?= $cliente['nome_cliente'] ?></td>
            <td><?= $cliente['data_nascimento'] ?></td>
            <td><?= $cliente['celular_cliente'] ?></td>
            <td>
                <a href="editar.php?cpf=<?= $cliente['cpf_cliente'] ?>">Editar</a>
                <a href="excluir.php?cpf=<?= $cliente['cpf_cliente'] ?>" onclick="return confirm('Deseja realmente excluir?');">Excluir</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
