<?php

session_start();
require('Db.php');
Db::connect('127.0.0.1', 'mydb', 'root', '');


$return_arr = array();
$myObj;
$idFilmu;


$film = Db::queryAll(
    'SELECT * FROM filmy'
);

foreach ($film as $f) {

    $idFilmu = $f['id_filmu'];
    $program = Db::queryAll(
        'SELECT * FROM program WHERE film_id_filmu = ?', $idFilmu
    );

    $myObj['nazev_filmu'] = $f['nazev'];

    foreach ($program as $p) {


        $myObj['idProgramu'] = $p['id_programu'];
        $myObj['idFilmu'] = $p['film_id_filmu'];
        $date = $p['datum'];
        $month = date('m', strtotime($date));
        $den = date('d', strtotime($date));
        //echo  $month ;

        $myObj['mesic'] = $month;
        $myObj['den'] = $den;
        $myObj['cas'] = htmlspecialchars($p['cas']);
        $myObj['id_salu'] = htmlspecialchars($p['sal_id_salu']);

        array_push($return_arr, $myObj);
    }

}


$myJSON = json_encode($return_arr);
echo $myJSON;









/**
 * Created by PhpStorm.
 * User: Jenda
 * Date: 14.11.2017
 * Time: 8:58
 */