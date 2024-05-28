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
    <form id="login-box" action="includes/signup.php" method="POST">
        <h1 id="login-header">Tambah Murid</h1>
        <p>Nama Pengguna</p>
        <input>
        <p>Katalaluan</p>
        <input type="password" id="password" name="password" required>
        <a href="#">Lupa Nama Pengguna atau Katalaluan anda?</a>
        <button type="submit">TAMBAH</button>
        <?php
        if (isset($_SESSION["error"])) {
            $errors = $_SESSION["error"];
            if (isset($errors["not found"])) {
                echo "<p id='error'>" . $errors["not found"] . "</p>";
            }
        }
        ?>
    </form>
</body>

</html>