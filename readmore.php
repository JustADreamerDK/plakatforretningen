<?php
include "include/connect.php";
include "phpcode/crud.php";
$id = $_GET['id'];
$indlaeg = getIndlaegById($id);
$rowIndlaeg = mysqli_fetch_assoc($indlaeg);
$comments = getComments($id);
$checkComments = getComments($id);
?>

<!DOCTYPE html>
<html lang="da">
<head>
<meta charset="UTF-8">
<title>Plakatforretningen.dk | Blog</title>
<link href="css/reset.css" rel="stylesheet">
<link href="css/css.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Barlow+Condensed:400,600" rel="stylesheet">
<link rel="icon" type="image/png" href="img/tinyicon.png">
</head>
<body class="flex-column center">
<section class="content">
    <div class="card m-tb-20">
        <div class="b-brown p-10">
            <h2 class="f-white bold"><?php echo $rowIndlaeg['overskrift']; ?></h2>
        </div>
        <div class="flex between m-lr-10">
            <h3 class="m-tb-10 bold"><?php
            $kategori_id = $rowIndlaeg['kategori_id'];
            $kategori = getKategori($kategori_id);
            $rowKategori = mysqli_fetch_assoc($kategori);
            echo $rowKategori['kategori']; ?></h3>
            <h3 class="m-tb-10 bold"><?php $date = $rowIndlaeg['dato'];
            $dato = new DateTime("$date");
            echo $dato->format('d-m-Y');
            ?></h3>
        </div>
        <img class="image" src="img/5900.jpg">
        <p class="m-tb-10 m-lr-20 p-b-25"><?php echo $rowIndlaeg['tekst']; ?></p>
        </div>

        <div class="card m-tb-20">
            <h2 class="bold p-10 flex middle">Kommentarer</h2>
            <form  class="flex-column m-20" action="post-opret-bruger.php" method="post" class="flex-column">
                <input class="p-10 m-tb-10" type="text" name="name" placeholder="Navn"></input>
                <input class="p-10" type="text" name="mail" placeholder="Mail adresse"></input>
                <textarea rows="8" class="p-10 m-tb-10">Skriv din kommentar her</textarea>
                <div class="flex-column right">
                <input class="f-white bold" type="submit" value="Send"></input>
            </div>
            </form>

            <?php $test = mysqli_fetch_assoc($checkComments);
        $check = $test['navn'];
        if ($check <> ''){?>
            <?php while ($rowComments = mysqli_fetch_assoc($comments)) { ?>
            <div class="p-10">
                <div class="m-20">
                    <h3 class="b-brown p-10 f-white bold border brugernavn"><?php echo $rowComments['navn'] ?></h3>
                    <p class="p-10 border b-white comment"><?php echo $rowComments['tekst']; ?></p>
                </div>
            </div>
        <?php }}else{ ?>
            <div class="m-20">
                <h3 class="p-b-25 bold">Der er endnu ingen kommentarer til dette indlæg</h3>
            </div>
        <?php } ?>
        </div>
    </section>
</body>
</html>
