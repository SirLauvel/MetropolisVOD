<?php class producer {

private $name;
private $surname;

public static function addProducer(string $name) {
    $bd = new PDO(
        'mysql:host=localhost;dbname=metropolisVOD;charset=utf8',
        'root',
        '',
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],
    );
    $req = "INSERT INTO `producer`(`name_producer`) VALUE(:name__producer)";
    $stmt = $bd->prepare($req);
    $stmt->execute([
        'name__producer' => $name,
    ]);
}
public static function getByMovie($id_movie){
    $bd = new PDO(
        'mysql:host=localhost;dbname=metropolisVOD;charset=utf8',
        'root',
        '',
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],
    );
    $req = "SELECT d.name_producer FROM movie_producer AS l INNER JOIN producer AS d ON l.id_producer = d.id_producer WHERE l.id_movie = :id_movie ORDER BY d.name_producer";
    $stmt = $bd->prepare($req);
    $stmt->execute([
        'id_movie' => $id_movie,
    ]);
    $producerTable = $stmt->fetchAll();

    return $producerTable;
}
public static function getAll()
{
    $bd = new PDO(
        'mysql:host=localhost;dbname=metropolisVOD;charset=utf8',
        'root',
        '',
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],
    );
    $req = "SELECT * FROM producer ORDER BY name_producer";
    $stmt = $bd->query($req);
    $stmt->execute();
    $producerTable = $stmt->fetchAll();

    return $producerTable;
}

public static function checkProducer_movie($id_movie, $id_producer)
{
    $bd = new PDO(
        'mysql:host=localhost;dbname=metropolisVOD;charset=utf8',
        'root',
        '',
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],
    );
    $req = "SELECT EXISTS(SELECT * FROM movie_producer WHERE id_movie = :id_movie AND id_producer = :id_producer)";
    $stmt = $bd->prepare($req);
    $stmt->execute([
        'id_movie' => $id_movie,
        'id_producer' => $id_producer
    ]);
    $result = $stmt->fetch();
    var_dump($result);
    $okproducer = false;
    if($result[0] != 0) {
        $okproducer = true;
    }
    return $okproducer;
}
public static function addProducer_movie($id_movie, $id_producer)
    {
        $bd = new PDO(
            'mysql:host=localhost;dbname=metropolisVOD;charset=utf8',
            'root',
            '',
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],
        );
        $req = "INSERT INTO `movie_producer`(`id_movie`,`id_producer`) VALUE(:id_movie, :id_producer)";
        $stmt = $bd->prepare($req);
        $stmt->execute([
            'id_movie' => $id_movie,
            'id_producer' => $id_producer
        ]);
        $_SESSION['successMessage'] = 'addFilm';
        //header('Location: ../../../addMovie.php');
        ?>
        <script> location.replace("../../../addRessource_movie.php"); </script>
        <?php
    }
}