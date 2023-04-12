<?php
require_once('function.php');

if (isset($_POST['deleteCountry'])) {
    deleteCountry($_POST['id_country']);
    header('Location: ../../../countryList.php');
} else {
    var_dump($_POST);
    echo 'Nous avont pas reçu le formulaire.';
}