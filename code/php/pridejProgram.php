<?php

session_start();
require('Db.php');
Db::connect();


$datum=$_POST['datum'];
$cas=$_POST['cas'];
$film= $_POST['film'];
$sal=$_POST['sal'];



$quer = Db::query("insert into program(datum, cas, film_id_filmu,sal_id_salu) values ('$datum', '$cas', '$film','$sal')");

if($quer){
    echo 'OK';
}else
{
    echo "Chyba";
}




?>