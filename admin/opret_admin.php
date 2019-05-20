<?php
session_start();
include "../include/connect.php";
include "../phpcode/crud.php";
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

            <form  class="flex-column m-20 w-80" action="post_opret_admin.php" method="post" class="flex-column">
                <input class="p-10 m-tb-10" type="text" name="name" placeholder="Navn" required></input>
                <input class="p-10" type="text" name="mail" placeholder="Mail adresse" required></input>
                <input class="p-10 m-tb-10" type="text" name="brugernavn" placeholder="Brugernavn" required></input>
                <input class="p-10" type="password" name="password" placeholder="Password" required></input>
                <div class="flex-column right">
                    <input class="f-white bold" type="submit" value="Send"></input>
                </div>
            </form>

        </div>
    </section>
</body>
</html>
