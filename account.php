<!doctype html>
<html>
<?php require('template/head.php'); ?>

<body class="h-screen bg-primary">
    <?php require('template/navbar.php'); ?>

    <main class="min-h-[90vh] p-10">
        <div id="profil" class="flex gap-5">
            <img class="w-20 h-20 rounded-full" src="assets/img/account/ducret_b.jpg" alt="Large avatar">
            <div>
                <h2 class="text-2xl text-white font-bold">Lauvel</h2>
                <ul class="text-white">
                    <li>Ducret Bryan</li>
                    <li>ducret.bryan@gmail.com</li>
                </ul>
            </div>
        </div>
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
                <a href="#"><img src="assets/img/film/Marvel/avengers1.jfif" alt="" width="150px" height="auto" /></a>
                <a href="#"><img src="assets/img/film/Marvel/avengers2.jfif" alt="" width="150px" height="auto" /></a>
                <a href="#"><img src="assets/img/film/Marvel/avengers3.jfif" alt="" width="150px" height="auto" /></a>
                <a href="#"><img src="assets/img/film/Marvel/avengers4.jfif" alt="" width="150px" height="auto" /></a>
            </div>
        </div>
    </main>


    <?php require('template/footer.php'); ?>
</body>

</html>