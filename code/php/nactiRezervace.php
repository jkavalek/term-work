<?php

session_start();
require('Db.php');
Db::connect('127.0.0.1', 'mydb', 'root', '');


//$id_uzivatel = $_POST['id'];
if (isset($_SESSION['uzivatel_id'])) {
    $id_uzivatel = $_SESSION['uzivatel_id'];

    $rezervace = Db::queryAll(
        'SELECT * FROM `rezervace` JOIN program ON program_id_programu = id_programu WHERE uzivatel_id_uzivatele = ? ', $id_uzivatel
    );
}

if ($_SESSION['uzivatel_opravneni'] == 1)
    $rezervace = Db::queryAll(
        'SELECT * FROM `rezervace` JOIN program ON program_id_programu = id_programu '
    );


$return_arr = array();


$myObj;
foreach ($rezervace as $f) {

    $myObj['id_rezervace'] = htmlspecialchars($f['cisloRezervace']);
    $myObj['sedadlo1'] = htmlspecialchars($f['sedadlo1']);
    $myObj['sedadlo2'] = htmlspecialchars($f['sedadlo2']);
    $myObj['sedadlo3'] = htmlspecialchars($f['sedadlo3']);
    $myObj['sedadlo4'] = htmlspecialchars($f['sedadlo4']);
    $myObj['sedadlo5'] = htmlspecialchars($f['sedadlo5']);


    $nazevFilmu = Db::queryAll('SELECT * FROM program JOIN filmy ON film_id_filmu = id_filmu where id_programu = ?', $f['program_id_programu']);
    $myObj['nazevFilmu'] = ($nazevFilmu[0]['nazev']);


    array_push($return_arr, $myObj);
}

$myJSON = json_encode($return_arr);
echo $myJSON;


?>






