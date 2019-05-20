<?php
session_start();
include "../include/connect.php";
include "../phpcode/crud.php";
$navn = $_POST['name'];
$email = $_POST['mail'];
$brugernavn = $_POST['brugernavn'];
$password = $_POST['password'];
createAdmin($navn, $email, $brugernavn, $password);
?>
<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="UTF-8">
    <title>Blog | Admin</title>
    <link href="../css/reset.css" rel="stylesheet">
    <link href="../css/css.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Barlow+Condensed:400,600" rel="stylesheet">
    <link rel="icon" type="image/png" href="../img/tinyicon.png">
</head>
<body class="flex-column center">
    <section class="content flex">
        <?php include "menu.php"; ?>
        <div class="admin-content p-10 m-tb-20 flex-column center">

            <h2>Opret admin</h2>
            <h3 class="p-10">Administratoren er nu oprettet</h3>

        </div>
    </section>
</body>
</html>
