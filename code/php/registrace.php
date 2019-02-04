




<?php

session_start();
require('Db.php');
Db::connect();

if (isset($_SESSION['uzivatel_email'])) {




if(isset($_POST['name1'])){
    $quer = Db::query('update uzivatele SET jmeno = ? WHERE uzivatele_id = ?',$_POST['name1'],$_SESSION['uzivatel_id']);
    $_SESSION['jmeno'] = $_POST['name1'];

}

if(isset($_POST['email1'])){
    $quer = Db::query('update uzivatele SET email = ? WHERE uzivatele_id = ?',$_POST['email1'],$_SESSION['uzivatel_id']);
}
if(isset($_POST['telefon'])){
    $quer = Db::query('update uzivatele SET telefon = ? WHERE uzivatele_id = ?',$_POST['telefon'],$_SESSION['uzivatel_id']);
}

    if(isset($_POST['password1'])){
        $quer = Db::query('update uzivatele SET heslo = ? WHERE uzivatele_id = ?',sha1($_POST['heslo']),$_SESSION['uzivatel_id']);
    }

}
else{

$name=$_POST['name1'];
$email=$_POST['email1'];



$password= sha1($_POST['password1']);

$email = filter_var($email, FILTER_SANITIZE_EMAIL);
if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
    echo "Neplatný email.......";
}else{
    $result = Db::query("SELECT * FROM uzivatele WHERE email='$email'");


    if(($result)==0){
        $quer = Db::query("insert into uzivatele(jmeno, email, heslo) values ('$name', '$email', '$password')");

        if($quer){
            echo 'Registrace úspěšná';
        }else
        {
            echo "Chyba ";
        }
    }else{
        echo "Email už je zaregistrován";
    }
}
}

?>





