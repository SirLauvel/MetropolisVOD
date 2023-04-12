<?php
require_once('function.php');

if(isset($_POST['deleteUser'])) {
    $id_actor = $_POST['id_users'];
    deleteUser($id_actor);
    header('Location: ../../../userList.php');
}