<?php
require_once('function.php');

if (isset($_POST['updateActor'])) {
    if (!empty($_POST['name_actor'])) {
        $id_actor = (int) $_POST['id_actor'];
        $name_actor= htmlspecialchars(strip_tags($_POST['name_actor']));
        updateActor($id_actor, $name_actor);
        header('Location: ../../../actorList.php');
    } else {
        var_dump($_POST);
        echo 'Le champ est vide.';
    }
} else {
    var_dump($_POST);
    echo 'Nous avont pas reçu le formulaire.';
}