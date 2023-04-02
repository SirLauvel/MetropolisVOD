<?php
require_once('function.php');

if (isset($_POST['deleteProducer'])) {
    deleteProducer($_POST['id_producer']);
    header('Location: ../../../producerList.php');
} else {
    var_dump($_POST);
    echo 'Nous avont pas reçu le formulaire.';
}