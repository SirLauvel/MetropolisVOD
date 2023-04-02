<?php
require_once('function.php');

if (isset($_POST['addCountry'])) {
    if (!empty($_POST['name_country'])) {
        addCountry($_POST['name_country']);
        header('Location: ../../../countryList.php');
    } else {
        echo 'Le champ est vide.';
    }
} else {
    var_dump($_POST);
    echo 'Nous avont pas reçu le formulaire.';
}