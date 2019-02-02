
<?php

require_once(dirname(__DIR__).'/db/Connection.php');


if (!empty($_POST) && !empty($_POST["loginUsername"]) && !empty($_POST["loginPassword"])) {
    $authService = Authentication::getInstance();
    if ($authService->login($_POST["loginUsername"], $_POST["loginPassword"])) {
        header("Location:" . BASE_URL);
    } else {
        echo "user not found";
    }
} else if (!empty($_POST)) {
    echo "Username and password are required";
}

?>


<form class="login-register" method="post">

    <input type="text" name="loginUsername" placeholder="Insert username">
    <input type="password" name="loginPassword" placeholder="Password">
    <input type="submit" value="Log in">

</form>