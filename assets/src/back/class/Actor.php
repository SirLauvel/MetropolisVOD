<?php class Actor {

public static function addActor(string $name) {
    $bd = new PDO(
        'mysql:host=localhost;dbname=metropolisVOD;charset=utf8',
        'root',
        '',
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],
    );
    $req = "INSERT INTO `actor`(`name_actor`) VALUE(:name__actor)";
    $stmt = $bd->prepare($req);
    $stmt->execute([
        'name__actor' => $name,
    ]);
}
public static function getByMovie($id_movie){
    $bd = new PDO(
        'mysql:host=localhost;dbname=metropolisVOD;charset=utf8',
        'root',
        '',
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],
    );
    $req = "SELECT * FROM movie_actor AS l INNER JOIN actor AS d ON l.id_actor = d.id_actor WHERE id_movie = ?  ORDER BY name_actor";
    $stmt = $bd->prepare($req);
    $stmt->execute([$id_movie]);
    $actorTable = $stmt->fetchAll();

    return $actorTable;
}
public static function getAll()
{
    $bd = new PDO(
        'mysql:host=localhost;dbname=metropolisVOD;charset=utf8',
        'root',
        '',
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],
    );
    $req = "SELECT * FROM actor ORDER BY name_actor";
    $stmt = $bd->query($req);
    $stmt->execute();
    $realistorTable = $stmt->fetchAll();

    return $realistorTable;
}

public static function checkActor_movie($id_movie, $id_actor)
{
    $bd = new PDO(
        'mysql:host=localhost;dbname=metropolisVOD;charset=utf8',
        'root',
        '',
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],
    );
    $req = "SELECT EXISTS(SELECT * FROM movie_actor WHERE id_movie = :id_movie AND id_actor = :id_actor)";
    $stmt = $bd->prepare($req);
    $stmt->execute([
        'id_movie' => $id_movie,
        'id_actor' => $id_actor
    ]);
    $result = $stmt->fetch();
    var_dump($result);
    $okactor = false;
    if($result[0] != 0) {
        $okactor = true;
    }
    return $okactor;
}
public static function addActor_movie($id_movie, $id_actor)
    {
        $bd = new PDO(
            'mysql:host=localhost;dbname=metropolisVOD;charset=utf8',
            'root',
            '',
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],
        );
        $req = "INSERT INTO `movie_actor`(`id_movie`,`id_actor`) VALUE(:id_movie, :id_actor)";
        $stmt = $bd->prepare($req);
        $stmt->execute([
            'id_movie' => $id_movie,
            'id_actor' => $id_actor
        ]);
        $_SESSION['successMessage'] = 'addFilm';
        //header('Location: ../../../addMovie.php');
        ?>
        <script> location.replace("../../../addRessource_movie.php"); </script>
        <?php
    }
}