<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require('../models/User.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller = new UserController();

    if (!empty($_POST['fullname'])) {
        $controller->register();
    } else {
        $controller->login();
    }
}


class UserController {
    public function register() {
        $username = $_POST['fullname'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $created_at = new DateTime('now');
        $created_at_str = $created_at->format('Y-m-d H:i:s:SSS');

        $user = new User();
        $user->create($username, $email, $password, $created_at_str);

        $_SESSION['email'] = $email;
    }

    function login() {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $user = new User();
        $result = $user->login($email);

        if (password_verify($password, $result[0]['password'])) {
            header('Location: ../../views/tasks.php');
        }

        $_SESSION['email'] = $email;
    }

    function logout() {
        session_destroy();
    }
}