<?php
include 'conexao.php';

if (isset($_GET['cpf'])) {
    $cpf_cliente = $_GET['cpf'];

    $stmt = $conn->prepare("DELETE FROM tb_clientes WHERE cpf_cliente = ?");
    $stmt->execute([$cpf_cliente]);

    header("Location: index.php");
}
?>
