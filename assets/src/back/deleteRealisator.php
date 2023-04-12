<?php
require_once('function.php');

if (isset($_POST['deleteRealisator'])) {
    deleteRealisator($_POST['id_realisator']);
    header('Location: ../../../realisatorList.php');
} else {
    var_dump($_POST);
    echo 'Nous avont pas reçu le formulaire.';
}