<?php

session_start();
require('Db.php');
Db::connect('127.0.0.1', 'mydb', 'root', '');


$id = $_POST['id'];


$prikaz = Db::query("update filmy set aktivni = 0 where id_filmu = ?", $id);


?>
