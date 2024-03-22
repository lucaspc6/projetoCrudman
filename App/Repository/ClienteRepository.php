<?php
namespace App\Repository;

use App\Database\Database;
use App\Model\Cliente;
use PDO;

class ClienteRepository {
    private $conn;

    public function __construct() {
        $this->conn = Database::getInstance();
    }

    public function criarCliente(Cliente $cliente)
    {
        $nome = $cliente->getNome();
        $email = $cliente->getEmail();
        $cidade = $cliente->getCidade();
        $estado = $cliente->getEstado();

        $query = "INSERT INTO clientes (nome, email, cidade, estado) VALUES (:nome, :email, :cidade, :estado)";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":nome", $nome);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":cidade", $cidade);
        $stmt->bindParam(":estado", $estado);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    public function lerTodos() {
        $query = "SELECT * FROM clientes";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function ler(Cliente $cliente) {
        $id = $cliente->getId();
        $query = "SELECT * FROM clientes WHERE cliente_id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id , PDO::PARAM_INT);
        $stmt->execute();
        
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function alterarCliente(Cliente $cliente)
    {
        $id = $cliente->getId();
        $nome = $cliente->getNome();
        $email = $cliente->getEmail();
        $cidade = $cliente->getCidade();
        $estado = $cliente->getEstado();

        $query = "UPDATE clientes SET nome = :nome, email = :email, cidade = :cidade, estado = :estado WHERE cliente_id = :id";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":nome", $nome);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":cidade", $cidade);
        $stmt->bindParam(":estado", $estado);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    public function deletarCliente($cliente_id)
    {
        $id = $cliente_id;
        $query = "DELETE FROM clientes WHERE cliente_id = :cliente_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":cliente_id", $id , PDO::PARAM_INT);
        
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }
}
