<?php
session_start();
if (!isset($_SESSION['account'])) {
    header('location: login.php');
};
require('assets/src/back/function.php');
$favoriteTable = getFavorite($_SESSION['account']['id_users']);
?>

<!doctype html>
<html>
<?php require('template/head.php'); ?>

<body class="h-screen bg-primary">
    <?php require('template/navbar.php'); ?>

    <main class="mt-[10v] h-[90vh] p-10">
        <div id="profil" class="flex flex-row flex-wrap justify-between gap-10">
            <div class="flex gap-5">
                <img class="w-20 h-20 rounded-full" src="<?= $_SESSION['account']['avatar'] ?>" alt="Large avatar">
                <div>
                    <h2 class="text-2xl text-white font-bold">
                        <?= $_SESSION['account']['pseudo'] ?>
                    </h2>
                    <ul class="text-white">
                        <li>
                            <?= $_SESSION['account']['name'] . " " . $_SESSION['account']['surname'] ?>
                        </li>
                        <li>
                            <?= $_SESSION['account']['email'] ?>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="text-white flex flex-wrap gap-10">
                <div class="flex flex-col justify-center items-center">
                    <h3 class="font-bold pb-3">Paramèretre - Profil</h3>
                    <ul>
                        <li><a href="#">Modifier mes informations Personnels</a></li>
                        <li><a href="#">Modifier mon mot de passe</a></li>
                        <li><a href="#">Modifier mon avatar</a></li>

                    </ul>
                </div>
                <div class="flex flex-col justify-center items-center">
                    <h3 class="font-bold pb-3">Paramèretre - Admin</h3>
                    <div class="flex gap-10">
                        <div>
                            <ul>
                                <li><a href="#">Liste du Top10</a></li>
                                <li><a href="#">Liste des films</a></li>
                                <li><a href="addMovie.php">Ajouter un nouveau film</a></li>

                            </ul>
                        </div>
                        <div>
                            <ul>
                                <li>
                                <li><a href="#">Liste des utilisateurs</a></li>
                                <li><a href="#">Liste des rôles</a></li>
                                <li><a href="#">Donner un rôle</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <hr class="my-10 border-secondary">
            <div id="favorite">
                <div class="pb-10 flex flex-col gap-5 sm:flex-row sm:gap-10">
                    <div>
                        <h2 class="text-white text-3xl font-bold">Liste des Favoris</h2>
                        <hr class="w-24 border-secondary">
                    </div>
                    <div>
                        <?php require('assets/src/component/categoryMenu.php'); ?>
                    </div>
                </div>
                <div class="flex flex-row justify-center flex-wrap gap-3">
                <?php 
                //var_dump($favoriteTable); ?>
                    <?php
                    foreach ($favoriteTable as $favorite) {
                        ?>
                        <a href="movie.php?id_movie=<?= $favorite['id_movie'] ?>"><img src="<?= $favorite['poster_movie'] ?>" alt="affiche_film" width="150px"
                                height="auto" /></a>
                        <?php
                    }
                    ?>
                </div>
            </div>
    </main>

    <?php require('template/footer.php'); ?>
</body>

</html>