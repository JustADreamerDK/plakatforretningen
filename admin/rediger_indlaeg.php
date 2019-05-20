<?php
session_start();
include "../include/connect.php";
include "../phpcode/crud.php";
include "../phpcode/file-upload.php";
$id = $_GET['id'];
$indlaeg = getIndlaegById($id);
$rowIndlaeg = mysqli_fetch_assoc($indlaeg);
$kategori = getAllKategori();
$kategori_id = $rowIndlaeg['kategori_id'];
$katogorien = getKategori($kategori_id);
$rowKategorien = mysqli_fetch_assoc($katogorien);
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
            <form  class="flex-column m-20 w-80" action="post_update_indlaeg.php?id=<?php echo $id; ?>" method="post" class="flex-column">
                <input class="p-10 m-tb-10" type="text" name="overskrift" placeholder="Overskrift" value="<?php echo $rowIndlaeg['overskrift']; ?>" required></input>
                <input class="p-10" type="date" name="dato" value="<?php echo $rowIndlaeg['dato']; ?>" required></input>
                <select class="p-10 m-tb-10" name="kategori">
                    <option value="<?php echo $rowIndlaeg['kategori_id'] ?>"><?php echo $rowKategorien['kategori']; ?></option>
                    <?php while ($rowKategori = mysqli_fetch_assoc($kategori)) {
                        ?>
                        <option value="<?php echo $rowKategori['id'] ?>"><?php echo $rowKategori['kategori']; ?></option>
                    <?php } ?>
                </select>
                <textarea rows="8" class="p-10" name="text"><?php echo $rowIndlaeg['tekst']; ?></textarea>
                <div class="flex-column right m-tb-10">
                    <input class="f-white bold" type="submit" value="Opdater"></input>
                </div>
            </form>

        </div>
    </section>
</body>
</html>
