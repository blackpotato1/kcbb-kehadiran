<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="css/style.css" />
</head>

<body>
    <?php
    require_once 'header.php';
    ?>
    <form id="login-box" action="includes/login.php" method="POST">
        <h1 id="login-header">LOGIN</h1>
        <p>Nama Pengguna</p>
        <input>
        <p>Katalaluan</p>
        <input type="password" id="password" name="password" required>
        <a href="#">Lupa Nama Pengguna atau Katalaluan anda?</a>
        <button type="submit">LOGIN</button>
        <?php
        if (isset($_SESSION["error"])) {
            $errors = $_SESSION["error"];
            if (isset($errors["not found"])) {
                echo "<p id='error'>" . $errors["not found"] . "</p>";
            }
        }
        ?>
        <p id="asd">Tidak ada akaun?</p>
        <a href="#">Daftar sekarang hanya mengambil masa 2 minit</a>
    </form>
</body>

</html>