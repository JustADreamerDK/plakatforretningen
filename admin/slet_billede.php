<?php
session_start();
include "../include/connect.php";
include "../phpcode/crud.php";
$id = $_GET['id'];
$picture = getPicture($id);
$row = mysqli_fetch_assoc($picture);
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

            <h2>Slet billede</h2>
            <h3 class="p-10">Er du sikker på at du vil slette dette billede?</h3>

            <img class="image" src="../img/<?php echo $row['fil_navn']?>">

            <div class="flex between w-50 m-tb-10">
                <h4><a class="back" href="post_slet_billede.php?id=<?php echo $row['id']; ?>">Ja</a></h4>
                <h4><a class="back" href="se_indlaeg.php">Nej</a></h4>
            </div>

        </div>
    </section>
</body>
</html>
