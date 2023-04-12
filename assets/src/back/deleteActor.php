<?php
require_once('function.php');

if (isset($_POST['deleteActor'])) {
    $id_actor = $_POST['id_actor'];
    $linkMovie = checkLinkMovie($id_actor);

    if (empty($linkMovie)) {
        deleteActor($id_actor);
        header('Location: ../../../actorList.php');
    } else {
        var_dump($_POST);
        echo 'Vous ne pouvez pas supprimer un acteur lié à un film.<br>';
        echo 'Cet acteur est lier à :<br>';
        foreach ($linkMovie as $movie){
            echo $movie['title_movie'].'<br>';
        }
    }
} else {
    var_dump($_POST);
    echo 'Nous avont pas reçu le formulaire.';
}