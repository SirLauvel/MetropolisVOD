<?php
require_once('class/Producer.php');

if(isset($_POST['addProducerMovieForm'])) {
    $id_producer = htmlspecialchars(strip_tags($_POST['id_producer']));
    $id_movie = $_POST['id_movie'];

    if (!empty($id_producer)){
        if(!Producer::checkProducer_movie($id_movie, $id_producer)) {
            Producer::addProducer_movie($id_movie, $id_producer);
        }else {
            $_SESSION['errorMessage'] = 'existproducer';
            //var_dump($_SESSION['errorMessage']);
            header('location: ../../../addRessource_movie.php');
        }
    } else {
        $_SESSION['errorMessage'] = 'emptyFields';
        //var_dump($_SESSION['errorMessage']);
        header('location: ../../../addRessource_movie.php');
    }
}