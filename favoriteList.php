<?php
session_start();
if (!isset($_SESSION['account'])) {
    header('location: login.php');
}
;
require('assets/src/back/function.php');
$favoriteTable = getFavorite($_SESSION['account']['id_users']);
?>

<!doctype html>
<html>
<?php require('template/head.php'); ?>

<body class="h-screen bg-primary">
    <?php require('template/navbar.php'); ?>

    <main class="mt-[10vh] min-h-[90vh] p-10">
        <div>
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
                        <a href="movie.php?id_movie=<?= $favorite['id_movie'] ?>"><img
                                src="<?= $favorite['poster_movie'] ?>" alt="affiche_film" width="150px" height="auto" /></a>
                        <?php
                    }
                    ?>
                </div>
            </div>
    </main>
    <?php require('template/footer.php'); ?>
</body>

</html>