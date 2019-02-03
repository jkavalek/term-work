<?php


session_start();
require('php/Db.php');
Db::connect('127.0.0.1', 'mydb', 'root', '');


$nazev = $_POST['nazev']; // Fetching Values from URL.
$popis = $_POST['popis'];
$delka = $_POST['delka'];
$video = $_POST['video'];


$quer = Db::query("INSERT INTO FILMY (NAZEV,POPIS,DELKA,VIDEO) VALUES(?,?,?,?),
$nazev,
$popis,
$delka,
$video
");


if ($quer)
    echo "OK";