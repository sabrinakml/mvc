<?php
// view/index.php
require_once('../controller/UserController.php');

$userController = new UserController($conn);
$users = $userController->index();
?>

<!-- Tampilkan data user di sini -->
