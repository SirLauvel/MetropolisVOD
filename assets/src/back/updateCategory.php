<?php
require_once('function.php');

if (isset($_POST['updateCategory'])) {
    if (!empty($_POST['name_category'])) {
        $id_category = (int) $_POST['id_category'];
        $name_category= htmlspecialchars(strip_tags($_POST['name_category']));
        updateCategory($id_category, $name_category);
        header('Location: ../../../categoryList.php');
    } else {
        var_dump($_POST);
        echo 'Le champ est vide.';
    }
} else {
    var_dump($_POST);
    echo 'Nous avont pas reçu le formulaire.';
}