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

            <h2>Alle administratorerne</h2>

                            <table class="w-80 m-tb-20">
                                <tr>
                                    <th class="p-10 bold"><h4>Navn</h4></th>
                                    <th class="p-10 bold"><h4>Email</h4></th>
                                    <th class="p-10 bold"><h4>Brugernavn</h4></th>
                                    <th class="p-10 bold"><h4>Kodeord</h4></th>
                                    <th></th>
                                    <th></th>
                                </tr>

                                <ul class="margin-t-20">
                                    <?php
                                    $admin = getAllAdmins();
                                    $i = 0;
                                    while ($row = mysqli_fetch_assoc($admin)) {
                                        ?>
                                        <tr>
                                            <td class="p-10 dato"><h4><?php echo $row['navn'] ?></h4></td>
                                            <td class="p-10"><h4><?php echo $row['email'] ?></h4></td>
                                            <td class="p-10"><h4><?php echo $row['brugernavn'] ?></h4></td>
                                            <td class="p-10"><h4><?php echo $row['password'] ?></h4></td>
                                            <td class="p-10">
                                                <a href="rediger_admin.php?id=<?php echo $row['id'] ?>">
                                                    <h4 class="f-black back">
                                                        Rediger
                                                    </h4>
                                                </a>
                                            </td>
                                            <td class="p-10">
                                                <a href="slet_admin.php?id=<?php echo $row['id'] ?>">
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
