<?php
require('function.php');

if (isset($_POST['updatePassword'])) {
    if (!empty($_POST['password_users']) || !empty($_POST['newPassword_users']) || !empty($_POST['repeatNewPassword_users'])) {
        $password = htmlspecialchars(strip_tags($_POST['password_users']));
        $newPassword = htmlspecialchars(strip_tags($_POST['newPassword_users']));
        $repeatNewPassword = htmlspecialchars(strip_tags($_POST['repeatNewPassword_users']));

        if (checkPassword($_POST['id_users'], $password)) {
            if ($newPassword == $repeatNewPassword) {
                updatePassword($_POST['id_users'], $newPassword);

            } else
                echo "Les mots de passe ne sont pas identique.";
        } else
            echo "Le mot de pass est incorrect.";
    } else
        echo "Les champs sont vide.";
} else
    echo "Le formulaire n'a pas était reçu.";
var_dump($_POST);
header('Location: ../../../account.php');