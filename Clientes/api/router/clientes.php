<?php

// Inclua o arquivo com a conexão com o banco de dados
require_once '/Applications/XAMPP/xamppfiles/htdocs/projects/Clientes/api/config/database.php';

// Inclua a classe Cliente
require_once '/Applications/XAMPP/xamppfiles/htdocs/projects/Clientes/api/models/cliente.php';

// Verificar o método da solicitação (GET, POST, PUT, DELETE)
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['id'])) {
        // Obter informações de um cliente específico
        $id = $_GET['id'];
        $clienteInfo = $cliente->getClienteId($id);
        echo json_encode($clienteInfo);
    } else {
        // Obter todos os clientes
        $allClientes = $cliente->getClientes();
        echo json_encode($allClientes);
    }

} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Criar um novo cliente
    $data = json_decode(file_get_contents('php://input'), true);
    $result = $cliente->createCliente($data);
    echo json_encode($result);

} elseif ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    // Atualizar um cliente existente
    $data = json_decode(file_get_contents('php://input'), true);
    $id = $_GET['id'];
    $result = $cliente->updateCliente($id, $data);
    echo json_encode($result);

} elseif ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    // Excluir um cliente
    $id = $_GET['id'];
    $result = $cliente->deleteCliente($id);
    echo json_encode($result);

} else {
    http_response_code(405); // Método não permitido
    echo json_encode(['message' => 'Método não permitido.']);
}