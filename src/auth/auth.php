<?php
namespace App\Auth;

use App\Config\Database;
use PDO;

class Auth
{
    private $conn;

    public function __construct()
    {
        $this->conn = (new Database())->getConnection();
        $this->startSession();
    }

    private function startSession(): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function login(string $email, string $password): bool
    {
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && $password === $user['password']) {
            $_SESSION['user'] = [
                'id' => $user['id'],
                'name' => $user['name'],
                'email' => $user['email']
            ];
            return true;
        }

        return false;
    }

    public function disconnect(): void
    {
        session_destroy();
        header("Location: login.php");
        exit;
    }

    public static function isLogged(): bool
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        return isset($_SESSION['user']);
    }

    public static function requireLogin(): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['user'])) {
            header("Location: login.php");
            exit;
        }
    }
}