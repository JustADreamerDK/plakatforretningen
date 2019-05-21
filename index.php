<?php
include "include/connect.php";
include "phpcode/crud.php";
$kat = $_GET['id'];
$soeg = $_POST['soeg'];
if ($soeg <> ''){
    $indlaeg = getSearch($soeg);
    $kat == '';
}
if ($kat <> ''){
    $indlaeg = getIndlaegByKat($kat);
}
if($kat == '' && $soeg == ''){
$indlaeg = getIndlaeg();
}
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
        <?php while ($rowIndlaeg = mysqli_fetch_assoc($indlaeg)) {
            ?>
            <div class="card m-tb-20">
                <div class="b-brown p-10">
                    <h2 class="f-white bold m-lr-10"><?php echo $rowIndlaeg['overskrift']; ?></h2>
                </div>
                <div class="flex between m-lr-20">
                    <h3 class="m-tb-10 bold">
                        <?php
                        $kategori_id = $rowIndlaeg['kategori_id'];
                        $kategori = getKategori($kategori_id);
                        $rowKategori = mysqli_fetch_assoc($kategori);
                        echo $rowKategori['kategori']; ?>
                    </h3>
                    <h3 class="m-tb-10 bold"><?php $date = $rowIndlaeg['dato'];
                    $dato = new DateTime("$date");
                    echo $dato->format('d-m-Y');
                    ?></h3>
                </div>
                <?php $billed = getPicture($rowIndlaeg['id']);
                $rowBilled = mysqli_fetch_assoc($billed);
                $erDer = $rowBilled['fil_navn'];
                if ($erDer <> ''){ ?>
                    <img class="image" src="img/<?php echo $erDer; ?>">
                <?php }; ?>
                <?php $beskrivelse = mb_substr($rowIndlaeg['tekst'], 0, 500, 'UTF-8');
                $tal = mb_strrpos($beskrivelse, ' ', 0, 'UTF-8');
                $beskrivelse = mb_substr($rowIndlaeg['tekst'], 0, $tal, 'UTF-8'); ?>
                <p class="m-tb-10 m-lr-20"><?php echo $beskrivelse . '...' ?> </p>
                <a class="f-white flex-column right" href="readmore.php?id=<?php echo $rowIndlaeg['id']; ?>">
                    <h3 class="knap">
                        Læs mere
                    </h3>
                </a>
            </div>
            <?php
        }
        ?>
    </section>
    <script src="javascript/script.js"></script>
</body>
</html>
