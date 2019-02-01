<?php
/**
 * Created by PhpStorm.
 * User: st49645
 * Date: 16.01.2019
 * Time: 16:47
 */
?>
<!DOCTYPE html>
<html lang="en">
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
    <?php
    include "./pages/Movies.php"
    ?>
</div>

</body>

<footer>
    <div class="full-width-wrapper">
        <div class="flex-wrap">
            <section>
                <h4> About Me</h4>
                <ul>
                    <li><a href="#"> Work with me</a></li>
                    <li><a href="#"> References</a></li>
                    <li><a href="#"> Contact me</a></li>
                    <li><a href="#"> Authors</a></li>
                    <li><a href="#"> Login</a></li>
                </ul>
            </section>

            <section>
                <h4>Contact</h4>
                <address>
                    Honzovo ,s.r.o<br>
                    Hradec kralove<br>
                    Česká republika<br>
                    +420 321 569 874<br>
                    Email:  st49645@student.upce.cz
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
            CopyLeft - <?= date('Y') ?>
            <a href="https://github.com"> </a>
        </p>
    </section>
    </div>
</footer>
</html>