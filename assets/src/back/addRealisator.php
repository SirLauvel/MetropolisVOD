<?php
require_once('function.php');

if (isset($_POST['addRealisator'])) {
    if (!empty($_POST['name_realisator'])) {
        addRealisator($_POST['name_realisator']);
        header('Location: ../../../realisatorList.php');
    } else {
        echo 'Le champ est vide.';
    }
} else {
    var_dump($_POST);
    echo 'Nous avont pas reçu le formulaire.';
}