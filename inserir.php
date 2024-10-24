<?php
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cpf_cliente = $_POST['cpf_cliente'];
    $nome_cliente = $_POST['nome_cliente'];
    $data_nascimento = $_POST['data_nascimento'];
    $celular_cliente = $_POST['celular_cliente'];

    $stmt = $conn->prepare("INSERT INTO tb_clientes (cpf_cliente, nome_cliente, data_nascimento, celular_cliente) VALUES (?, ?, ?, ?)");
    $stmt->execute([$cpf_cliente, $nome_cliente, $data_nascimento, $celular_cliente]);

    header("Location: index.php");
}
?>