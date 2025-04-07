<?php
$host = 'localhost';
$dbname = 'lumi';
$user = 'root';
$pass = '';

// Conexão com mysqli (usada no carrossel, com $conn)
$conn = new mysqli($host, $user, $pass, $dbname);

// Verifica a conexão mysqli
if ($conn->connect_error) {
    die("Conexão MySQLi falhou: " . $conn->connect_error);
}

// Conexão com PDO (opcional, para quem quiser usar)
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Conexão PDO falhou: ' . $e->getMessage());
}
?>
