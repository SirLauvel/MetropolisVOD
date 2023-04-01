<?php
require_once('class/Actor.php');

if(isset($_POST['addActorMovieForm'])) {
    $id_actor = htmlspecialchars(strip_tags($_POST['id_actor']));
    $id_movie = $_POST['id_movie'];

    if (!empty($id_actor)){
        if(!Actor::checkActor_movie($id_movie, $id_actor)) {
            Actor::addActor_movie($id_movie, $id_actor);
        }else {
            $_SESSION['errorMessage'] = 'existactor';
            //var_dump($_SESSION['errorMessage']);
            header('location: ../../../addRessource_movie.php');
        }
    } else {
        $_SESSION['errorMessage'] = 'emptyFields';
        //var_dump($_SESSION['errorMessage']);
        header('location: ../../../addRessource_movie.php');
    }
}