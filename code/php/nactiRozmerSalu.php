<?php

session_start();
require('Db.php');
Db::connect('127.0.0.1', 'mydb', 'root', '');


if (isset($_POST['idProgramu'])) {


    $idProgramu = $_POST['idProgramu'];


    $myObj;
    $sedadla = Db::queryAll('SELECT * FROM kopie_filmu JOIN program ON sal_id_salu = id_kopie_filmu WHERE id_programu = ? ', $idProgramu);


    $return_arr = array();
    foreach ($sedadla as $s) {

        $myObj['sloupce'] = $s['sloupec'];
        $myObj['radky'] = $s['radek'];

        array_push($return_arr, $myObj);
    }


    $myJSON = json_encode($return_arr);
    echo $myJSON;
}


?>





