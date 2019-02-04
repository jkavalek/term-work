<?php
require('Db.php');
Db::connect();

$id = $_POST['id'];


$program = Db::queryAll('select * from program where id_programu = ?',$id);

$rezervace = Db::queryAll('select * from rezervace where program_id_programu = ?',$id);

if(isset($rezervace[0])) {
    Db::query('delete from rezervace where program_id_programu = ?', $id);
}

if(isset($program[0])){
    Db::query('delete from program where id_programu = ?', $id);
    echo 'Program stornovan';
}

else echo 'Program nenalezen';


