<?php
require __DIR__ . '/../vendor/autoload.php';

use App\Models\User;

use App\Models\UserRepository;

use App\Auth\Auth;

Auth::requireLogin();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    $media_object = '';
    if (isset($_FILES['media_object']) && $_FILES['media_object']['error'] !== UPLOAD_ERR_NO_FILE) {
        $uploadDir = __DIR__ . '/uploads';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        if (move_uploaded_file($tmp, $target)) {
            $media_object = $targetName;
        } else {
            $media_object = '';
        }

        $tmp = $_FILES['media_object']['tmp_name'];
        $name = basename($_FILES['media_object']['name']);
        $targetName = time() . '_' . $name;
        $target = $uploadDir . '/' . $targetName;

        if (move_uploaded_file($tmp, $target)) {
            $media_object = $targetName;
        } else {
            $media_object = '';
        }
    }

    $user = new User($username, $email, $password, $media_object);

    $repository = new UserRepository();

    $repository->create(
        $user->getUsername(),
        $user->getEmail(),
        $user->getPassword(),
        $user->getMedia()
    );

    header('Location: index.php');
    exit;
}
?>

<h1>Add user</h1>
<form method="POST" enctype="multipart/form-data">
    Username: <input type="text" name="username" required><br>
    Email: <input type="email" name="email" required><br>
    Password: <input type="password" name="password" required><br>
    Image: <input type="file" name="media_object"><br>
    <button type="submit">Add</button>
</form>