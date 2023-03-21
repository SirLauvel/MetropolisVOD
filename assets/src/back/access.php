<?php 
$bd = new PDO(
    'mysql:host=localhost;dbname=metropolisVOD;charset=utf8',
    'root',
    '',
    [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],
);