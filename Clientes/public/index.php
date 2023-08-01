<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Inclua o arquivo com a conexão com o banco de dados
require_once '/Applications/XAMPP/xamppfiles/htdocs/projects/Clientes/api/config/database.php';

// Inclua a classe Cliente
require_once '/Applications/XAMPP/xamppfiles/htdocs/projects/Clientes/api/models/cliente.php';

// Criar uma instância do Cliente passando a conexão do banco de dados
$cliente = new Cliente($db);

// Verificar o método da solicitação (GET, POST, PUT, DELETE) e incluir o arquivo de roteamento apropriado
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Rotear para o arquivo de roteamento para clientes
    include '/Applications/XAMPP/xamppfiles/htdocs/projects/Clientes/api/router/clientes.php';
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Rotear para o arquivo de roteamento para clientes
    include '/Applications/XAMPP/xamppfiles/htdocs/projects/Clientes/api/router/clientes.php';
} elseif ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    // Rotear para o arquivo de roteamento para clientes
    include '/Applications/XAMPP/xamppfiles/htdocs/projects/Clientes/api/router/clientes.php';
} elseif ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    // Rotear para o arquivo de roteamento para clientes
    include '/Applications/XAMPP/xamppfiles/htdocs/projects/Clientes/api/router/clientes.php';
} else {
    http_response_code(405); // Método não permitido
    echo json_encode(['message' => 'Método não permitido.']);
}

/*
// Criar um array com os dados de teste para inserção
$data = [
    'nome' => 'Marcon Reis',
    'idade' => '23',
    'email' => 'marcone@email.com',
    'cidade' => 'São Paulo'
];

// Chamar a função createCliente($data)
$resultado = $cliente->createCliente($data);

// Imprimir o resultado (apenas para fins de teste)
echo json_encode($resultado);
*/
