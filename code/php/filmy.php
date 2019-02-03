<?php
session_start();
require('Db.php');
Db::connect('127.0.0.1', 'mydb', 'root', '');



$filmy = Db::queryAll(
    'SELECT * FROM video'
);



$return_arr = array();
// lookup all hints from array if $q is different from ""

    $myObj ;
foreach ($filmy as $f)
{

    $myObj['nazev'] =  htmlspecialchars($f['Nazev']);
    $myObj['id'] =  htmlspecialchars($f['id']);
    $myObj['popis'] =  htmlspecialchars($f['Popis']);
    $myObj['rokVydani'] =  $f['Rok_vydani'];
    $myObj['cena'] =  htmlspecialchars($f['Cena']);
    $myObj['URL'] =  htmlspecialchars($f['URL']);
    $myObj['img_path'] =  htmlspecialchars($f['img_path']);

    array_push($return_arr,$myObj);

}

$myJSON = json_encode($return_arr);
echo $myJSON;



?>



