<?php
require_once('function.php');

if (isset($_POST['addProducer'])) {
    if (!empty($_POST['name_producer'])) {
        addProducer($_POST['name_producer']);
        header('Location: ../../../producerList.php');
    } else {
        echo 'Le champ est vide.';
    }
} else {
    var_dump($_POST);
    echo 'Nous avont pas reçu le formulaire.';
}