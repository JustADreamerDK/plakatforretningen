<?php
include "include/connect.php";
include "phpcode/crud.php";
$id = $_GET['id'];
$indlaeg = getIndlaegById($id);
$rowIndlaeg = mysqli_fetch_assoc($indlaeg);
$comments = getComments($id);
$checkComments = getComments($id);
$comment = $_GET['comment'];
?>

<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="UTF-8">
    <title>Plakatforretningen.dk | Blog</title>
    <link href="css/reset.css" rel="stylesheet">
    <link href="css/css.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Barlow+Condensed:400,600" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="icon" type="image/png" href="img/tinyicon.png">
</head>
<body class="flex-column center">
    <?php include "include/header.php" ?>
    <section class="content">


        <div class="card m-tb-20">
            <?php
                $navn = $_POST['name'];
                $mail = $_POST['mail'];
                $dato = (new \DateTime())->format('Y-m-d');
                $tekst = $_POST['text'];
                $indlaeg_id = $_GET['id'];
                createComment($navn, $mail, $dato, $tekst, $indlaeg_id);
                header("location:readmore.php?id=$indlaeg_id");
                ?>
            </div>
        </section>
        <script src="javascript/script.js"></script>
    </body>
    </html>
