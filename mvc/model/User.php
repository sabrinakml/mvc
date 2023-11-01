<?php
// model/User.php
class User {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function getAllUsers() {
        $query = "SELECT * FROM users";
        $result = $this->conn->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getUserById($id) {
        $query = "SELECT * FROM users WHERE id = $id";
        $result = $this->conn->query($query);
        return $result->fetch_assoc();
    }

    public function createUser($name, $email) {
        $query = "INSERT INTO users (name, email) VALUES ('$name', '$email')";
        return $this->conn->query($query);
    }

    public function updateUser($id, $name, $email) {
        $query = "UPDATE users SET name = '$name', email = '$email' WHERE id = $id";
        return $this->conn->query($query);
    }

    public function deleteUser($id) {
        $query = "DELETE FROM users WHERE id = $id";
        return $this->conn->query($query);
    }
}
?>
