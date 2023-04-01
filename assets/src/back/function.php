<?php
function getBdd()
{
    $bd = new PDO(
        'mysql:host=localhost;dbname=metropolisVOD;charset=utf8',
        'root',
        '',
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],
    );
    return $bd;
}
// --------------------------------------- Actor ---------------------------------------

function addActor(string $name)
{
    $bd = getBdd();
    $req = "INSERT INTO `actor`(`name_actor`) VALUE(:name__actor)";
    $stmt = $bd->prepare($req);
    $stmt->execute([
        'name__actor' => $name,
    ]);
}

function getActorByMovie($id_movie)
{
    $bd = getBdd();
    $req = "SELECT * FROM movie_actor AS l INNER JOIN actor AS d ON l.id_actor = d.id_actor WHERE id_movie = ?  ORDER BY name_actor";
    $stmt = $bd->prepare($req);
    $stmt->execute([$id_movie]);
    $actorTable = $stmt->fetchAll();

    return $actorTable;
}

function getActorAll()
{
    $bd = getBdd();
    $req = "SELECT * FROM actor ORDER BY name_actor";
    $stmt = $bd->query($req);
    $stmt->execute();
    $realistorTable = $stmt->fetchAll();

    return $realistorTable;
}
function checkActor_movie($id_movie, $id_actor)
{
    $bd = getBdd();
    $req = "SELECT EXISTS(SELECT * FROM movie_actor WHERE id_movie = :id_movie AND id_actor = :id_actor)";
    $stmt = $bd->prepare($req);
    $stmt->execute([
        'id_movie' => $id_movie,
        'id_actor' => $id_actor
    ]);
    $result = $stmt->fetch();
    var_dump($result);
    $okactor = false;
    if ($result[0] != 0) {
        $okactor = true;
    }
    return $okactor;
}
function linkActor_movie($id_movie, $id_actor)
{
    $bd = getBdd();
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
// --------------------------------------- Category ---------------------------------------
function AddCategory(string $nameInput)
{
    $bd = getBdd();
    $req = "INSERT INTO `category`(`name_category`) VALUE(:name_category)";
    $stmt = $bd->prepare($req);
    $stmt->execute([
        'name_category' => $nameInput
    ]);
}
function getCategoryAll()
{
    $bd = getBdd();
    $req = "SELECT * FROM category";
    $stmt = $bd->query($req);
    $stmt->execute();
    $categoryTable = $stmt->fetchAll();

    return $categoryTable;
}
function getCategoryByMovie($id_movie)
{
    $bd = getBdd();
    $req = "SELECT name_category FROM movie_category AS l INNER JOIN category AS c ON l.id_category = c.id_category WHERE id_movie = :id_movie";
    $stmt = $bd->prepare($req);
    $stmt->execute(['id_movie' => $id_movie]);
    $categoryTable = $stmt->fetchAll();

    return $categoryTable;
}
function deleteCategory(int $id_category)
{
    $bd = getBdd();
    $req = "DELETE FROM category WHERE id_category = :id_category";
    $stmt = $bd->prepare($req);
    $stmt->execute([
        'id_category' => $id_category
    ]);
}

// --------------------------------------- Country ---------------------------------------
function addCountry(string $nameInput)
{
    $bd = getBdd();
    $req = "INSERT INTO `country`(`name_country`) VALUE(:name_country)";
    $stmt = $bd->prepare($req);
    $stmt->execute([
        'name_country' => $nameInput
    ]);
}
function getCountryAll()
{
    $bd = getBdd();
    $req = "SELECT * FROM country";
    $stmt = $bd->query($req);
    $stmt->execute();
    $countryTable = $stmt->fetchAll();

    return $countryTable;
}
function deleteCountry($id_country)
{
    $bd = getBdd();
    $req = "DELETE FROM country WHERE id_contry = :id_country";
    $stmt = $bd->prepare($req);
    $stmt->execute([
        'id_country' => $id_country
    ]);
}

// --------------------------------------- Favorite ------------------------------------
function checkFavorite($id_movie, $id_user)
{
    $bd = getBdd();
    $req = "SELECT * FROM wish WHERE id_users = :id_users AND id_movie = :id_movie";
    $stmt = $bd->prepare($req);
    $result = $stmt->execute([
        'id_users' => $id_user,
        'id_movie' => $id_movie
    ]);
    $result = $stmt->fetch();
    var_dump($result);
    if ($result) {
        deleteFavoreite($id_movie, $id_user);
    } else
        (
            addFavorite($id_movie, $id_user)
        );
}

function addFavorite($id_movie, $id_user)
{
    $bd = getBdd();
    $req = "INSERT INTO `wish`(`id_users`,`id_movie`) VALUE(:id_users, :id_movie)";
    $stmt = $bd->prepare($req);
    $stmt->execute([
        'id_users' => $id_user,
        'id_movie' => $id_movie
    ]);
}
function getFavorite($id_users)
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
function deleteFavoreite($id_movie, $id_user)
{
    $bd = getBdd();
    $req = "DELETE FROM wish WHERE id_users = :id_users AND id_movie = :id_movie";
    $stmt = $bd->prepare($req);
    $stmt->execute([
        'id_users' => $id_user,
        'id_movie' => $id_movie
    ]);
}
// --------------------------------------- Movie ---------------------------------------
function addMovie(array $movie)
{
    var_dump($movie);
    //$bd = Access::getBdd();
    $bd = getBdd();
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
            linkCategory($id_movie, $category);
        }

        // Insert Realisator
        foreach ($movie['realisator_movie[]'] as $realisator) {
            linkRealisator($id_movie, $realisator);
        }
        // Insert Producer
        foreach ($movie['producer_movie[]'] as $producer) {
            linkProducer($id_movie, $producer);
        }
        // Insert Actor
        foreach ($movie['actor_movie[]'] as $actor) {
            linkActor($id_movie, $actor['id_actor'], $actor['role_actor']);
        }

        $_SESSION['successMessage'] = 'addFilm';
        //header('Location: ../../../addMovie.php');
        /*
        ?>
        <script> location.replace("../../../addMovie.php"); </script>
        <?php */
    }
}
function getMovie(int $id_movie)
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

    $movie = [
        'title_movie' => $movieBdd['title_movie'],
        'synopsis_movie' => $movieBdd['synopsis_movie'],
        'poster_movie' => $movieBdd['poster_movie'],
        'video_movie' => $movieBdd['video_movie'],
        'score_movie' => $movieBdd['score_movie'],
        'country_movie' => $movieBdd['name_country'],
        'duration_movie' => $movieBdd['duration_movie'],
    ];
    if (isset($movieBdd['linkWiki_movie'])) {
        $movie += ['linkWiki_movie', $movieBdd['linkWiki_movie']];
    }
    // Récupeter les catégories
    $categoryTab = getCategoryByMovie($id_movie);
    $category_movie = [];
    foreach ($categoryTab as $category) {
        $category_movie[] = $category['name_category'];
    }
    $movie += ['category_movie' => $category_movie];
    //Récupérer les producteurs
    $producerTab = getProducerByMovie($id_movie);
    foreach ($producerTab as $producer) {
        $producer_movie[] = $producer['name_producer'];
    }
    $movie += ['producer_movie' => $producer_movie];
    //Récupérer les réalisateur
    $realisatorTab = getRealisatorByMovie($id_movie);
    foreach ($realisatorTab as $realisator) {
        $realisator_movie[] = $realisator['name_realisator'];
    }
    $movie += ['realisator_movie' => $realisator_movie];
    //Récupérer les acteurs
    $actorTab = getActorByMovie($id_movie);
    foreach ($actorTab as $actor) {
        $actor_movie[] = [
            'name_actor' => $actor['name_actor'],
            'photo_actor' => $actor['photo_actor'],
            'role_actor' => $actor['role_actor'],
        ];
    }
    $movie += ['actor_movie' => $actor_movie];

    return $movie;
}
function getMovieAll()
{
    $bd = getBdd();
    $req = "SELECT id_movie,title_movie,poster_movie FROM movie";
    $stmt = $bd->prepare($req);
    $stmt->execute();
    $movieTable = $stmt->fetchAll();

    return $movieTable;
}
function deleteMovie($id_movie)
{
    $bd = getBdd();
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
function linkCategory(int $id_movie, int $category_movie)
{
    $bd = getBdd();
    $req = "INSERT INTO `movie_category`(`id_movie`,`id_category`) VALUE(:id_movie, :id_category)";
    $stmt = $bd->prepare($req);
    $stmt->execute([
        'id_movie' => $id_movie,
        'id_category' => $category_movie,
    ]);
}

function linkRealisator(int $id_movie, int $realisator_movie)
{
    $bd = getBdd();
    $req = "INSERT INTO `movie_realisator`(`id_movie`,`id_realisator`) VALUE(:id_movie, :id_realisator)";
    $stmt = $bd->prepare($req);
    $stmt->execute([
        'id_movie' => $id_movie,
        'id_realisator' => $realisator_movie,
    ]);
}

function linkProducer(int $id_movie, int $producer_movie)
{
    $bd = getBdd();
    $req = "INSERT INTO `movie_producer`(`id_movie`,`id_producer`) VALUE(:id_movie, :id_producer)";
    $stmt = $bd->prepare($req);
    $stmt->execute([
        'id_movie' => $id_movie,
        'id_producer' => $producer_movie,
    ]);
}

function linkActor(int $id_movie, int $id_actor, string $role)
{
    $bd = getBdd();
    $req = "INSERT INTO `movie_actor`(`id_movie`,`id_actor`, `role_actor`) VALUE(?,?,?)";
    $stmt = $bd->prepare($req);
    $stmt->execute([$id_movie, $id_actor, $role]);
}
// --------------------------------------- Producer -------------------------------------
function addProducer(string $name)
{
    $bd = getBdd();
    $req = "INSERT INTO `producer`(`name_producer`) VALUE(:name__producer)";
    $stmt = $bd->prepare($req);
    $stmt->execute([
        'name__producer' => $name,
    ]);
}
function getProducerByMovie($id_movie)
{
    $bd = getBdd();
    $req = "SELECT d.name_producer FROM movie_producer AS l INNER JOIN producer AS d ON l.id_producer = d.id_producer WHERE l.id_movie = :id_movie ORDER BY d.name_producer";
    $stmt = $bd->prepare($req);
    $stmt->execute([
        'id_movie' => $id_movie,
    ]);
    $producerTable = $stmt->fetchAll();

    return $producerTable;
}
function getProducerAll()
{
    $bd = getBdd();
    $req = "SELECT * FROM producer ORDER BY name_producer";
    $stmt = $bd->query($req);
    $stmt->execute();
    $producerTable = $stmt->fetchAll();

    return $producerTable;
}
function checkProducer_movie($id_movie, $id_producer)
{
    $bd = getBdd();
    $req = "SELECT EXISTS(SELECT * FROM movie_producer WHERE id_movie = :id_movie AND id_producer = :id_producer)";
    $stmt = $bd->prepare($req);
    $stmt->execute([
        'id_movie' => $id_movie,
        'id_producer' => $id_producer
    ]);
    $result = $stmt->fetch();
    var_dump($result);
    $okproducer = false;
    if ($result[0] != 0) {
        $okproducer = true;
    }
    return $okproducer;
}
// --------------------------------------- Realisator -----------------------------------
function addRealisator(string $name)
{
    $bd = getBdd();
    $req = "INSERT INTO `realisator`(`name_realisator`) VALUE(:name__realisator)";
    $stmt = $bd->prepare($req);
    $stmt->execute([
        'name__realisator' => $name
    ]);
}
function getRealisatorByMovie($id_movie)
{
    $bd = getBdd();
    $req = "SELECT * FROM movie_realisator AS l INNER JOIN realisator AS d ON l.id_realisator = d.id_realisator WHERE id_movie = ? ORDER BY name_realisator";
    $stmt = $bd->prepare($req);
    $stmt->execute([$id_movie]);
    $realisatorTable = $stmt->fetchAll();

    return $realisatorTable;
}
function getRealisatorAll()
{
    $bd = getBdd();
    $req = "SELECT * FROM realisator ORDER BY name_realisator";
    $stmt = $bd->query($req);
    $stmt->execute();
    $realistorTable = $stmt->fetchAll();

    return $realistorTable;
}
function checkRealisator_movie($id_movie, $id_realisator)
{
    $bd = getBdd();
    $req = "SELECT EXISTS(SELECT * FROM movie_realisator WHERE id_movie = :id_movie AND id_realisator = :id_realisator)";
    $stmt = $bd->prepare($req);
    $stmt->execute([
        'id_movie' => $id_movie,
        'id_realisator' => $id_realisator
    ]);
    $result = $stmt->fetch();
    var_dump($result);
    $okRealisator = false;
    if ($result[0] != 0) {
        $okRealisator = true;
    }
    return $okRealisator;
}