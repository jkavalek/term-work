<?php
session_start();


$hint = "";


if (isset($_SESSION['uzivatel_email'])) {


    echo $hint = htmlspecialchars($_SESSION['uzivatel_opravneni']);

} else {

    echo '';

}


