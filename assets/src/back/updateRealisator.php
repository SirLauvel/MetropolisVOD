<?php
require_once('function.php');

if (isset($_POST['updateRealisator'])) {
    if (!empty($_POST['name_realisator'])) {
        $id_realisator = (int) $_POST['id_realisator'];
        $name_realisator= htmlspecialchars(strip_tags($_POST['name_realisator']));
        updateRealisator($id_realisator, $name_realisator);
        header('Location: ../../../realisatorList.php');
    } else {
        var_dump($_POST);
        echo 'Le champ est vide.';
    }
} else {
    var_dump($_POST);
    echo 'Nous avont pas reçu le formulaire.';
}