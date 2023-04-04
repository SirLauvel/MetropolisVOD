<?php
session_start();
if (!isset($_SESSION['account'])) {
    header('location: index.php');
} elseif (isset($_SESSION['account'])) {
    if ($_SESSION['account']['id_role'] != 1) {
        header('location: index.php');
    }
}
require('assets/src/back/function.php');
$movieTable = getMovieAll();
?>
<!doctype html>
<html>
<?php require('template/head.php'); ?>

<body class="bg-primary">
    <?php require('template/navbar.php'); ?>
    <main class="min-h-[90vh] mt-[10vh] p-10">
        <nav class="px-10 py-2.5 w-full"> <!--  fixed top-0 left-0 z-10 -->
            <div class="flex flex-wrap items-center justify-between">
                <div class="pb-5 flex flex-col gap-5 sm:flex-row sm:gap-10">
                    <h2 class="text-white text-3xl font-bold">Film</h2>
                    <?php require('assets/src/component/categoryMenu.php'); ?>
                </div>
                <?php require('assets/src/component/switchList.php'); ?>
            </div>
        </nav>
        <div id="filmFlex" class="flex flex-row justify-center flex-wrap gap-3">
            <?php foreach ($movieTable as $movie) { ?>
                <a href="movie.php?id_movie=<?= $movie['id_movie'] ?>"><img src="<?= $movie['poster_movie'] ?>"
                        alt="affiche_film" width="150px" height="auto" /></a>
            <?php } ?>
        </div>
        <div class="filmSlider">
            <div class="pb-8">
                <h2 class="pb-2 text-white text-2xl font-bold">Action</h2>
                <?php require('assets/src/component/titleBar.php'); ?>
                <?php require('assets/src/component/slider.php'); ?>
            </div>
        </div>

    </main>

    <?php require('template/footer.php'); ?>
</body>

</html>