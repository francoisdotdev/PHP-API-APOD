<?php
require __DIR__ . '/../vendor/autoload.php';

use App\Models\UserRepository;

use App\Auth\Auth;

Auth::requireLogin();

$repository = new UserRepository();

$id = isset($_GET['id']) ? $_GET['id'] : (isset($_POST['id']) ? $_POST['id'] : 0);
if ($id <= 0) {
    http_response_code(400);
    exit("Invalid id");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($username === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        exit("Unvalid username or email");
    }

    $repository = $repository->update($id, $username, $email, $password !== '' ? $password : null, null);
    header('Location: index.php');
    exit("User updated");
}

$user = $repository->getUser($id);
if (!$user) {
    http_response_code(404);
    exit('User not found');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit user</title>
</head>

<body>
    <h1>Edit user #<?= $user['id'] ?></h1>
    <form method="POST">
        <input type="hidden" name="id" value="<?= $user['id'] ?>">
        Username: <input type="text" name="username" value="<?= $user['username'] ?>" required><br>
        Email: <input type="email" name="email" value="<?= $user['email'] ?>" required><br>
        Password: <input type="password" placeholder="leave blank to not change" name="password"><br>
        Image (leave blank to not change): <input type="file" name="media_object"><br>
        <button type="submit">Update</button>
    </form>

    <p><a href="index.php">Go Back</a></p>
</body>

</html>