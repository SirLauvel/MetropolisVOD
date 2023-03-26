<?php
require('Access.php');
require('Category.php');
require('Country.php');

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
    private $realisator = [];
    private $director = [];
    private $producer = [];
    private $actor = [];
    private $comment = [];

    // Methods
    public function __construct(int $id_movie)
    {
        $bd = Access::getBdd();
        $req = "SELECT * FROM movie AS m LEFT JOIN country AS p ON m.id_country = p.id_country WHERE id_movie = :id_movie";
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
            $this->category_movie = $category;
        }

    }

    public static function addMovie(array $movie)
    {
        $bd = Access::getBdd();
        $req = "INSERT INTO `movie`(`title_movie`, `synopsis_movie`,`poster_movie`,`video_movie`, `duration_movie`, `score_movie`,`noteNumber`,`id_country`) VALUE(:title_movie, :synopsis_movie, :poster_movie, :video_movie, :duration_movie, :score_movie, :noteNumber, :id_country)";
        $stmt = $bd->prepare($req);
        $stmt->execute([
            'title_movie' => $movie['title_movie'],
            'synopsis_movie' => $movie['synopsis_movie'],
            'poster_movie' => $movie['poster_movie'],
            'video_movie' => $movie['video_movie'],
            'duration_movie' => $movie['duration_movie'],
            'score_movie' => 0,
            'noteNumber' => 0,
            'id_country' => $movie['id_country'],
        ]);

        $req = "SELECT LAST_INSERT_ID() FROM movie";
        $stmt = $bd->prepare($req);
        $stmt->execute();
        $id_movie = $stmt->fetch();
        var_dump($id_movie);

        $id_movie = (int) $id_movie['id_LAST_INSERT_ID()'];
        var_dump($id_movie);


        foreach($movie['category_movie'] as $category) {
            Movie::addCategory($id_movie, $category);
        }

        //$categoryNumber = count($movie['category_movie']);
        //for ($i = 0; $i < $categoryNumber; $i++) {}

        $_SESSION['successMessage'] = 'addFilm';
        ?>
        <script> location.replace("../../../addMovie.php"); </script>
        <?php
    }

    private static function addCategory(int $id_movie, int $category_movie)
    {
        $bd = Access::getBdd();
        $req = "INSERT INTO `movie_category`(`id_movie`,`id_category`) VALUE(:id_movie, :id_category)";
        $stmt = $bd->prepare($req);
        $stmt->execute([
            'id_movie' => $id_movie,
            'id_category' => $category_movie,
        ]);
    }

    public function getMovie(){
        return [
            'title_movie' => $this->title_movie,
            'duration_movie' => $this->duration_movie,
            'synopsis_movie' => $this->synopsis_movie,
            'poster_movie' => $this->poster_movie,
            'video_movie' => $this->video_movie,
            'score_movie' => 0,
            'noteNumber' => 0,
            'country_movie' => $this->country_movie,
            'category_movie' => $this->category_movie
        ];
    }
}