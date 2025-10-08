<?php
class Database
{
    private $host = 'localhost';
    private $username = 'root';
    private $dbname = 'usersdb';
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
            echo "Connexion réussie ! <br>";
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
//$pdo = new Database();

?>