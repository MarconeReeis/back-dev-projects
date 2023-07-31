<?php

// Configurações do banco de dados
$host = 'localhost';     // Endereço do banco de dados (normalmente, 'localhost')
$dbname = 'Cliente'; // Nome do banco de dados
$username = 'root'; // Nome de usuário do banco de dados
$password = ''; // Senha do banco de dados

// Conexão com o banco de dados usando PDO
try {
    $db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo 'DB Con Sucesso !';
} catch (PDOException $e) {
    die("Erro ao concetar DB: " . $e->getMessage());
}
