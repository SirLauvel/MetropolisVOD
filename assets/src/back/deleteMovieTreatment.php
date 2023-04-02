<?php
require_once('assets/src/back/function.php');
try {
    if (isset($_POST['deleteMovie'])) {
        deleteMovie($_POST['id_movie']);
        header("Location:" . $_SERVER['HTTP_REFERER']);
    } else {
        echo 'erroDelete';
    }

} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}