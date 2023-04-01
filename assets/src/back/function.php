<?php


function checkFavorite($id_movie, $id_user) {
    $bd = new PDO(
        'mysql:host=localhost;dbname=metropolisVOD;charset=utf8',
        'root',
        '',
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],
    );

    $req = "SELECT * FROM wish WHERE id_users = :id_users AND id_movie = :id_movie";
    $stmt = $bd->prepare($req);
    $result = $stmt->execute([
        'id_users' => $id_user,
        'id_movie' => $id_movie
    ]);
    $result = $stmt->fetch();
    var_dump($result);
    if($result) {
        deleteFavoreite($id_movie, $id_user);
    } else (
        addFavorite($id_movie, $id_user)
    );
}

function addFavorite($id_movie, $id_user) {
    $bd = new PDO(
        'mysql:host=localhost;dbname=metropolisVOD;charset=utf8',
        'root',
        '',
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],
    );

    $req = "INSERT INTO `wish`(`id_users`,`id_movie`) VALUE(:id_users, :id_movie)";
    $stmt = $bd->prepare($req);
    $stmt->execute([
        'id_users' => $id_user,
        'id_movie' => $id_movie
    ]);
}
 function deleteFavoreite($id_movie, $id_user) {
    $bd = new PDO(
        'mysql:host=localhost;dbname=metropolisVOD;charset=utf8',
        'root',
        '',
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],
    );

    $req = "DELETE FROM wish WHERE id_users = :id_users AND id_movie = :id_movie";
    $stmt = $bd->prepare($req);
    $stmt->execute([
        'id_users' => $id_user,
        'id_movie' => $id_movie
    ]);
 }