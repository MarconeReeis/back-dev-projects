<?php
class Cliente
{
    private $db;
    private $table = 'Clientes'; // Nome da tabela no banco de dados

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getClientes()
    {
        // Preparar a consulta SQL
        $query = 'SELECT * FROM ' . $this->table;
        $stmt = $this->db->prepare($query);

        // Executar a consulta
        if ($stmt->execute()) {
            $clientes = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $clientes;
        } else {
            return ['message' => 'Erro ao obter todos os clientes.'];
        }
    }

    public function getClienteId($id)
    {
        // Preparar a consulta SQL
        $query = 'SELECT * FROM ' . $this->table . ' WHERE id = :id';
        $stmt = $this->db->prepare($query);

        //Bind do valor ID
        $stmt->bindParam(':id', $id);

        //Executar a consulta
        if ($stmt->execute()) {
            $cliente = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($cliente) {
                return $cliente;
            } else {
                return ['message' => 'Cliente não encontrado.'];
            }
        }
    }

    public function createCliente($data)
    {
        // Verificar se todos os campos obrigatórios foram fornecidos
        if (
            !isset($data['nome']) ||
            !isset($data['idade']) ||
            !isset($data['email']) ||
            !isset($data['cidade'])
        ) {
            return ['message' => 'Por favor, forneça todos os campos obrigatórios.'];
        }

        // Preparar a consulta SQL
        $query = 'INSERT INTO ' . $this->table . ' (nome, idade, email, cidade) VALUES (:nome, :idade, :email, :cidade)';
        $stmt = $this->db->prepare($query);

        // Bind dos valores fornecidos
        $stmt->bindParam(':nome', $data['nome']);
        $stmt->bindParam(':idade', $data['idade']);
        $stmt->bindParam(':email', $data['email']);
        $stmt->bindParam(':cidade', $data['cidade']);

        // Executar a consulta
        if ($stmt->execute()) {
            return ['message' => 'Cliente criado com sucesso.'];
        } else {
            return ['message' => 'Erro ao criar cliente.'];
        }
    }

    public function updateCliente($id, $data)
    {
        // Verificar se todos os campos obrigatórios foram fornecidos
        if (
            !isset($data['nome']) ||
            !isset($data['idade']) ||
            !isset($data['email']) ||
            !isset($data['cidade'])
        ) {
            return ['message' => 'Por favor, forneça todos os campos obrigatórios.'];
        }

        // Preparar a consulta SQL
        $query = 'UPDATE ' . $this->table . ' SET nome = :nome, idade = :idade, email = :email, cidade = :cidade WHERE id = :id';
        $stmt = $this->db->prepare($query);

        // Bind dos valores fornecidos
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nome', $data['nome']);
        $stmt->bindParam(':idade', $data['idade']);
        $stmt->bindParam(':email', $data['email']);
        $stmt->bindParam(':cidade', $data['cidade']);

        // Executar a consulta
        if ($stmt->execute()) {
            return ['message' => 'Cliente atualizado com sucesso.'];
        } else {
            return ['message' => 'Erro ao atualizar cliente.'];
        }
    }

    public function deleteCliente($id)
    {
        // Preparar a consulta SQL
        $query = 'DELETE FROM ' . $this->table . ' WHERE id = :id';
        $stmt = $this->db->prepare($query);

        // Bind do valor do ID
        $stmt->bindParam(':id', $id);

        // Executar a consulta
        if ($stmt->execute()) {
            return ['message' => 'Cliente excluído com sucesso.'];
        } else {
            return ['message' => 'Erro ao excluir cliente.'];
        }
    }
}
