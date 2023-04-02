<?php
require_once('function.php');

if (isset($_POST['updateProducer'])) {
    if (!empty($_POST['name_producer'])) {
        $id_producer = (int) $_POST['id_producer'];
        $name_producer= htmlspecialchars(strip_tags($_POST['name_producer']));
        updateProducer($id_producer, $name_producer);
        header('Location: ../../../producerList.php');
    } else {
        var_dump($_POST);
        echo 'Le champ est vide.';
    }
} else {
    var_dump($_POST);
    echo 'Nous avont pas reçu le formulaire.';
}