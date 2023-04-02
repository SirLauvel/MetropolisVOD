<?php
require_once('function.php');

if (isset($_POST['addCategory'])) {
    if (!empty($_POST['name_category'])) {
        addCategory($_POST['name_category']);
        header('Location: ../../../categoryList.php');
    } else {
        echo 'Le champ est vide.';
    }
} else {
    var_dump($_POST);
    echo 'Nous avont pas reçu le formulaire.';
}