<?php 

require('../../config/database.php');

class User {
    function create($username, $email, $password, $created_at_str) {
        $connection = connectToDatabase();
        $sql = "INSERT INTO users (name, email, password, created_at) VALUES(?, ?, ?, ?)";
        $stmt = $connection->prepare($sql);
        $stmt->bindParam(1, $username);
        $stmt->bindParam(2, $email);
        $stmt->bindParam(3, $password);
        $stmt->bindParam(4, $created_at_str);
        $stmt->execute();
        return $stmt;
    }

    function login($email) {
        $connection = connectToDatabase();
        $sql = "SELECT email, password FROM users WHERE email = ?";
        $stmt = $connection->prepare($sql);
        $stmt->bindParam(1, $email);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        var_dump($result);
        return $result;
    }
}
