<?php
session_start();
include "../include/connect.php";
include "../phpcode/crud.php";
$id = $_GET['id'];
$indlaeg = getIndlaegById($id);
$row = mysqli_fetch_assoc($indlaeg);
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

            <h2>Slet indlæg</h2>

            <h3 class="p-10">Er du sikker på at du vil slette følgende indlæg?</h3>

            <h3><?php echo $row['overskrift'] ?></h3>
            <h4 class="m-tb-10">I kategorien <?php
            $kategori_id = $row['kategori_id'];
            $kategori = getKategori($kategori_id);
            $rowKategori = mysqli_fetch_assoc($kategori);
            echo $rowKategori['kategori']; ?> skrevet d.
            <?php $date = $row['dato'];
            $dato = new DateTime("$date");
            echo $dato->format('d-m-Y');
            ?></h4>
            <?php $billed = getPicture($row['id']);
            $rowBilled = mysqli_fetch_assoc($billed);
            $erDer = $rowBilled['fil_navn'];
            if ($erDer <> ''){ ?>
                <img class="image m-tb-10" src="../img/<?php echo $erDer; ?>" alt="<?php echo $rowBilled['navn']; ?>">
            <?php }; ?>
            <h4>
                <?php echo $row['tekst']?>
            </h4>
            <div class="flex between w-50 m-tb-10">
                <h4><a class="back" href="post_slet_indlaeg.php?id=<?php echo $row['id']; ?>">Ja</a></h4>
                <h4><a class="back" href="se_indlaeg.php">Nej</a></h4>
            </div>
        </div>
    </section>
</body>
</html>
