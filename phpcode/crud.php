<?php

function getIndlaeg(){
    global $objCon;
    $sql = "SELECT `id`, `overskrift`, `dato`, `kategori_id`, `tekst` FROM `indlaeg` ORDER BY `dato` DESC";
    $result = $objCon->query($sql);
    return $result;
}

function getIndlaegById($id){
    global $objCon;
    $sql = "SELECT `id`, `overskrift`, `dato`, `kategori_id`, `tekst` FROM `indlaeg` WHERE `id` = $id";
    $result = $objCon->query($sql);
    return $result;
}

function getComments($id){
    global $objCon;
    $sql = "SELECT `id`, `navn`, `mail`, `dato`, `tekst`, `indlaeg_id` FROM `kommentar` WHERE `indlaeg_id` = '$id' ORDER BY `dato` DESC";
    $result = $objCon->query($sql);
    return $result;
}

function getPicture($id){
    global $objCon;
    $sql = "SELECT `id`, `indlaeg_id`, `fil_navn` FROM `billede` WHERE `indlaeg_id` = '$id'";
    $result = $objCon->query($sql);
    return $result;
}

function getAllKategori(){
    global $objCon;
    $sql = "SELECT `id`, `kategori` FROM `kategori`";
    $result = $objCon->query($sql);
    return $result;
}

function getKategori($id){
    global $objCon;
    $sql = "SELECT `id`, `kategori` FROM `kategori` WHERE `id` = $id";
    $result = $objCon->query($sql);
    return $result;
}

function getUser($brugernavn){
    global $objCon;
    $sql = "SELECT `id`, `navn`, `email`, `brugernavn`, `password` FROM `admin` WHERE `brugernavn` = '$brugernavn'";
    $result = $objCon->query($sql);
    return $result;
}

function getAllAdmins(){
    global $objCon;
    $sql = "SELECT `id`, `navn`, `email`, `brugernavn`, `password` FROM `admin`";
    $result = $objCon->query($sql);
    return $result;
}

function getAdminById($id){
    global $objCon;
    $sql = "SELECT `id`, `navn`, `email`, `brugernavn`, `password` FROM `admin` WHERE `id` = '$id'";
    $result = $objCon->query($sql);
    return $result;
}

function getAllComments(){
    global $objCon;
    $sql = "SELECT `id`, `navn`, `mail`, `dato`, `tekst`, `indlaeg_id` FROM `kommentar`";
    $result = $objCon->query($sql);
    return $result;
}

function getCommentById($id){
    global $objCon;
    $sql = "SELECT `id`, `navn`, `mail`, `dato`, `tekst`, `indlaeg_id` FROM `kommentar` WHERE `id` = '$id'";
    $result = $objCon->query($sql);
    return $result;
}

function getLastDay(){
    global $objCon;
    $sql = "SELECT `id`, `overskrift`, `dato`, `kategori_id`, `tekst` FROM `indlaeg` ORDER BY `id` DESC";
    $result = $objCon->query($sql);
    return $result;
}

function deleteComment($id){
    global $objCon;
    $sql = "DELETE FROM `kommentar` WHERE `id` = '$id'";
    $result = $objCon->query($sql);
    return $result;
}

function deleteAdmin($id){
    global $objCon;
    $sql = "DELETE FROM `admin` WHERE `id` = '$id'";
    $result = $objCon->query($sql);
    return $result;
}

function deleteIndlaeg($id){
    global $objCon;
    $sql = "DELETE FROM `indlaeg` WHERE `id` = '$id'";
    $result = $objCon->query($sql);
    return $result;
}

function deletePicture($id){
    global $objCon;
    $sql = "DELETE FROM `billede` WHERE `id` = '$id'";
    $result = $objCon->query($sql);
    return $result;
}

function createComment($navn, $mail, $dato, $tekst, $indlaeg_id){
    global $objCon;
    $sql = "INSERT INTO `kommentar`(`navn`, `mail`, `dato`, `tekst`, `indlaeg_id`) VALUES ('$navn', '$mail', '$dato', '$tekst', '$indlaeg_id')";
    $result = $objCon->query($sql);
    return $result;
}

function createAdmin($navn, $email, $brugernavn, $password){
    global $objCon;
    $sql = "INSERT INTO `admin`(`navn`, `email`, `brugernavn`, `password`) VALUES ('$navn','$email','$brugernavn','$password')";
    $result = $objCon->query($sql);
    return $result;
}

function createIndlaeg($overskrift, $dato, $kategori_id, $tekst){
    global $objCon;
    $sql = "INSERT INTO `indlaeg`(`overskrift`, `dato`, `kategori_id`, `tekst`) VALUES ('$overskrift','$dato','$kategori_id','$tekst')";
    $result = $objCon->query($sql);
    return $result;
}

function createPicture($indlaeg_id, $fil_navn){
    global $objCon;
    $sql = "INSERT INTO `billede`(`indlaeg_id`, `fil_navn`) VALUES ('$indlaeg_id', '$fil_navn')";
    $result = $objCon->query($sql);
    return $result;
}

function updateIndlaeg($id, $overskrift, $dato, $kategori, $tekst){
    global $objCon;
    $sql = "UPDATE `indlaeg` SET `overskrift`='$overskrift',`dato`='$dato',`kategori_id`='$kategori',`tekst`='$tekst' WHERE `id` = $id";
    $result = $objCon->query($sql);
    return $result;
}

function updateAdmin($id, $navn, $email, $brugernavn, $password){
    global $objCon;
    $sql = "UPDATE `admin` SET `navn`='$navn',`email`='$email',`brugernavn`='$brugernavn',`password`='$password' WHERE `id` = $id";
    $result = $objCon->query($sql);
    return $result;
}

?>
