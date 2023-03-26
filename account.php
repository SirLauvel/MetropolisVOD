<?php
session_start();
if (!isset($_SESSION['account'])) {
    header('location: login.php');
}
;
?>

<!doctype html>
<html>
<?php require('template/head.php'); ?>

<body class="h-screen bg-primary">
    <?php require('template/navbar.php'); ?>

    <main class="min-h-[90vh] p-10">
        <div id="profil" class="flex justify-between">
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
            <div class="text-white flex gap-20">
                <div class="flex flex-col justify-center items-center">
                    <h3 class="font-bold pb-3">Profil</h3>
                    <ul>
                        <li><a href="#">Modifier mes informations Personnels</a></li>
                        <li><a href="#">Modifier mon mot de passe</a></li>
                        <li><a href="#">Modifier mon avatar</a></li>

                    </ul>
                </div>
                <div class="flex flex-col justify-center items-center">
                    <h3 class="font-bold pb-3">Admin</h3>
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
                <div class="pb-5 flex flex-col gap-5 sm:flex-row sm:gap-10">
                    <div>
                        <h2 class="text-white text-3xl font-bold">Liste des Favoris</h2>
                        <hr class="w-24 border-secondary">
                    </div>
                    <div>
                        <?php require('assets/src/component/categoryMenu.php'); ?>
                    </div>
                </div>
                <div>

                </div>
                <div class="flex flex-row justify-center flex-wrap gap-3">
                    <a href="#"><img src="assets/img/film/Animation/one-piece-film-red.jpg" alt="affiche_OnePieceRed"
                            width="150px" height="auto" /></a>
                    <a href="#"><img src="assets/img/film/Marvel/antman1.jfif" alt="" width="150px" height="auto" /></a>
                    <a href="#"><img src="assets/img/film/Marvel/antman2.jpg" alt="" width="150px" height="auto" /></a>
                    <a href="#"><img src="assets/img/film/Marvel/avengers1.jfif" alt="" width="150px"
                            height="auto" /></a>
                    <a href="#"><img src="assets/img/film/Marvel/avengers2.jfif" alt="" width="150px"
                            height="auto" /></a>
                    <a href="#"><img src="assets/img/film/Marvel/avengers3.jfif" alt="" width="150px"
                            height="auto" /></a>
                    <a href="#"><img src="assets/img/film/Marvel/avengers4.jfif" alt="" width="150px"
                            height="auto" /></a>
                </div>
            </div>
    </main>


    <?php require('template/footer.php'); ?>
</body>

</html>