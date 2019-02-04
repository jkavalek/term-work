<?php
session_start();


$myObj;
$return_arr = array();
if (isset($_SESSION['uzivatel_email'])){



    $myObj['email'] =  $_SESSION['uzivatel_email'];
    $myObj['jmeno'] =  $_SESSION['jmeno'];
    if(isset($_SESSION['telefon']))
        $myObj['telefon'] = $_SESSION['telefon'];
    else
        $myObj['telefon'] = "nenalezen";

    array_push($return_arr,$myObj);

    $myJSON = json_encode($return_arr);
  echo $myJSON;


}







?>