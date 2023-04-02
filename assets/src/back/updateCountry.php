<?php
require_once('function.php');

if (isset($_POST['updateCountry'])) {
    if (!empty($_POST['name_country'])) {
        $id_country = (int) $_POST['id_country'];
        $name_country= htmlspecialchars(strip_tags($_POST['name_country']));
        updateCountry($id_country, $name_country);
        header('Location: ../../../countryList.php');
    } else {
        var_dump($_POST);
        echo 'Le champ est vide.';
    }
} else {
    var_dump($_POST);
    echo 'Nous avont pas reçu le formulaire.';
}