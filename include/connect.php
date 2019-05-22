<?php
// $objCon = new mysqli("localhost", "kkjer_dk_plakatforretningen", "aal010393", "kkjer_dk_plakatforretningen");
$objCon = new mysqli("localhost", "root", "root", "plakatforretningen");
if ($objCon->connect_errno) {
    die('Kan ikke forbinde (' . $objCon->connect_errno . ')' . $objCon->connect_error);
}
$objCon->set_charset("utf8");
?>
