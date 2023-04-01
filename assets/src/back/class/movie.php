<?php
//require('Access.php');
require('Actor.php');
require('Category.php');
require('Country.php');
require('Producer.php');
require('Realisator.php');

class Movie
{
    // Properties
    private $title_movie;
    private $linkWiki_movie;
    private $synopsis_movie;
    private $poster_movie;
    private $video_movie;
    private $duration_movie;
    private $country_movie;
    private $category_movie = [];
    private $realisator_movie = [];
    private $producer_movie = [];
    private $actor_movie = [];
    private $comment_movie = [];

    // Methods
    public function __construct(int $id_movie)
    {
        $bd = new PDO(
            'mysql:host=localhost;dbname=metropolisVOD;charset=utf8',
            'root',
            '',
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],
        );
        var_dump($bd);
        $req = "SELECT * FROM movie WHERE id_movie = :id_movie";
        $stmt = $bd->prepare($req);
        $stmt->execute(['id_movie' => $id_movie]);
        $movieBdd = $stmt->fetch();

        $this->title_movie = $movieBdd['title_movie'];
        $this->synopsis_movie = $movieBdd['synopsis_movie'];
        $this->poster_movie = $movieBdd['poster_movie'];
        $this->video_movie = $movieBdd['video_movie'];
        $this->country_movie = $movieBdd['name_country'];
        $this->duration_movie = $movieBdd['duration_movie'];
        if (isset($movieBdd['linkWiki_movie'])) {
            $this->linkWiki_movie = $movieBdd['linkWiki_movie'];
        }
        // Récupeter les catégories
        $categoryTab = Category::getByMovie($id_movie);
        foreach ($categoryTab as $category) {
            $this->category_movie[] = $category['name_category'];
        }
        //Récupérer les producteurs
        $producerTab = Producer::getByMovie($id_movie);
        foreach ($producerTab as $producer) {
            $this->producer_movie[] = $producer['name_producer'];
        }
        //Récupérer les réalisateur
        $realisatorTab = Realisator::getByMovie($id_movie);
        foreach ($realisatorTab as $realisator) {
            $this->realisator_movie[] = $realisator['name_realisator'];
        }
        //Récupérer les acteurs
        $actorTab = Actor::getByMovie($id_movie);
        foreach ($actorTab as $actor) {
            $this->actor_movie[] = [
                'name_actor' => $actor['name_actor'],
                'photo_actor' => $actor['photo_actor'],
                'role_actor' => $actor['role_actor'],
            ];
        }
        ;
    }

    public static function addMovie(array $movie)
    {
        var_dump($movie);
        //$bd = Access::getBdd();
        $bd = new PDO(
            'mysql:host=localhost;dbname=metropolisVOD;charset=utf8',
            'root',
            '',
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],
        );
        $req = "INSERT INTO `movie`(`title_movie`, `synopsis_movie`,`poster_movie`,`video_movie`, `duration_movie`, `score_movie`,`noteNumber`,`name_country`) VALUE(?,?,?,?,?,?,?,?)";
        $stmt = $bd->prepare($req);
        $stmt->execute([$movie['title_movie'], $movie['synopsis_movie'], $movie['poster_movie'], $movie['video_movie'], $movie['duration_movie'], 0, 0, $movie['name_country']]);

        $req = "SELECT LAST_INSERT_ID()";
        $stmt = $bd->prepare($req);
        $stmt->execute();
        $id_movie = $stmt->fetch();
        $id_movie = (int) $id_movie['LAST_INSERT_ID()'];
        var_dump($id_movie);

        if ($id_movie > 0) {
            // Insert Category
            foreach ($movie['category_movie[]'] as $category) {
                Movie::addCategory($id_movie, $category);
            }

            // Insert Realisator
            foreach ($movie['realisator_movie[]'] as $realisator) {
                Movie::addRealisator($id_movie, $realisator);
            }
            // Insert Producer
            foreach ($movie['producer_movie[]'] as $producer) {
                Movie::addProducer($id_movie, $producer);
            }
            // Insert Actor
            foreach ($movie['actor_movie[]'] as $actor) {
                Movie::addActor($id_movie, $actor['id_actor'], $actor['role_actor']);
            }

            $_SESSION['successMessage'] = 'addFilm';
            //header('Location: ../../../addMovie.php');
            /*
            ?>
            <script> location.replace("../../../addMovie.php"); </script>
            <?php */
        }
    }

    private static function addCategory(int $id_movie, int $category_movie)
    {
        $bd = new PDO(
            'mysql:host=localhost;dbname=metropolisVOD;charset=utf8',
            'root',
            '',
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],
        );
        $req = "INSERT INTO `movie_category`(`id_movie`,`id_category`) VALUE(:id_movie, :id_category)";
        $stmt = $bd->prepare($req);
        $stmt->execute([
            'id_movie' => $id_movie,
            'id_category' => $category_movie,
        ]);
    }

    private static function addRealisator(int $id_movie, int $realisator_movie)
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
            'id_realisator' => $realisator_movie,
        ]);
    }

    private static function addProducer(int $id_movie, int $producer_movie)
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
            'id_producer' => $producer_movie,
        ]);
    }

    private static function addActor(int $id_movie, int $id_actor, string $role)
    {
        $bd = new PDO(
            'mysql:host=localhost;dbname=metropolisVOD;charset=utf8',
            'root',
            '',
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],
        );
        $req = "INSERT INTO `movie_actor`(`id_movie`,`id_actor`, `role_actor`) VALUE(?,?,?)";
        $stmt = $bd->prepare($req);
        $stmt->execute([$id_movie, $id_actor, $role]);
    }

    public function getMovie()
    {
        return [
            'actor_movie' => $this->actor_movie,
            'category_movie' => $this->category_movie,
            'country_movie' => $this->country_movie,
            'duration_movie' => $this->duration_movie,
            'noteNumber' => 0,
            'poster_movie' => $this->poster_movie,
            'producer_movie' => $this->producer_movie,
            'realisator_movie' => $this->realisator_movie,
            'score_movie' => 0,
            'synopsis_movie' => $this->synopsis_movie,
            'title_movie' => $this->title_movie,
            'video_movie' => $this->video_movie,
        ];
    }

    public static function getAll()
    {
        $bd = new PDO(
            'mysql:host=localhost;dbname=metropolisVOD;charset=utf8',
            'root',
            '',
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],
        );
        $req = "SELECT id_movie,title_movie,poster_movie FROM movie";
        $stmt = $bd->prepare($req);
        $stmt->execute();
        $movieTable = $stmt->fetchAll();

        return $movieTable;
    }

    public static function getbyUser($id_users)
    {
        $bd = new PDO(
            'mysql:host=localhost;dbname=metropolisVOD;charset=utf8',
            'root',
            '',
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],
        );
        $req = "SELECT * FROM wish AS l INNER JOIN movie AS f ON l.id_movie = f.id_movie WHERE l.id_users = :id_users";
        $stmt = $bd->prepare($req);
        $stmt->execute([
            'id_users' => $id_users,
        ]);
        $favoriteTable = $stmt->fetchAll();

        return $favoriteTable;
    }

    public static function deleteMovie($id_movie)
    {
        $bd = new PDO(
            'mysql:host=localhost;dbname=metropolisVOD;charset=utf8',
            'root',
            '',
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],
        );
        $req = "DELETE m,r,p,u,c,a FROM movie AS m
                    LEFT JOIN movie_realisator AS r ON m.id_movie = r.id_movie
                    LEFT JOIN movie_producer AS p ON M.id_movie = p.id_movie
                    LEFT JOIN movie_comment AS u ON m.id_movie = u.id_movie
                    LEFT JOIN movie_category AS c ON m.id_movie = c.id_movie
                    LEFT JOIN movie_actor AS a ON m.id_movie = a.id_movie
                WHERE m.id_movie = ?";
        $stmt = $bd->prepare($req);
        
        if (is_array($id_movie)) {
            foreach ($id_movie as $id) {
                $stmt->execute([$id]);
            }
        } elseif (is_string($id_movie)) {
            $stmt->execute([$id_movie]);
        }

    }
}