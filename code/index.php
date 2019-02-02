<?php
/**
 * Created by PhpStorm.
 * User: st49645
 * Date: 16.01.2019
 * Time: 16:47
 */
ob_start();
session_start();

function __autoload($className)
{
    if (file_exists('./class/' . $className . '.php')) {
        require_once './pages/' . $className . '.php';
        return true;
    }
    return false;
}

?>
<!DOCTYPE html>
<html lang="cz">
<head>
    <link rel="stylesheet" href="./css/mainPage.css">
</head>
<header>
    <?php
    include "./items/Toolbar.php";
    ?>

    <div class="header-div">
        <section id="hero">
            <h1> Online videopůjčovna</h1>
        </section>
    </div>
</header>

<body>

<div class="body-div">
    <main>
        <?php
        $file = "./pages/" . $_GET["page"] . ".php";
        if (file_exists($file)) {
            include $file;
        } else {
            include "./pages/HomePage.php";
        }
        ?>
    </main>
</div>

</body>

<footer>
    <div class="full-width-wrapper">
        <div class="flex-wrap">
            <section>
                <ul>
                    <li><a href="#"> Contact me</a></li>
                </ul>
            </section>

            <section>
                <h4>Contact</h4>
                <address>
                    Lorem Ipsum ,s.r.o<br>
                    Ipsum lore<br>
                    Česká republika<br>
                    +420 321 569 874<br>
                    Email:  lorem@lorem.cz
                </address>
            </section>

            <section id="footer-newsletter">
                <h4>Newsletter</h4>
                <form method="post" action="#">
                    <div>
                        <label>
                            Enter your email adress:
                        </label>
                    </div>
                    <div>
                        <input type="text"
                               name="email"/>
                    </div>
                    <div>
                        <input type="submit"
                               name="newsletter"
                               value="Subscribe">
                    </div>
                </form>
            </section>
        </div>
    </div>

    <section>
        <p>
            CopyLeft - 2018 - <?= date('Y') ?>
            <a href="https://github.com"> </a>
        </p>
    </section>
    </div>
</footer>
</html>