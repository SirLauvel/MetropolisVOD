<?php
require_once('class/Realisator.php');

if(isset($_POST['addRealisatorMovieForm'])) {
    $id_realisator = htmlspecialchars(strip_tags($_POST['id_realisator']));
    $id_movie = $_POST['id_movie'];

    if (!empty($id_realisator)){
        if(!Realisator::checkRealisator_movie($id_movie, $id_realisator)) {
            Realisator::addRealisator_movie($id_movie, $id_realisator);
        }else {
            $_SESSION['errorMessage'] = 'existRealisator';
            //var_dump($_SESSION['errorMessage']);
            header('location: ../../../addRessource_movie.php');
        }
    } else {
        $_SESSION['errorMessage'] = 'emptyFields';
        //var_dump($_SESSION['errorMessage']);
        header('location: ../../../addRessource_movie.php');
    }
}