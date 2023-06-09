<?php
session_start();
require_once('function.php');

//var_dump($_POST);
//var_dump($_FILES);

if (isset($_POST['updateMovie'])) {

    $movie = checkPost();
    //var_dump($movie);

    if ($movie) {
        var_dump('je suis pret !');
        updateMovie($movie);
    }
    ;

} else {
    echo 'errorForm';
    var_dump($_POST);
    // header('Location: ../../../addMovie.php');
}

function checkPost()
{
    $poster_movie = '';
    if (empty($_POST['synopsis_movie'])) {
        $_POST['synopsis_movie'] = $_POST['synopsis_bdd'];
    }

    $moviesOk = true;
    foreach ($_POST as $key => $movie) {
        if (is_string($movie)) {
            
            if (empty($movie)) {
                echo $key . " est vide.<br>";
                $moviesOk = false;
            }
        }
        if (is_array($movie)) {
            foreach ($movie as $keytab => $tab)
                if (empty($tab)) {
                    echo $key . " est vide. <br>";
                    $moviesOk = false;
                }
        }
    }


    if (isset($_POST['category_movie'])) {
        $number = count($_POST['category_movie']);
        if ($number < 1 || $number > 3) {
            $moviesOk = false;
            echo "Trop ou pas de catégorie";
        }
    } else if (!isset($_POST['category_movie'])) {
        $moviesOk = false;
    }
    if (!isset($_POST['actor_movie'])) {
        echo "Acteur est vide !";
        $moviesOk = false;
    }
    if (!isset($_POST['actor_movie'])) {
        echo "Producteur est vide !";
        $moviesOk = false;
    }
    if (!isset($_POST['realisator_movie'])) {
        echo "Realisateur est vide !";
        $moviesOk = false;
    }

    // Uploaded Image

    if (!empty($_FILES['poster_movie']['name']) && !empty($_FILES['poster_movie']['type'])) {

        $nameFile = $_FILES['poster_movie']['name'];
        $typeFile = $_FILES['poster_movie']['type'];
        $tmpFile = $_FILES['poster_movie']['tmp_name'];
        $errorFile = $_FILES['poster_movie']['error'];
        $sizeFile = $_FILES['poster_movie']['size'];

        $extensions = ['png', 'jpg', 'jpeg', 'gif', 'jfif'];
        $type = ['image/png', 'image/jpg', 'image/jpeg', 'image/gif', 'image/jfif'];

        $extension = explode('.', $nameFile);

        $max_size = 500000;

        if (in_array($typeFile, $type)) {
            if (count($extension) <= 2 && in_array(strtolower(end($extension)), $extensions)) {
                if ($sizeFile <= $max_size && $errorFile == 0) {
                    if (move_uploaded_file($tmpFile, $poster_movie = '../../img/upload/film/' . uniqid() . '.' . end($extension))) {
                        $poster_movie = str_replace("../../","assets/", $poster_movie);
                        echo "upload  effectué !";
                    } else {
                        echo 'failImageUpload';
                        $moviesOk = false;
                    }
                } else {
                    echo 'highImageWeight';
                    $moviesOk = false;
                }
            } else {
                echo 'notImage';
                $moviesOk = false;
            }
        } else {
            echo 'errorImageType';
            $moviesOk = false;
        }
    } else {
        $poster_movie = $_POST['poster_bdd'];
    }
    var_dump('-------------------');
    var_dump($moviesOk);
    var_dump('-------------------');

    if ($moviesOk) {
        $title_movie = htmlspecialchars(strip_tags($_POST['title_movie']));
        $synopsis_movie = htmlspecialchars(strip_tags($_POST['synopsis_movie']));
        $video_movie = htmlspecialchars(strip_tags($_POST['video_movie']));
        $duration_movie = htmlspecialchars(strip_tags($_POST['duration_movie']));
        $name_country = htmlspecialchars(strip_tags($_POST['name_country']));



        // Category
        $category_movie = [];

        foreach ($_POST['category_movie'] as $category) {
            $category_movie[] = (int) htmlspecialchars(strip_tags($category));
        }
        // Realisator
        $realisator_movie = [];

        foreach ($_POST['realisator_movie'] as $realisator) {
            $realisator_movie[] = (int) htmlspecialchars(strip_tags($realisator));
        }
        // Producer
        $producer_movie = [];
        foreach ($_POST['producer_movie'] as $producer) {
            $producer_movie[] = (int) htmlspecialchars(strip_tags($producer));

        }
        // Actor & Role
        $actor_movie = [];

        foreach ($_POST['actor_movie'] as $actor) {
            $actor_movie[] = (int) htmlspecialchars(strip_tags($actor));
        }

        $role_actor = [];

        foreach ($_POST['role_actor'] as $role) {
            $role_actor[] = htmlspecialchars(strip_tags($role));
        }

        $movies = [
            'id_movie' => $_POST['id_movie'],
            'title_movie' => $title_movie,
            'synopsis_movie' => $synopsis_movie,
            'duration_movie' => $duration_movie,
            'video_movie' => $video_movie,
            'poster_movie' => $poster_movie,
            'name_country' => $name_country, 
            'category_movie[]' => $category_movie,
            'realisator_movie[]' => $realisator_movie,
            'producer_movie[]' => $producer_movie,
            'actor_movie[]' => $actor_movie,
            'role_actor[]' => $role_actor,
             ];
        //var_dump($movies);

        return $movies;
    }
}