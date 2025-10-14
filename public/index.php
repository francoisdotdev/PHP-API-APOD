<?php

require __DIR__ . '/../vendor/autoload.php';
use App\Models\UserRepository;

use App\Auth\Auth;

Auth::requireLogin();

$repository = new UserRepository();
$users = $repository->getAll();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>USER CRUD</title>
</head>

<body>

    <h1>Users list</h1>

    <table border="1">
        <tr>
            <th>><a href="addUser.php">+ Add user</a></th>
        </tr>
    </table>


    <table border="1" cellpadding="8">
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>Profile Picture</th>
        </tr>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?= (string) $user['id'] ?></td>
                <td><?= $user['username'] ?></td>
                <td><?= $user['email'] ?></td>
                <td>
                    <?php if (!empty($user['media_object']) && file_exists(__DIR__ . '/uploads/' . $user['media_object'])): ?>
                        <img src="uploads/<?= rawurlencode($user['media_object']) ?>" alt=""
                            style="max-width:120px;max-height:80px;">
                    <?php else: ?>
                        &mdash;
                    <?php endif; ?>
                </td>
                <td>
                    <a href="editUser.php?id=<?= (int) $user['id'] ?>">Edit</a>
                    <a href="deleteUser.php?id=<?= (int) $user['id'] ?>"
                        onclick="return confirm('Delete this user ?')">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>