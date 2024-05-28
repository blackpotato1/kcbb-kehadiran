<?php

require_once 'session.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    require_once 'database.php';
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username AND password = :password");
    $stmt->execute(['username' => $username, 'password' => $password]);
    $user = $stmt->fetch();

    if ($user) {
        header("Location: analisis_kehadirna.php");

        // change this to your data base name
        // |
        // V
        $_SESSION["user"] = $user["username"];
        $_SESSION["role"] = $user["role"];
        die();
    } else {
        $errors = [];
        $errors["not found"] = "Username or password is incorrect. Please try again.";
        $_SESSION["error"] = $errors;
        header("Location: index.php");
        die();
    }
} else {
    $errors = [];
    $errors["not allowed"] = "weh 神金 ah?";
    $_SESSION["error"] = $errors;
    header("Location: index.php");
    die();
}
