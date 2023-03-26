<?php
session_start();
require('function.php');
require_once('class/Movie.php');
function emptyFields(array $movie)
{
    var_dump($movie);
    if (
        empty($movie['title_movie']) || empty($movie['synopsis_movie']) || empty($movie['poster_movie']) || empty($movie['video_movie']) ||
        empty($movie['country_movie']) || empty($movie['category_movie'] || empty($movie['duration_movie']))
    ) {
        $_SESSION['errorMessage'] = 'emptyFields';
        header('Location: ../../../addMovie.php');
    } else {
        return true;
    }
}

try {
    var_dump($_POST);
    var_dump($_FILES);
    if (isset($_POST['addMovieForm'])) {
        $movieOK = false;

        //$image = uploadImage('addMovie', $_FILES['poster_movie']);
        //$video = uploadVideo('addMovie', $_FILES['video_movie']);
        if (emptyFields($_POST)) {
            if (checkNumberCategory('addMovie', $_POST['category_movie'])) {
                Movie::addMovie($_POST);
            }
        }


    } else {
        $_SESSION['errorMessage'] = 'errorForm';
        //header('Location: ../../../addMovie.php');
    }
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
?>