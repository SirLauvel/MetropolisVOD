<?php
session_start();
require('function.php');
require_once('class/movie.php');
function emptyFields(array $movie)
{
    var_dump($movie);
    if (
        empty($movie['title_movie']) || empty($movie['synopsis_movie']) || empty($movie['poster_movie']) || empty($movie['video_movie']) ||
        empty($movie['country_movie']) || empty($movie['category_movie'])
    ) {
        $_SESSION['errorMessage'] = 'emptyFields';
        //header('Location: ../../../addMovie.php');
    } elseif (empty($movie['linkWiki_movie'])) {
        $movie['linkWiki_movie'] = NULL;
    }
    return true;

}

try {
    if (isset($_POST['addMovieForm'])) {
        var_dump($_POST).
        $movie = [];
        $movie = [
            'title_movie' => htmlspecialchars(strip_tags($_POST['title_movie'])),
            'linkWiki_movie' => htmlspecialchars(strip_tags($_POST['linkWiki_movie'])),
            'synopsis_movie' => htmlspecialchars(strip_tags($_POST['synopsis_movie'])),
            'poster_movie' => $_POST['poster_movie'],
            'video_movie' => $_POST['video_movie'],
            'country_movie' => $_POST['country_movie']
        ];
        $movieOK = false;

        $numberCategory = count($_POST['category_movie']);
        checkNumberCategory('addMovie', $numberCategory);

        for($i=0; $i<$numberCategory; $i++) {
            $movie['category_movie'][] = $_POST['category_movie'][$i];
        };
    

        if (
            emptyFields($movie) &&
            checkImageFile('addMovie', $movie['poster_movie']) &&
            checkVideoFile('addMovie', $movie['video_movie'])
        )
            $movieOK = true;

        if ($movieOK) {
            Movie::addMovie($movie[]);
            $_SESSION['successMessage'] = 'addFilm';
            header('../../../addMovie.php');
        }
    }
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
?>