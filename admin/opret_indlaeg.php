<?php
session_start();
include "../include/connect.php";
include "../phpcode/crud.php";
$kategori = getAllKategori();
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

            <h2>Opret indlæg</h2>

            <form  class="flex-column m-20 w-80" action="post_opret_indlaeg.php" method="post" class="flex-column">
                <label class="fileContainer">
                    <input id="file-upload" type="file" name="image" required>
                    <input type="hidden" name="input" value="file-upload" required>
                </label>
                <input class="p-10 m-tb-10" type="text" name="overskrift" placeholder="Overskrift" required></input>
                <input class="p-10" type="date" name="dato" required></input>
                <select class="p-10 m-tb-10" name="kategori">
                    <?php while ($rowKategori = mysqli_fetch_assoc($kategori)) {
                        ?>
                        <option value="<?php echo $rowKategori['id'] ?>"><?php echo $rowKategori['kategori']; ?></option>
                    <?php } ?>
                </select>
                <textarea rows="8" class="p-10" name="text">Skriv dit indlæg her</textarea>
                <div class="flex-column right m-tb-10">
                    <input class="f-white bold" type="submit" value="Send"></input>
                </div>
            </form>

        </div>
    </section>
</body>
</html>
