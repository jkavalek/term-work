<?php
/**
 * Created by PhpStorm.
 * User: st496
 * Date: 28.01.2019
 * Time: 18:28
 */

include(dirname(__DIR__) . '/items/Movie.php');

$movies = array(Movie::getMovie(1,"img/Movies/marvel.jpg","Marvel"),
    Movie::getMovie(2,"img/Movies/marvel.jpg","Iron man"),
    Movie::getMovie(3,"img/14834104277_138d3c380f_o.jpg","Hulk"),
    Movie::getMovie(4,"img/Movies/marvel.jpg","Captain America"),
    Movie::getMovie(5,"img/Movies/marvel.jpg","Jak jsem poznal vaší matku"),
    Movie::getMovie(6,"img/Movies/no.jpg","Potkali se u Kolína"),
    Movie::getMovie(7,"img/14834104277_138d3c380f_o.jpg","Hulk"),
    Movie::getMovie(8,"img/Movies/marvel.jpg","Captain America"),
    Movie::getMovie(9,"img/Movies/marvel.jpg","Jak jsem poznal vaší matku"),
    Movie::getMovie(10,"img/Movies/no.jpg","Potkali se u Kolína"),
    Movie::getMovie(11,"img/14834104277_138d3c380f_o.jpg","Hulk"),
    Movie::getMovie(12,"img/Movies/marvel.jpg","Captain America"),
    Movie::getMovie(13,"img/Movies/marvel.jpg","Jak jsem poznal vaší matku"),
    Movie::getMovie(14,"img/Movies/no.jpg","Potkali se u Kolína"),
    Movie::getMovie(15,"img/14834104277_138d3c380f_o.jpg","Hulk"),
    Movie::getMovie(16,"img/Movies/marvel.jpg","Captain America"),
    Movie::getMovie(17,"img/Movies/marvel.jpg","Jak jsem poznal vaší matku"),
    Movie::getMovie(18,"img/Movies/no.jpg","Potkali se u Kolína"),
    Movie::getMovie(19,"img/14834104277_138d3c380f_o.jpg","Hulk"),
    Movie::getMovie(20,"img/Movies/marvel.jpg","Captain America"),
    Movie::getMovie(21,"img/Movies/marvel.jpg","Jak jsem poznal vaší matku"),
    Movie::getMovie(22,"img/Movies/no.jpg","Potkali se u Kolína")
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
