<?php
namespace App\Config;
use PDO, PDOException;

class Database
{
    private $host = '127.0.0.1';
    private $username = 'root';
    private $dbname = 'phpcrud';
    private $password = 'root';
    private $pdo;

    public function __construct()
    {
        try {
            $this->pdo = new PDO(
                "mysql:host=$this->host;dbname=$this->dbname;charset=utf8mb4",
                $this->username,
                $this->password,
                [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
            );
        } catch (PDOException $e) {
            echo "Problème de connexion ! <br>";
            die('Erreur DB : ' . $e->getMessage());
        }
    }

    public function getConnection(): PDO
    {
        return $this->pdo;
    }

}
?>