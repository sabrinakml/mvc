<?php
// controller/UserController.php
require_once('../model/User.php');

class UserController {
    private $userModel;

    public function __construct($conn) {
        $this->userModel = new User($conn);
    }

    public function index() {
        $users = $this->userModel->getAllUsers();
        include('../view/index.php');
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $this->userModel->createUser($name, $email);
            header('Location: index.php');
        } else {
            include('../view/create.php');
        }
    }

    public function update($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $this->userModel->updateUser($id, $name, $email);
            header('Location: index.php');
        } else {
            $user = $this->userModel->getUserById($id);
            include('../view/update.php');
        }
    }

    public function delete($id) {
        $this->userModel->deleteUser($id);
        header('Location: index.php');
    }
}
?>
