<?php
namespace App\Models;

use App\Config\Database;
use PDO;

class UserRepository
{
    private PDO $conn;
    private string $table = 'users';

    public function __construct()
    {
        $db = new Database();
        $this->conn = $db->getConnection();
    }


    public function getAll(): array
    {
        $stmt = $this->conn->query("SELECT * FROM {$this->table} ORDER BY id ASC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getUser(int $id): array
    {
        $stmt = $this->conn->prepare("SELECT *  FROM {$this->table} WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create(string $username, string $email, string $password, string $media_object): bool
    {
        $stmt = $this->conn->prepare("INSERT INTO {$this->table} (username, email, password, media_object) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$username, $email, $password, $media_object]);
    }

    public function update(int $id, string $username, string $email, string $password, string $media_object): bool
    {
        $stmt = $this->conn->prepare("UPDATE {$this->table} SET username = ?, email = ?, password = ?, media_object = ? WHERE id = ?");
        return $stmt->execute([$username, $email, $password, $media_object, $id]);
    }

    public function delete(int $id): bool
    {
        $stmt = $this->conn->prepare("DELETE FROM {$this->table} WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
?>