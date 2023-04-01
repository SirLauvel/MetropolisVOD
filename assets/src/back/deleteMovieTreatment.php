<?php

try {
    if (isset($_POST['deleteMovie'])) {
        Movie::deleteMovie($_POST['id_movie']);
        header("Location:" . $_SERVER['HTTP_REFERER']);
    } else {
        echo 'erroDelete';
    }

} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}