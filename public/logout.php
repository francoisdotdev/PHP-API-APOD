<?php

require_once '../vendor/autoload.php';

use App\Auth\Auth;

$auth = new Auth();
$auth->disconnect();
?>