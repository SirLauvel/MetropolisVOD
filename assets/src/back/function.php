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
function updateActor(int $id_actor, string $name_actor)
{
    $bd = getBdd();
    $req = "UPDATE actor SET name_actor = ? WHERE id_actor = ?";
    $stmt = $bd->prepare($req);
    $stmt->execute([$name_actor, $id_actor]);
}
function deleteActor(int $id_actor)
{
    $bd = getBdd();
    $req = "DELETE FROM actor WHERE id_actor = ?";
    $stmt = $bd->prepare($req);
    $stmt->execute([$id_actor]);
}
// ----- Liaison ----- 
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
    //var_dump($result);
    $okactor = false;
    if ($result[0] != 0) {
        $okactor = true;
    }
    return $okactor;
}
function checkLinkMovie($id_actor)
{
    $bd = getBdd();
    $req = "SELECT title_movie FROM movie_actor AS a INNER JOIN movie AS m ON a.id_movie = m.id_movie WHERE a.id_actor = ?";
    $stmt = $bd->prepare($req);
    $stmt->execute([$id_actor]);
    $movieTable = $stmt->fetchAll();
    return $movieTable;
}
function getIdActor_movie($id_movie)
{
    $bd = getBdd();
    $req = "SELECT id_actor FROM movie_actor WHERE id_movie = ?";
    $stmt = $bd->prepare($req);
    $stmt->execute([$id_movie]);
    $results = $stmt->fetchAll();
    $actorTable = [];
    foreach ($results as $actor) {
        $actorTable[] = $actor[0];
    }

    return $actorTable;
}

function deleteLinkActor_Movie($id_movie, $id_actor)
{
    $bd = getBdd();
    $req = "DELETE FROM movie_actor WHERE id_movie = :id_movie AND id_actor = :id_actor";
    $stmt = $bd->prepare($req);
    $stmt->execute([
        'id_movie' => $id_movie,
        'id_actor' => $id_actor
    ]);
}
function checkRole($id_movie, $id_actor, $role)
{
    $bd = getBdd();
    $req = "SELECT EXISTS(SELECT * FROM movie_actor WHERE id_movie = :id_movie AND id_actor = :id_actor AND role_actor = :role_actor)";
    $stmt = $bd->prepare($req);
    $stmt->execute([
        'id_movie' => $id_movie,
        'id_actor' => $id_actor,
        'role_actor' => $role,
    ]);
    $result = $stmt->fetch();
    var_dump($result);
    $roleOk = false;
    if ($result[0] != 0) {
        $okactor = true;
    }
    return $roleOk;
}
function updateRole_actor($id_movie, $id_actor, $role)
{
    $bd = getBdd();
    $req = "UPDATE movie_actor SET role_actor = :role_actor WHERE id_movie = :id_movie AND id_actor = :id_actor";
    $stmt = $bd->prepare($req);
    $stmt->execute([
        'role_actor' => $role,
        'id_movie' => $id_movie,
        'id_actor' => $id_actor
    ]);
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
    $req = "SELECT * FROM category ORDER BY name_category";
    $stmt = $bd->query($req);
    $stmt->execute();
    $categoryTable = $stmt->fetchAll();

    return $categoryTable;
}

