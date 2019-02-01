
<?php
class Movie{

    static function getMovie($imagePath, $title){
        if (!file_exists($imagePath)){
            $imagePath = "img/no-image-available.png";
        }
        return <<<HTML
        <div class="movie">
        <img class="movieImg" src=$imagePath alt="$title image"  >
        <h2 class="movieTitle">$title</h2>
        </div>
HTML;
    }
}
?>
