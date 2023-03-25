<?php
require('category.php');
class Movie
{
    // Properties
    private $movie = [
        'title_movie' => "",
        'linkWiki_movie' => "",
        'synopsis_movie' => "",
        'poster_movie' => "",
        'video_movie' => "",
        'country_movie' => "",
        'category_movie' => "",
        'realisator' => "",
        'director' => "",
        'producer' => "",
        'actor' => "",
        'comment' => ""
    ];

    // Methods
    function __contrust(int $id_movie)
    {

    }

    public static function addMovie(array $movie)
    {
        $bd = new PDO(
            'mysql:host=localhost;dbname=metropolisVOD;charset=utf8',
            'root',
            '',
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],
        );

        $req = "INSERT INTO `movie`(`title_movie`,`linkWiki_movie`,`synopsis_movie`,`poster_movie`,`video_movie`,`country_movie`) VALUE(:title_movie, :linkWiki_movie, :synopsis_movie, :poster_movie, :video_movie, :country_movie)";
        $stmt = $bd->prepare($req);
        $stmt->execute([
            'title_movie' => $movie['title_movie'],
            'linkWiki_movie' => $movie['linkWiki_movie'],
            'synopsis_movie' => $movie['synopsis_movie'],
            'poster_movie' => $movie['poster_movie'],
            'video_movie' => $movie['video_movie'],
            'country_movie' => $movie['country_movie'],
        ]);

        $req ="SELECT LAST_INSERT_ID() FROM movie";
        $stmt = $bd->prepare($req);
        $stmt->execute();
        $id_movie = $stmt->fetch();

        $categoryNumber = count($movie['category_movie']);

        for($i=0; $i < $categoryNumber;$i++) {
            Movie::addCategory($id_movie, $movie['category_movie'][$i]);
        } 
    }

    private static function addCategory(int $id_movie, int $category_movie) {
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
            'ide_category' => $category_movie
        ]);
    }
}