<?php
session_start();
include "../include/connect.php";
include "../phpcode/crud.php";
include "../phpcode/file-upload.php";
$indlaeg_id = $_GET['id'];
$billed = $_POST['image'];
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

            <h2>Tilføj billede</h2>
            <h3 class="p-10">Billedet er nu tilføjet</h3>

            <?php
     if (isset($_REQUEST['input'])) {
         $input = $_REQUEST['input'];
     }
     switch ($input) {
         case 'file-upload':
         $pathToFileFolder = '../img/';
         $sizes = [
             'large' => 1000,
         ];
         $uploadedFilePaths = uploadAndResizeImage($_FILES['image'], $pathToFileFolder, $sizes);
         $large = array_values($uploadedFilePaths)[0];
         $explode_large = explode("/", $large);
         $large_picture = $explode_large[2];
         createPicture("$indlaeg_id", "$large_picture");
         break;
     }

     ?>


        </div>
    </section>
</body>
</html>
