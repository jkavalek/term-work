
<?php
include(dirname(__DIR__).'/db/Authentication.php');



?>
<nav>
<div class="toolbar">
    <a class="left" href="<?= BASE_URL . "?page=HomePage" ?>"> <img src="../img/white-home-button-png-7.png" alt="Home button" height="25" , width="25" ></a>

    <?php if (Authentication::getInstance()->hasIdentity()) : ?>
    <a class="right" href="<?= BASE_URL . "?page=profile" ?>"> Účet</a>
    <a class="right" href="<?= BASE_URL . "?page=logout" ?>"> Logout</a>
        <a class="left" href="<?= BASE_URL . "?page=Movies" ?>"> Seznam filmů</a>

    <?php else : ?>
        <a class="right" href="<?= BASE_URL . "?page=Login" ?>">Login</a>
        <a class="right" href=<?= BASE_URL . "?page=Register" ?>"> Registrace</a>
    <?php endif; ?>
</div>
</nav>


