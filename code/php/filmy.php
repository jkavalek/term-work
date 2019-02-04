<?php
session_start();
require('Db.php');
Db::connect();



$filmy = Db::queryAll(
    'SELECT * FROM filmy WHERE AKTIVNI = 1'
);



$return_arr = array();
// lookup all hints from array if $q is different from ""

    $myObj ;
foreach ($filmy as $f)
{

    $myObj['nazev'] =  htmlspecialchars($f['nazev']);
    $myObj['id_filmu'] =  htmlspecialchars($f['id_filmu']);
    $myObj['popis'] =  htmlspecialchars($f['popis']);
    $myObj['delka'] =  $f['delkaFilmu'];
    $myObj['trailer'] =  htmlspecialchars($f['trailer']);

    array_push($return_arr,$myObj);




}

$myJSON = json_encode($return_arr);
echo $myJSON;



?>