function updateCategory(int $id_category, string $name_category)
{
    $bd = getBdd();
    $req = "UPDATE category SET name_category = ? WHERE id_category = ?";
    $stmt = $bd->prepare($req);
    $stmt->execute([$name_category, $id_category]);
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
//----- Liaison ------
function getCategoryByMovie($id_movie)
{
    $bd = getBdd();
    $req = "SELECT * FROM movie_category AS l INNER JOIN category AS c ON l.id_category = c.id_category WHERE id_movie = :id_movie";
    $stmt = $bd->prepare($req);
    $stmt->execute(['id_movie' => $id_movie]);
    $categoryTable = $stmt->fetchAll();

    return $categoryTable;
}
function getIdCategory_movie($id_movie)
{
    $bd = getBdd();
    $req = "SELECT id_category FROM movie_category WHERE id_movie = ?";
    $stmt = $bd->prepare($req);
    $stmt->execute([$id_movie]);
    $result = $stmt->fetchAll();

    $categoryTable = [];
    foreach ($result as $category) {
        $categoryTable[] = $category[0];
    }

    return $categoryTable;
}
function checkCategory_movie($id_movie, $id_category)
{
    $bd = getBdd();
    $req = "SELECT EXISTS(SELECT * FROM movie_category WHERE id_movie = :id_movie AND id_category = :id_category)";
    $stmt = $bd->prepare($req);
    $stmt->execute([
        'id_movie' => $id_movie,
        'id_category' => $id_category
    ]);
    $result = $stmt->fetch();
    //var_dump($result);
    $okcategory = "";
    if ($result[0] != 0) {
        $okcategory = true;
    } else {
        $okcategory = false;
    }
    return $okcategory;
}
function deleteLinkCategory_Movie($id_movie, $id_category)
{
    $bd = getBdd();
    $req = "DELETE FROM movie_category WHERE id_movie = :id_movie AND id_category = :id_category";
    $stmt = $bd->prepare($req);
    $stmt->execute([
        'id_movie' => $id_movie,
        'id_category' => $id_category
    ]);
}
// --------------------------------------- Country ---------------------------------------
function addCountry(string $name_country)
{
    $bd = getBdd();
    $req = "INSERT INTO `country`(`name_country`) VALUE(:name_country)";
    $stmt = $bd->prepare($req);
    $stmt->execute([
        'name_country' => $name_country
    ]);
}
function getCountryAll()
{
    $bd = getBdd();
    $req = "SELECT * FROM country ORDER BY name_country";
    $stmt = $bd->query($req);
    $stmt->execute();
    $countryTable = $stmt->fetchAll();

    return $countryTable;
}
function updateCountry(int $id_country, string $name_country)
{
    $bd = getBdd();
    $req = "UPDATE country SET name_country = ? WHERE id_country = ?";
    $stmt = $bd->prepare($req);
    $stmt->execute([$name_country, $id_country]);
}
function deleteCountry($id_country)
{
    $bd = getBdd();
    $req = "DELETE FROM country WHERE id_country = :id_country";
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
        deleteFavorite($id_movie, $id_user);
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
function deleteFavorite($id_movie, $id_user)
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
        if (is_string($movie['category_movie[]'])) {
            linkCategory($id_movie, $movie['category_movie[]']);
        }
        if (is_array($movie['category_movie[]'])) {
            foreach ($movie['category_movie[]'] as $category) {
                linkCategory($id_movie, $category);
            }
        }

        // Insert Realisator
        if (is_string($movie['realisator_movie[]'])) {
            linkRealisator($id_movie, $movie['realisator_movie[]']);

        }
        if (is_array($movie['realisator_movie[]'])) {
            foreach ($movie['realisator_movie[]'] as $realisator) {
                linkRealisator($id_movie, $realisator);
            }
        }

        // Insert Producer
        if (is_string($movie['producer_movie[]'])) {
            linkProducer($id_movie, $movie['producer_movie[]']);

        }
        if (is_array($movie['producer_movie[]'])) {
            foreach ($movie['producer_movie[]'] as $producer) {
                linkProducer($id_movie, $producer);
            }
        }

        // Insert Actor
        foreach ($movie['actor_movie[]'] as $actor) {
            linkActor($id_movie, $actor['id_actor'], $actor['role_actor']);
        }


        $_SESSION['successMessage'] = 'addFilm';
        //header('Location: ../../../addMovie.php');
        
        ?>
        <script> location.replace("../../../addMovie.php"); </script>
        <?php 
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
        $category_movie[] = ['name_category' => $category['name_category'], 'id_category' => $category['id_category']];
    }
    $movie += ['category_movie' => $category_movie];
    //Récupérer les producteurs
    $producerTab = getProducerByMovie($id_movie);
    foreach ($producerTab as $producer) {
        $producer_movie[] = ['name_producer' => $producer['name_producer'], 'id_producer' => $producer['id_producer']];
    }
    $movie += ['producer_movie' => $producer_movie];
    //Récupérer les réalisateur
    $realisatorTab = getRealisatorByMovie($id_movie);
    foreach ($realisatorTab as $realisator) {
        $realisator_movie[] = ['name_realisator' => $realisator['name_realisator'], 'id_realisator' => $realisator['id_realisator']];
    }
    $movie += ['realisator_movie' => $realisator_movie];
    //Récupérer les acteurs
    $actorTab = getActorByMovie($id_movie);
    foreach ($actorTab as $actor) {
        $actor_movie[] = [
            'id_actor' => $actor['id_actor'],
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
function updateMovie($movie)
{
    $bd = getBdd();
    $req = "UPDATE movie SET title_movie = ?, synopsis_movie = ?, poster_movie = ?, video_movie = ?, duration_movie = ?,name_country = ? WHERE id_movie = ?";
    $stmt = $bd->prepare($req);
    $stmt->execute([$movie['title_movie'], $movie['synopsis_movie'], $movie['poster_movie'], $movie['video_movie'], $movie['duration_movie'], $movie['name_country'], $movie['id_movie']]);

    // Insert Category
    $category = $movie['category_movie[]'];
    if (is_string($movie['category_movie[]'])) {
        $category = [$movie['category_movie[]']];
    }

    $category_bdd = getIdCategory_movie($movie['id_movie']);
    $category_insert = $category;
    $category_delete = array_diff($category_bdd, $category_insert);
    $category_add = array_diff($category_insert, $category_bdd);



    if (!empty($category_delete)) {
        foreach ($category_delete as $deleteCategory) {
            deleteLinkCategory_Movie($movie['id_movie'], $deleteCategory);
        }
    }
    if (!empty($category_add)) {
        foreach ($category_add as $addCategory) {
            linkCategory($movie['id_movie'], $addCategory);
        }
    }

    // Insert Realisator
    $realisator = $movie['realisator_movie[]'];
    if (is_string($movie['realisator_movie[]'])) {
        $realisator = [$movie['realisator_movie[]']];
    }
    $realisator_bdd = getIdRealisator_movie($movie['id_movie']);
    $realisator_insert = $realisator;
    $realisator_delete = array_diff($realisator_bdd, $realisator_insert);
    $realisator_add = array_diff($realisator_insert, $realisator_bdd);

    if (!empty($realisator_delete)) {
        foreach ($realisator_delete as $deleteRealisator) {
            deleteLinkRealisator_Movie($movie['id_movie'], $deleteRealisator);
        }
    }
    if (!empty($realisator_add)) {
        foreach ($realisator_add as $addRealisator) {
            linkRealisator($movie['id_movie'], $addRealisator);
        }
    }

    // Insert Producer
    $producer = $movie['producer_movie[]'];
    if (is_string($movie['producer_movie[]'])) {
        $producer = [$movie['producer_movie[]']];
    }
    $producer_bdd = getIdProducer_movie($movie['id_movie']);
    $producer_insert = $producer;
    $producer_delete = array_diff($producer_bdd, $producer_insert);
    $producer_add = array_diff($producer_insert, $producer_bdd);

    if (!empty($producer_delete)) {
        foreach ($producer_delete as $deleteProducer) {
            deleteLinkProducer_Movie($movie['id_movie'], $deleteProducer);
        }
    }
    if (!empty($producer_add)) {
        foreach ($producer_add as $addProducer) {
            linkProducer($movie['id_movie'], $addProducer);
        }
    }

    // Insert Actor
    $actor = $movie['actor_movie[]'];
    if (is_string($movie['actor_movie[]'])) {
        $actor = [$movie['actor_movie[]']];
    }
    $actor_bdd = getIdActor_movie($movie['id_movie']);
    $actor_insert = $actor;
    $actor_delete = array_diff($actor_bdd, $actor_insert);
    $actor_add = array_diff($actor_insert, $actor_bdd);
    var_dump($movie['actor_movie[]']);
    var_dump($movie['role_actor[]']);

    $role_actor = array_combine($movie['actor_movie[]'], $movie['role_actor[]']);
    var_dump($role_actor);
    if (!empty($actor_delete)) {
        foreach ($actor_delete as $deleteActor) {
            deleteLinkActor_Movie($movie['id_movie'], $deleteActor);
        }
    }
    if (!empty($actor_add)) {
        foreach ($actor_add as $addActor) {
            var_dump($addActor);
            var_dump($role_actor[$addActor]);
            linkActor($movie['id_movie'], $addActor, $role_actor[$addActor]);
        }
    }
    foreach ($role_actor as $key => $role) {
        if (!checkRole($movie['id_movie'], (string) $key, $role)) {
            updateRole_actor($movie['id_movie'], (string) $key, $role);
        }
    }
    $_SESSION['successMessage'] = 'updateMovie';
    //header('Location: ../../../addMovie.php');

    /*?>
    <script> location.replace("../../../movieList_Admin.php"); </script>
    <?php*/

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
function getProducerAll()
{
    $bd = getBdd();
    $req = "SELECT * FROM producer ORDER BY name_producer";
    $stmt = $bd->query($req);
    $stmt->execute();
    $producerTable = $stmt->fetchAll();

    return $producerTable;
}
function updateProducer(int $id_producer, string $name_producer)
{
    $bd = getBdd();
    $req = "UPDATE producer SET name_producer = ? WHERE id_producer = ?";
    $stmt = $bd->prepare($req);
    $stmt->execute([$name_producer, $id_producer]);
}
function deleteProducer(int $id_producer)
{
    $bd = getBdd();
    $req = "DELETE FROM producer WHERE id_producer = ?";
    $stmt = $bd->prepare($req);
    $stmt->execute([$id_producer]);
}

// ----- Liason -----
function getProducerByMovie($id_movie)
{
    $bd = getBdd();
    $req = "SELECT d.name_producer,d.id_producer FROM movie_producer AS l INNER JOIN producer AS d ON l.id_producer = d.id_producer WHERE l.id_movie = :id_movie ORDER BY d.name_producer";
    $stmt = $bd->prepare($req);
    $stmt->execute([
        'id_movie' => $id_movie,
    ]);
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
    //var_dump($result);
    $okproducer = "";
    if ($result[0] != 0) {
        $okproducer = true;
    } else {
        $okproducer = false;
    }
    return $okproducer;
}
function getIdProducer_movie($id_movie)
{
    $bd = getBdd();
    $req = "SELECT id_producer FROM movie_producer WHERE id_movie = ?";
    $stmt = $bd->prepare($req);
    $stmt->execute([$id_movie]);
    $results = $stmt->fetchAll();
    $producerTable = [];
    foreach ($results as $producer) {
        $producerTable[] = $producer[0];
    }
    return $producerTable;
}

function deleteLinkProducer_Movie($id_movie, $id_producer)
{
    $bd = getBdd();
    $req = "DELETE FROM movie_producer WHERE id_movie = :id_movie AND id_producer = :id_producer";
    $stmt = $bd->prepare($req);
    $stmt->execute([
        'id_movie' => $id_movie,
        'id_producer' => $id_producer
    ]);
}
// --------------------------------------- Realisator -----------------------------------
function addRealisator(string $name_realisator)
{
    $bd = getBdd();
    $req = "INSERT INTO `realisator`(`name_realisator`) VALUE(:name_realisator)";
    $stmt = $bd->prepare($req);
    $stmt->execute([
        'name_realisator' => $name_realisator
    ]);
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
function updateRealisator(int $id_realisator, string $name_realisator)
{
    $bd = getBdd();
    $req = "UPDATE realisator SET name_realisator = ? WHERE id_realisator = ?";
    $stmt = $bd->prepare($req);
    $stmt->execute([$name_realisator, $id_realisator]);
}
function deleteRealisator(int $id_realisator)
{
    $bd = getBdd();
    $req = "DELETE FROM realisator WHERE id_realisator = ?";
    $stmt = $bd->prepare($req);
    $stmt->execute([$id_realisator]);
}
// ------ Liaison -----
function getRealisatorByMovie($id_movie)
{
    $bd = getBdd();
    $req = "SELECT d.id_realisator,d.name_realisator FROM movie_realisator AS l INNER JOIN realisator AS d ON l.id_realisator = d.id_realisator WHERE id_movie = ? ORDER BY name_realisator";
    $stmt = $bd->prepare($req);
    $stmt->execute([$id_movie]);
    $realisatorTable = $stmt->fetchAll();

    return $realisatorTable;
}
function getIdRealisator_movie($id_movie)
{
    $bd = getBdd();
    $req = "SELECT id_realisator FROM movie_realisator WHERE id_movie = ?";
    $stmt = $bd->prepare($req);
    $stmt->execute([$id_movie]);
    $results = $stmt->fetchAll();
    $realisatorTable = [];
    foreach ($results as $realisator) {
        $realisatorTable[] = $realisator[0];
    }
    return $realisatorTable;
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
    //var_dump($result);
    $okRealisator = false;
    if ($result[0] != 0) {
        $okRealisator = true;
    }
    return $okRealisator;
}
function deleteLinkRealisator_Movie($id_movie, $id_realisator)
{
    $bd = getBdd();
    $req = "DELETE FROM movie_realisator WHERE id_movie = :id_movie AND id_realisator = :id_realisator";
    $stmt = $bd->prepare($req);
    $stmt->execute([
        'id_movie' => $id_movie,
        'id_realisator' => $id_realisator
    ]);
}
// ----------------------------------------- Role -------------------------------------
function addRole($name_role)
{
    var_dump($name_role);
    $bd = getBdd();
    $req = "INSERT INTO `user_role`(`name_role`) VALUES (:name_role)";
    $stmt = $bd->prepare($req);
    $stmt->execute([
        'name_role' => $name_role,
    ]);
}
function updateRole($id_role, $name_role)
{
    $bd = getBdd();
    $req = "UPDATE user_role SET name_role = ? WHERE id_role = ?";
    $stmt = $bd->prepare($req);
    $stmt->execute([$name_role, $id_role]);
}
function getRoleAll()
{
    $bd = getBdd();
    $req = "SELECT * FROM user_role ORDER BY name_role";
    $stmt = $bd->prepare($req);
    $stmt->execute();
    $roleTable = $stmt->fetchAll();
    return $roleTable;
}
function deleteRole($id_role)
{
    $bd = getBdd();
    $req = "DELETE FROM user_role WHERE id_role = ?";
    $stmt = $bd->prepare($req);
    $stmt->execute([$id_role]);
}
// ----------------------------------------- User -------------------------------------
function addUser($user)
{
    $bd = getBdd();
    $req = "INSERT INTO `users` (`pseudo_users`,`email_users`,`password_users`,`name_users`,`surname_users`,`avatar_users`, `id_role`) 
    VALUES (:pseudo_users, :email_users, :password_users, :name_users, :surname_users, :avatar_users, :id_role)";
    $stmt = $bd->prepare($req);
    $stmt->execute([
        'pseudo_users' => $user['pseudo'],
        'email_users' => $user['email'],
        'password_users' => $user['password'],
        'name_users' => $user['name'],
        'surname_users' => $user['surname'],
        'avatar_users' => $user['avatar'],
        'id_role' => 2
    ]);
}

function getUser(string $pseudo)
{
    $bd = getBdd();
    $req = "SELECT * FROM users WHERE pseudo_users = :pseudo_users";
    $stmt = $bd->prepare($req);
    $stmt->execute(['pseudo_users' => $pseudo]);
    $account = $stmt->fetch();

    return $account;
}
function updateRoleUser($id_users, $id_role)
{
    $bd = getBdd();
    $req = "UPDATE users SET id_role = ? WHERE id_users = ?";
    $stmt = $bd->prepare($req);
    $stmt->execute([$id_role, $id_users]);
}
function getUserAll()
{
    $bd = getBdd();
    $req = "SELECT * FROM users INNER JOIN user_role ON users.id_role = user_role.id_role ORDER BY pseudo_users";
    $stmt = $bd->prepare($req);
    $stmt->execute();
    $userTable = $stmt->fetchAll();
    return $userTable;
}
function checkEmail($email)
{
    $bd = getBdd();

    $req = "SELECT email_users FROM users WHERE email_users = :email";
    $stmt = $bd->prepare($req);
    $stmt->execute(['email' => $email]);
    $emailOk = $stmt->fetch();
    var_dump($emailOk);

    return $emailOk;
}

function checkPseudo($pseudo)
{
    $bd = getBdd();
    $req = "SELECT pseudo_users FROM users WHERE pseudo_users = :pseudo";
    $stmt = $bd->prepare($req);
    $stmt->execute(['pseudo' => $pseudo]);
    $pseudoOk = $stmt->fetch();
    var_dump($pseudoOk);
    return $pseudoOk;
}
function checkPassword($id_users, $password)
{
    $bd = getBdd();
    $req = "SELECT password_users FROM users WHERE id_users = ?";
    $stmt = $bd->prepare($req);
    $stmt->execute([$id_users]);
    $result = $stmt->fetch();
    $password_users = $result['password_users'];
    if (password_verify($password, $password_users)) {
        return true;
    } else {
        return false;
    }
}
function updateUser($user)
{
    $bd = getBdd();
    $req = "UPDATE users SET name_users = ?,surname_users = ?,pseudo_users = ?,email_users= ?,avatar_users = ? WHERE id_users = ?";
    $stmt = $bd->prepare($req);
    $stmt->execute([$user['name_users'], $user['surname_users'], $user['pseudo_users'], $user['email_users'], $user['avatar_users'], $user['id_users']]);

}
function updatePassword($id_users, $newPassword)
{
    $newPasswordHash = password_hash($newPassword, PASSWORD_DEFAULT);
    $bd = getBDD();
    $req = "UPDATE users SET password_users = ? WHERE id_users = ?";
    $stmt = $bd->prepare($req);
    $stmt->execute([$newPasswordHash, $id_users]);
}
function deleteUser($id_user)
{
    $bd = getBdd();
    $req = "DELETE FROM users WHERE id_users = ? ";
    $stmt = $bd->prepare($req);
    $stmt->execute([$id_user]);
}