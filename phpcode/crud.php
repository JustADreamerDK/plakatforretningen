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

function getKategori($id){
    global $objCon;
    $sql = "SELECT `id`, `kategori` FROM `kategori` WHERE `id` = $id";
    $result = $objCon->query($sql);
    return $result;
}






?>
