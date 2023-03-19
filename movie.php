<!doctype html>
<html>
<?php require('template/head.php'); ?>

<body class="bg-primary">
    <?php require('template/navbar.php'); ?>
    <nav class="bg-black px-10 py-2.5 w-full"> <!--  fixed top-0 left-0 z-10 -->
        <div class="flex flex-wrap items-center justify-between">

            <div class="pb-5 flex flex-col gap-5 sm:flex-row sm:gap-10">
                <h2 class="text-white text-3xl font-bold">Film</h2>
                <?php require('assets/src/component/categoryMenu.php'); ?>
            </div>
        </div>
    </nav>

    <main class="min-h-[90vh] p-10">

        <div id="filmFlex" class="flex flex-row justify-center flex-wrap gap-3">
            <a href="#"><img src="assets/img/film/Animation/one-piece-film-red.jpg" alt="affiche_OnePieceRed"
                    width="150px" height="auto" /></a>
            <a href="#"><img src="assets/img/film/Marvel/antman1.jfif" alt="" width="150px" height="auto" /></a>
            <a href="#"><img src="assets/img/film/Marvel/antman2.jpg" alt="" width="150px" height="auto" /></a>
            <a href="#"><img src="assets/img/film/Marvel/avengers1.jfif" alt="" width="150px" height="auto" /></a>
            <a href="#"><img src="assets/img/film/Marvel/avengers2.jfif" alt="" width="150px" height="auto" /></a>
            <a href="#"><img src="assets/img/film/Marvel/avengers3.jfif" alt="" width="150px" height="auto" /></a>
            <a href="#"><img src="assets/img/film/Marvel/avengers4.jfif" alt="" width="150px" height="auto" /></a>
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