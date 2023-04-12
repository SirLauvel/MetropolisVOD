<?php
require_once('function.php');

if (isset($_POST['addActor'])) {
    if (!empty($_POST['name_actor'])) {
        addActor($_POST['name_actor']);
        header('Location: ../../../actorList.php');
    } else {
        echo 'Le champ est vide.';
    }
} else {
    var_dump($_POST);
    echo 'Nous avont pas reçu le formulaire.';
}