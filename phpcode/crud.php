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
    $sql = "SELECT `id`, `indlaeg_id`, `navn`, `fil_navn` FROM `billede` WHERE `indlaeg_id` = '$id'";
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

?>
