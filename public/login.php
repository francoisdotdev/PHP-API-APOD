<?php
require_once __DIR__ . '/../vendor/autoload.php';

use App\Auth\Auth;

$auth = new Auth();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if ($auth->login($email, $password)) {
        header("Location: index.php");
        exit;
    } else {
        exit("Invalid Email or Password.");
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>

<body>
    <h2>Login</h2>

    <form method="POST">
        <label>Email :</label><br>
        <input type="email" name="email" required><br><br>

        <label>Password :</label><br>
        <input type="password" name="password" required><br><br>

        <button type="submit">Login</button>
    </form>
</body>

</html>