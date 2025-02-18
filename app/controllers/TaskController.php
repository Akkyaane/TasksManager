<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require('../models/Task.php');

class TaskController {
    public function display() {
        $email = $_SESSION['email'];

        $task = new Task();
        $result = $task->display($email);

        return $result;
    }

    function create() {
    }

    function update($task_id) {
    }

    function delete($task_id) {
    }
}