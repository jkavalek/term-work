<?php

session_start();
require('Db.php');
Db::connect();



if(isset($_POST['idProgramu'])){


$idProgramu = $_POST['idProgramu'];



$myObj;
$sedadla = Db::queryAll('SELECT * FROM saly JOIN program ON sal_id_salu = id_salu WHERE id_programu = ? ',$idProgramu);


$return_arr = array();
foreach ($sedadla as $s){

    $myObj['pocetRad'] =  $s['pocet_rad'];
    $myObj['pocetSedadelVRade'] =  $s['pocet_sed_v_rade'];

    array_push($return_arr,$myObj);
}






$myJSON = json_encode($return_arr);
echo $myJSON;
}




?>





