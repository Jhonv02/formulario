<?php
$host = 'localhost'; 
$db   = 'bd_clinica';
$user = 'root'; 
$pass = ''; 

try {
    // Conecta ao banco de dados
    $conn = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Exibe mensagem de erro se a conexão falhar
    echo "Connection failed: " . $e->getMessage();
}
?>
