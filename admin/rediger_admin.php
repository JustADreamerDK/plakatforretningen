<?php
session_start();
include "../include/connect.php";
include "../phpcode/crud.php";
$id = $_GET['id'];
$admin = getAdminById($id);
$rowAdmin = mysqli_fetch_assoc($admin);
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

            <h2>Rediger admin</h2>

            <form  class="flex-column m-20 w-80" action="post_update_admin.php?id=<?php echo $id; ?>" method="post" class="flex-column">
                <input class="p-10 m-tb-10" type="text" name="name" placeholder="Navn" value="<?php echo $rowAdmin['navn']; ?>" required></input>
                <input class="p-10" type="text" name="mail" placeholder="Mail adresse" value="<?php echo $rowAdmin['email']; ?>" required></input>
                <input class="p-10 m-tb-10" type="text" name="brugernavn" placeholder="Brugernavn" value="<?php echo $rowAdmin['brugernavn']; ?>" required></input>
                <input class="p-10" type="password" name="password" placeholder="Password" value="<?php echo $rowAdmin['password']; ?>" required></input>
                <div class="flex-column right">
                    <input class="f-white bold" type="submit" value="Opdater"></input>
                </div>
            </form>

        </div>
    </section>
</body>
</html>
