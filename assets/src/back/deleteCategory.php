<?php
require_once('function.php');

if (isset($_POST['deleteCategory'])) {
    deleteCategory($_POST['id_category']);
    header('Location: ../../../categoryList.php');
} else {
    var_dump($_POST);
    echo 'Nous avont pas reçu le formulaire.';
}