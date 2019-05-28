<?php
include "../include/connect.php";
?>
<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="UTF-8">
    <title>Blog | Admin</title>
    <link href="../css/reset.css" rel="stylesheet">
    <link href="../css/css.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Barlow+Condensed:400,600" rel="stylesheet">
    <link rel="icon" type="image/png" href="img/tinyicon.png">
</head>
<body class="flex-column center">
    <section class="content flex-column center">
        <img class="m-t-10" src="../img/logo-black.png">
        <h2 class="m-20">Administration</h2>
            <form class="flex-column center w-100" action="tjek-login.php" method="post">
                <input class="p-10 m-tb-10" type="text" name="brugernavn" placeholder="Brugernavn" required></input>
                <input class="p-10" type="password" name="password" placeholder="Password" required></input>
                <div class="m-tb-10 w-50 flex-column right">
                    <input class="f-white bold" type="submit" value="Login"></input>
                </div>
            </form>
    </section>
</body>
</html>
