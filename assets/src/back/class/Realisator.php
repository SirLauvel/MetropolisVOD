<?php class Realisator
{

    private $name;

    public static function addRealisator_bdd(string $name)
    {
        $bd = new PDO(
            'mysql:host=localhost;dbname=metropolisVOD;charset=utf8',
            'root',
            '',
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],
        );
        $req = "INSERT INTO `realisator`(`name_realisator`) VALUE(:name__realisator)";
        $stmt = $bd->prepare($req);
        $stmt->execute([
            'name__realisator' => $name
        ]);
    }
    public static function getByMovie($id_movie){
        $bd = new PDO(
            'mysql:host=localhost;dbname=metropolisVOD;charset=utf8',
            'root',
            '',
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],
        );
        $req = "SELECT * FROM movie_realisator AS l INNER JOIN realisator AS d ON l.id_realisator = d.id_realisator WHERE id_movie = ? ORDER BY name_realisator";
        $stmt = $bd->prepare($req);
        $stmt->execute([$id_movie]);
        $realisatorTable = $stmt->fetchAll();
    
        return $realisatorTable;
    }
    public static function getAll()
    {
        $bd = new PDO(
            'mysql:host=localhost;dbname=metropolisVOD;charset=utf8',
            'root',
            '',
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],
        );
        $req = "SELECT * FROM realisator ORDER BY name_realisator";
        $stmt = $bd->query($req);
        $stmt->execute();
        $realistorTable = $stmt->fetchAll();

        return $realistorTable;
    }

    public static function checkRealisator_movie($id_movie, $id_realisator)
    {
        $bd = new PDO(
            'mysql:host=localhost;dbname=metropolisVOD;charset=utf8',
            'root',
            '',
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],
        );
        $req = "SELECT EXISTS(SELECT * FROM movie_realisator WHERE id_movie = :id_movie AND id_realisator = :id_realisator)";
        $stmt = $bd->prepare($req);
        $stmt->execute([
            'id_movie' => $id_movie,
            'id_realisator' => $id_realisator
        ]);
        $result = $stmt->fetch();
        var_dump($result);
        $okRealisator = false;
        if($result[0] != 0) {
            $okRealisator = true;
        }
        return $okRealisator;
    }

    public static function addRealisator_movie($id_movie, $id_realisator)
    {
        $bd = new PDO(
            'mysql:host=localhost;dbname=metropolisVOD;charset=utf8',
            'root',
            '',
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],
        );
        $req = "INSERT INTO `movie_realisator`(`id_movie`,`id_realisator`) VALUE(:id_movie, :id_realisator)";
        $stmt = $bd->prepare($req);
        $stmt->execute([
            'id_movie' => $id_movie,
            'id_realisator' => $id_realisator
        ]);
        $_SESSION['successMessage'] = 'addFilm';
        //header('Location: ../../../addMovie.php');
        ?>
        <script> location.replace("../../../addRealisator_movie.php"); </script>
        <?php
    }
}