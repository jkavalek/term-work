<?php
session_start();
require('Db.php');
Db::connect('127.0.0.1', 'mydb', 'root', '');





if ($_POST)
{
    $uzivatel = Db::queryAll('
                SELECT *
                FROM user
                WHERE email=? AND password=?
        ', $_POST['email1'], sha1($_POST['password1']));


    if (!$uzivatel){
        echo 'Neplatné uživatelské jméno nebo heslo';


    }

        else
    {

        echo 'OK';

        $id = $uzivatel[0]['id'];

        $_SESSION['jmeno'] =   htmlspecialchars($uzivatel[0]['username']);
        $_SESSION['uzivatel_email'] = $_POST['email1'];
        $_SESSION['uzivatel_id'] = $id;


        $_SESSION['uzivatel_opravneni'] = $uzivatel[0]['admin'];

       $premium = Db::queryAll('
                SELECT *
                FROM premium
                WHERE premium = ?
        ', $id);


       if(!premium) {
            $premium[0]['aktivni_do'] = "nenalezeno";
        }
        $_SESSION['premium'] = $premium[0];


    }
}

?>