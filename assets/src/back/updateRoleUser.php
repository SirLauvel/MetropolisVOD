<?php
require_once('function.php');

if (isset($_POST['updateRole'])) {
    var_dump($_POST);
    $id_users = $_POST['id_users'];
    $id_role = $_POST['id_role'];
    updateRoleUser($id_users, $id_role);
    header('Location: ../../../userList.php');
} else {
    var_dump($_POST);
    echo 'Nous avont pas reçu le formulaire.';
}