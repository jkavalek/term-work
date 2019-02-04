<?php
session_start();
require('Db.php');
Db::connect();



//$id_uzivatel = $_POST['id'];
if(isset($_SESSION['uzivatel_id'])){
    $id_uzivatel = $_SESSION['uzivatel_id'];

    $rezervace = Db::queryAll(
        'SELECT * FROM `rezervace` JOIN program ON program_id_programu = id_programu WHERE uzivatel_id_uzivatele = ? ',$id_uzivatel
    );
}

if($_SESSION['uzivatel_opravneni']==1)
    $rezervace = Db::queryAll(
        'SELECT * FROM `rezervace` JOIN program ON program_id_programu = id_programu '
    );



$writer = new XMLWriter();
$writer->openURI('output');
$writer->startDocument('1.0','UTF-8');
$writer->setIndent(4);
$writer->startElement('Rezervacefilmu');

foreach ($rezervace as $f)
{

    $nazevFilmu = Db::queryAll('SELECT * FROM program JOIN filmy ON film_id_filmu = id_filmu where id_programu = ?',$f['program_id_programu']);
    $writer->startElement('Rezervaceid');
    $writer->writeAttribute('id', $f['cisloRezervace']);
    $writer->startElement('Filmu');
    $writer->writeAttribute('Nazev', $nazevFilmu[0]['nazev']);
    $writer->endElement();
    $writer->startElement('Sedadlo' );
    $writer->writeAttribute('číslo', htmlspecialchars($f['sedadlo1']));
    $writer->endElement();
    $writer->startElement('Sedadlo');
    $writer->writeAttribute('číslo', htmlspecialchars($f['sedadlo2']));
    $writer->endElement();
    $writer->startElement('Sedadlo');
    $writer->writeAttribute('číslo', htmlspecialchars($f['sedadlo3']));
    $writer->endElement();
    $writer->startElement('Sedadlo');
    $writer->writeAttribute('číslo', htmlspecialchars($f['sedadlo4']));
    $writer->endElement();
    $writer->startElement('Sedadlo');
    $writer->writeAttribute('číslo', htmlspecialchars($f['sedadlo5']));
    $writer->endElement();
    $writer->endElement();

}

$writer->endElement();
$writer->endElement();
$writer->endDocument();
$writer->flush();


