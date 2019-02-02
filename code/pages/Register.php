<?php

include(dirname(__DIR__).'/db/Connection.php');
include(dirname(__DIR__).'/db/dbInserts.php');


if (!empty($_POST) && !empty($_POST["loginUsername"]) && !empty($_POST["loginPassword"])) {
    $authService = new dbInserts();
    if (!filter_var($_POST["loginEmail"],FILTER_VALIDATE_EMAIL)){
        echo "E-mail není platný";
    }
    else if ($authService->register($_POST["loginUsername"],$_POST["loginEmail"], $_POST["loginPassword"])) {
        echo "Registrace proběhla úspěšně";
    }
} else if (!empty($_POST)) {
    echo "Není vyplněný už jméno, heslo nebo e-mail";
}

?>


<form class="login-register" method="post">
    Uživatelské jméno:  <input type="text" name="loginUsername" placeholder="Insert username"><br>
    E-mail: <input type="text" name="loginEmail" placeholder="Insert Email"><br>
    Heslo:  <input type="password" name="loginPassword" placeholder="Password"><br>
    <input type="submit" value="Register">

</form>