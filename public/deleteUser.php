<?php
require __DIR__ . '/../vendor/autoload.php';

use App\Models\UserRepository;

if (!isset($_GET['id'])) {
    exit("User ID missing");
}

$id = $_GET['id'];

$repository = new UserRepository();
$repository->delete($id);

header('Location: index.php');
exit("User $id deleted");
?>