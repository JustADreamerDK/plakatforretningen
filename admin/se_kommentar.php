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

            <h2>Alle kommentarer</h2>

                            <table class="w-80 m-tb-20">
                                <tr>
                                    <th class="p-10 bold"><h4>Navn</h4></th>
                                    <th class="p-10 bold"><h4>Email</h4></th>
                                    <th class="p-10 bold"><h4>Dato</h4></th>
                                    <th class="p-10 bold"><h4>Tekst</h4></th>
                                    <th></th>
                                </tr>

                                <ul class="margin-t-20">
                                    <?php
                                    $comments = getAllComments();
                                    $i = 0;
                                    while ($row = mysqli_fetch_assoc($comments)) {
                                        ?>
                                        <tr>
                                            <td class="p-10 dato"><h4><?php echo $row['navn'] ?></h4></td>
                                            <td class="p-10"><h4><?php echo $row['mail'] ?></h4></td>
                                            <td class="p-10 dato"><h4><?php $date = $row['dato'];
                                            $dato = new DateTime("$date");
                                            echo $dato->format('d-m-Y');
                                            ?></h4></td>
                                            <td class="p-10"><h4><?php $beskrivelse = mb_substr($row['tekst'], 0, 100, 'UTF-8');
                                            $tal = mb_strrpos($beskrivelse, ' ', 0, 'UTF-8');
                                            $beskrivelse = mb_substr($row['tekst'], 0, $tal, 'UTF-8');
                                            echo $beskrivelse . '...';?></h4></td>
                                            <td class="p-10">
                                                <a href="slet_kommentar.php?id=<?php echo $row['id'] ?>">
                                                    <h4 class="f-black back">
                                                        Slet
                                                    </h4>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                            </table>

        </div>
    </section>
</body>
</html>
