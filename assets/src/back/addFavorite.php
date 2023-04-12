<?php 
require('function.php');

if ($_POST['action'] == 'btn_favorite') {
    checkFavorite($_POST['id_movie'], $_POST['id_users']);
};