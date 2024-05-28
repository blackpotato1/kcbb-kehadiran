<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="css/header.css" />
</head>

<body>

    <div id="navbar">
        <div id="title">
            <p id="name">Kehadiran Cemerlang Bintang Bersinar</p>
        </div>
        <?php require_once 'session.php';
        if (isset($_SESSION["user"]) && $_SESSION["role"] == "admin") {
            echo '<div id="links">
            <a href="#">Analisis Kehadiran</a>
            <a href="#"><select name="kelas" id="kelas">
                    <option value="kelas">Kelas</option>
                    <!-- Add more options as needed -->
                </select></a>
            <a href="#">Logout</a>
            <a href="#">Liew Xian Yang</a>
        </div>';
        }
        ?>
    </div>
</body>

</html>