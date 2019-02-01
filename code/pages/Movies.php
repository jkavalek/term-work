<?php
/**
 * Created by PhpStorm.
 * User: st496
 * Date: 28.01.2019
 * Time: 18:28
 */

include(dirname(__DIR__) . '/items/Movie.php');

$movies = array(Movie::getMovie("img/Movies/marvel.jpg","Marvel"),
    Movie::getMovie("img/Movies/marvel.jpg","Iron man"),
    Movie::getMovie("img/14834104277_138d3c380f_o.jpg","Hulk"),
    Movie::getMovie("img/Movies/marvel.jpg","Captain America"),
    Movie::getMovie("img/Movies/marvel.jpg","Jak jsem poznal vaší matku"),
    Movie::getMovie("img/Movies/no.jpg","Potkali se u Kolína"),
    Movie::getMovie("img/14834104277_138d3c380f_o.jpg","Hulk"),
    Movie::getMovie("img/Movies/marvel.jpg","Captain America"),
    Movie::getMovie("img/Movies/marvel.jpg","Jak jsem poznal vaší matku"),
    Movie::getMovie("img/Movies/no.jpg","Potkali se u Kolína"),
    Movie::getMovie("img/14834104277_138d3c380f_o.jpg","Hulk"),
    Movie::getMovie("img/Movies/marvel.jpg","Captain America"),
    Movie::getMovie("img/Movies/marvel.jpg","Jak jsem poznal vaší matku"),
    Movie::getMovie("img/Movies/no.jpg","Potkali se u Kolína"),
    Movie::getMovie("img/14834104277_138d3c380f_o.jpg","Hulk"),
    Movie::getMovie("img/Movies/marvel.jpg","Captain America"),
    Movie::getMovie("img/Movies/marvel.jpg","Jak jsem poznal vaší matku"),
    Movie::getMovie("img/Movies/no.jpg","Potkali se u Kolína"),
    Movie::getMovie("img/14834104277_138d3c380f_o.jpg","Hulk"),
    Movie::getMovie("img/Movies/marvel.jpg","Captain America"),
    Movie::getMovie("img/Movies/marvel.jpg","Jak jsem poznal vaší matku"),
    Movie::getMovie("img/Movies/no.jpg","Potkali se u Kolína")
)

?>

<head>
    <link rel="stylesheet" href="./css/mainPage.css">
</head>
<H1>Seznam filmů</H1>
<div class="movieList">
    <?php
    foreach ($movies as $x){
      echo $x;
}
    ?>

</div>
