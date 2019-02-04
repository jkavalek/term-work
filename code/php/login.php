<?php
session_start();
require('Db.php');
Db::connect();





if ($_POST)
{
    $uzivatel = Db::queryAll('
                SELECT *
                FROM uzivatele
                WHERE email=? AND heslo=?
        ', $_POST['email1'], sha1($_POST['password1']));


    if (!$uzivatel){
        echo 'Neplatné uživatelské jméno nebo heslo';


    }

        else
    {

        echo 'OK';

        $_SESSION['jmeno'] =   htmlspecialchars($uzivatel[0]['jmeno']);
        $_SESSION['uzivatel_email'] = $_POST['email1'];
        $_SESSION['uzivatel_id'] = $uzivatel[0]['uzivatele_id'];

        $_SESSION['uzivatel_opravneni'] = $uzivatel[0]['admin'];





    }
}

?>