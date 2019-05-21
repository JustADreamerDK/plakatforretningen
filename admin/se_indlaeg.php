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

            <h2>Alle indlæg</h2>

            <div class="flex between wrap m-tb-20">
                <?php
                $indlaeg = getIndlaeg();
                while ($row = mysqli_fetch_assoc($indlaeg)) {
                    ?>
                    <div class="card-admin">
                        <?php $billed = getPicture($row['id']);
                        $rowBilled = mysqli_fetch_assoc($billed);
                        $erDer = $rowBilled['fil_navn'];
                        if ($erDer <> ''){ ?>
                            <img class="image" src="../img/<?php echo $erDer; ?>" alt="<?php echo $rowBilled['navn']; ?>">
                        <?php }; ?>
                        <h2 class="flex-column center p-10"><?php echo $row['overskrift'] ?></h2>
                        <div class="flex between m-lr-10">
                            <h4 class="bold"><?php
                            $kategori_id = $row['kategori_id'];
                            $kategori = getKategori($kategori_id);
                            $rowKategori = mysqli_fetch_assoc($kategori);
                            echo $rowKategori['kategori']; ?></h4>
                            <h4 class="bold"><?php $date = $row['dato'];
                            $dato = new DateTime("$date");
                            echo $dato->format('d-m-Y');
                            ?></h4>
                        </div>
                        <p class="m-lr-10"><?php $beskrivelse = mb_substr($row['tekst'], 0, 75, 'UTF-8');
                        $tal = mb_strrpos($beskrivelse, ' ', 0, 'UTF-8');
                        $beskrivelse = mb_substr($row['tekst'], 0, $tal, 'UTF-8');
                        echo $beskrivelse . '...';?></p>
                        <div class="flex between p-10">
                            <a href="rediger_indlaeg.php?id=<?php echo $row['id'] ?>">
                                <h4 class="f-black back">
                                    Rediger
                                </h4>
                            </a>
                            <a href="slet_indlaeg.php?id=<?php echo $row['id'] ?>">
                                <h4 class="f-black back">
                                    Slet
                                </h4>
                            </a>
                        </div>
                        <?php if($erDer <> ''){ ?>
                        <div class="flex middle p-b-10">
                            <h4>
                                <a class="back" href="slet_billede.php?id=<?php echo $row['id']; ?>">
                                    Slet billede
                                </a>
                            </h4>
                        </div>
                    <?php }else{
                        ?>
                        <div class="flex middle p-b-10">
                            <h4>
                                <a class="back" href="tilfoej_billede.php?id=<?php echo$row ['id']; ?>">
                                    Tilføj billede
                                </a>
                            </h4>
                        </div>
                        <?php
                    } ?>
                    </div>
                    <?php
                }
                ?>
            </div>



        </div>
    </section>
</body>
</html>
