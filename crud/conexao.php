<?php
$host = 'localhost';
$user = 'root';
$password = 'senha_da_nasa';
$dbname = 'trab_ids';

// Criar conexão
$conn = new mysqli('nome_do_host', 'usuario', 'senha', 'nome_do_banco');

// Checar conexão
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
