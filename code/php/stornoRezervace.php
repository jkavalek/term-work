<?php
require('Db.php');
Db::connect();



$kontrola = Db::queryAll('select * from rezervace where cisloRezervace = ?',$_POST['cisloRezervace']);

if(isset($kontrola[0]['cisloRezervace'])){


Db::query('delete from rezervace where cisloRezervace = ?', $_POST['cisloRezervace']);
echo 'rezervace stornovana';
}

else echo 'rezervace nenalezena';





