<?php

session_start();
require('Db.php');
Db::connect('127.0.0.1', 'mydb', 'root', '');


$nazev = $_POST['nazev'];
$popis = $_POST['popis'];
$delka = $_POST['delka'];
$video = $_POST['video'];

echo 'aaa';

$quer = Db::query('insert into filmy(nazev, popis, delkaFilmu,trailer,aktivni) values (?,?,?,?,?)', $nazev, $popis, $delka, $video, 1);

if ($quer) {
    echo 'OK';
} else {
    echo "Error....!!";
}


?>