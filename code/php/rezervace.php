<?php


session_start();
require('Db.php');
Db::connect();


$sedadlaPole = array();

if(isset($_POST['sedadlo1'])){
$s1 = $_POST['sedadlo1'];
array_push($sedadlaPole,$s1);

if(isset($_POST['sedadlo2'])){
$s2 = $_POST['sedadlo2'];
    array_push($sedadlaPole,$s2);}
    else $s2 = 0;

if(isset($_POST['sedadlo3'])){
    $s3 = $_POST['sedadlo3'];

    array_push($sedadlaPole,$s3);
}   else $s3 = 0;

if(isset($_POST['sedadlo4'])){
    $s4 = $_POST['sedadlo4'];

    array_push($sedadlaPole,$s4);;
}   else $s4 = 0;
if(isset($_POST['sedadlo5'])){
    $s5 = $_POST['sedadlo5'];
    array_push($sedadlaPole,$s5);
}   else $s5 = 0;
    $id_program =  $_POST['idProgramu'];
    $cisloRezervace =  rand(111111, 999999);
    if (isset($_SESSION['uzivatel_email'])) {
        Db::query('insert into rezervace (uzivatel_id_uzivatele,program_id_programu,sedadlo1,sedadlo2,sedadlo3,sedadlo4,sedadlo5,cisloRezervace)
                                  values (?,?,?,?,?,?,?,?)',$_SESSION['uzivatel_id'],$id_program,$s1,$s2,$s3,$s4,$s5,$cisloRezervace);
        echo $cisloRezervace;
    }
    else{
        Db::query('insert into rezervace (uzivatel_id_uzivatele,program_id_programu,sedadlo1,sedadlo2,sedadlo3,sedadlo4,sedadlo5,cisloRezervace)
                                  values (?,?,?,?,?,?,?,?)',99,$id_program,$s1,$s2,$s3,$s4,$s5,$cisloRezervace);
        echo $cisloRezervace;
    }
return;
}

$return_arr = array();
$sedadla = Db::queryAll('SELECT sedadlo1,sedadlo2,sedadlo3,sedadlo4,sedadlo5 FROM `rezervace` WHERE program_id_programu = ?',$_POST['idProgramu']);
foreach ($sedadla as $s){
    array_push($return_arr,$s['sedadlo1']);
    array_push($return_arr,$s['sedadlo2']);
    array_push($return_arr,$s['sedadlo3']);
    array_push($return_arr,$s['sedadlo4']);
    array_push($return_arr,$s['sedadlo5']);

}


echo  json_encode($return_arr);