<?php

require_once('../../config/database.php');

class Task {
    function display($email) {
        $connection = connect();
        $sql = "SELECT * FROM tasks t INNER JOIN users u ON u.id = t.user_id WHERE email = ?";
        $stmt = $connection->prepare($sql);
        $stmt->bindParam(1, $email);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function create() {
    }

    function update($task_id) {
    }

    function delete($task_id) {
    }
}
