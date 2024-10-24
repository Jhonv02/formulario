<?php
include 'conexao.php';

if (isset($_GET['cpf'])) {
    $cpf_cliente = $_GET['cpf'];
    $stmt = $conn->prepare("SELECT * FROM tb_clientes WHERE cpf_cliente = ?");
    $stmt->execute([$cpf_cliente]);
    $cliente = $stmt->fetch(PDO::FETCH_ASSOC);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cpf_cliente = $_POST['cpf_cliente'];
    $nome_cliente = $_POST['nome_cliente'];
    $data_nascimento = $_POST['data_nascimento'];
    $celular_cliente = $_POST['celular_cliente'];

    $stmt = $conn->prepare("UPDATE tb_clientes SET nome_cliente = ?, data_nascimento = ?, celular_cliente = ? WHERE cpf_cliente = ?");
    $stmt->execute([$nome_cliente, $data_nascimento, $celular_cliente, $cpf_cliente]);

    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Cliente</title>
</head>
<body>
    <h1>Editar Cliente</h1>

    <form action="editar.php" method="post">
        <input type="hidden" name="cpf_cliente" value="<?= $cliente['cpf_cliente'] ?>">
        <label for="nome_cliente">Nome:</label>
        <input type="text" name="nome_cliente" value="<?= $cliente['nome_cliente'] ?>" required>
        <br>
        <label for="data_nascimento">Data de Nascimento:</label>
        <input type="date" name="data_nascimento" value="<?= $cliente['data_nascimento'] ?>" required>
        <br>
        <label for="celular_cliente">Celular:</label>
        <input type="text" name="celular_cliente" value="<?= $cliente['celular_cliente'] ?>" required>
        <br>
        <button type="submit">Salvar</button>
    </form>
</body>
</html>
