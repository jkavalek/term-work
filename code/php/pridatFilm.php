<?php




session_start();
require('php/Db.php');
Db::connect();


$nazev=$_POST['nazev']; // Fetching Values from URL.
$popis=$_POST['popis'];
$delka=$_POST['delka'];
$video=$_POST['video'];



$quer = Db::query("INSERT INTO FILMY (NAZEV,POPIS,DELKA,VIDEO) VALUES(?,?,?,?),
$nazev,
$popis,
$delka,
$video
");


if($quer)
    echo "OK";