<?php

require_once 'session.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    require_once 'database.php';
    $stmt = $pdo->prepare("INSERT INTO users (username, password, email) VALUES (:username, :password, :email)");
    $stmt->execute(['username' => $username, 'password' => $password, 'email' => $email]);
} else {
    $errors = [];
    $errors["not allowed"] = "weh 神金 ah?";
    $_SESSION["error"] = $errors;
    header("Location: index.php");
    die();
}
