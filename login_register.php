<?php

session_start();
require_once "config.php";

// Registration
if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];
    $password = password_hash($password1, PASSWORD_DEFAULT);
    $age = $_POST['age'];

    if ($password1 !== $password2) {
        $_SESSION['password_error'] = 'Passwörter stimmen nicht überein!';
        header("Location: pages/register.php");
        exit();
    }

    $checkEmail = $connection->query("SELECT email FROM users WHERE email = '$email'");
    if ($checkEmail->num_rows > 0) {
        $_SESSION['register_error'] = 'E-Mail ist bereits registriert!';
        header("Location: pages/register.php");
        exit();
    }

    $password = password_hash($password1, PASSWORD_DEFAULT);
    $connection->query("INSERT INTO users (name, email, password, age) VALUES ('$name', '$email', '$password', '$age')");
    $_SESSION['email'] = $email;
    $_SESSION['name'] = $name;
    header("Location: pages/register_success.php");
    exit();
}




// Login
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = $connection->query("SELECT * FROM users WHERE email = '$email'");
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['name'] = $user['name'];
            $_SESSION['email'] = $user['email'];
            header("Location: pages/login_success.php");
            exit();
        }
    }

    $_SESSION['login_error'] = 'Falsche E-Mail oder falsches Passwort!';
    header("Location: pages/login.php");
    exit();
}
?>