<?php

use PDO;
use PDOException;
use Dotenv\Dotenv;

class Database
{
    private $host;
    private $port;
    private $db_name;
    private $username;
    private $password;
    private $ssl_mode;
    private $connection;

    public function __construct()
    {

        $dotenv = Dotenv::createImmutable(dirname(__DIR__, 2));
        $dotenv->load();

        $this->host = $_ENV['DB_HOST'];
        $this->port = $_ENV['DB_PORT'];
        $this->db_name = $_ENV['DB_NAME'];
        $this->username = $_ENV['DB_USERNAME'];
        $this->password = $_ENV['DB_PASSWORD'];
        $this->ssl_mode = $_ENV['DB_SSL_MODE'] ?? 'require';
    }

    public function getConnection(): ?PDO
    {

        $this->connection = null;

        try {

            $url = "mysql:host={$this->host};port={$this->port};dbname={$this->db_name};sslmode={$this->ssl_mode}";

            $this->connection = new PDO(
                $url,
                $this->username,
                $this->password
            );

            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->connection->setAttribute(PDO::ATTR_EMULATE_PREPARES, true);

        } catch (PDOException $e) {

            echo "Connection error: " . $e->getMessage();

        }

        return $this->connection;
    }
}