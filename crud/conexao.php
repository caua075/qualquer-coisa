<?php
$host = 'db';
$user = 'root';
$password = 'C@!232104';
$dbname = 'mysql';

// Criar conexão
$conn = new mysqli($host, $user, $password, $dbname);

// Checar conexão
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
