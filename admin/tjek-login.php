<?php
session_start();
include "../include/connect.php";
include "../phpcode/crud.php";
$brugernavn = $_POST['brugernavn'];
$password = $_POST['password'];
$kodeord = getUser($brugernavn);
$row = mysqli_fetch_assoc($kodeord);
$kode = $row['password'];
$id = $row['id'];
if ($password == "$kode") {
    $_SESSION['id'] = "$id";
    header("location:forside.php");
}
?>
<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="UTF-8">
    <title>Blog | Admin</title>
    <link href="../css/reset.css" rel="stylesheet">
    <link href="../css/css.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Barlow+Condensed:400,600" rel="stylesheet">
    <link rel="icon" type="image/png" href="img/tinyicon.png">
</head>
<body class="flex-column center">
    <?php
            if ($password <> "$kode") {
                ?>
                <section class="content flex-column center">
                    <img src="../img/logo-black.png">
                    <h3 class="m-20">Brugeren findes ikke, tjek om du har skrevet dit brugernavn og password korrekt</h3>
                    <h4>Husk at der er forskel på store og små bogstaver</h4>
                    <h3 class="m-20"><a class="f-black back" href="login.php">Tilbage</a></h3>
                </section>
<?php
            }
            ?>
</body>
</html>
