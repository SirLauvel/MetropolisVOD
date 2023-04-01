<div class="sm:hidden">
    <swiper-container class="my-thumbs" slides-per-view="1.5" rewind="true" spaceBetween="20">
        <?php foreach ($movieTable as $movie_slide) {
            ?>
            <swiper-slide>
                <a href="movie.php?id_movie=<?= $movie_slide['id_movie'] ?>"><img src="<?= $movie_slide['poster_movie'] ?>" alt="affiche_film" width="200px" /></a>

            </swiper-slide>
            <?php
        }
        ?>
    </swiper-container>
</div>

<!-- Mobile -->
<div class="hidden sm:block md:hidden">
    <swiper-container class="my-thumbs" slides-per-view="2.5" rewind="true" spaceBetween="20">
        <?php foreach ($movieTable as $movie_slide) {
            ?>
            <swiper-slide>
                <a href="movie.php?id_movie=<?= $movie_slide['id_movie'] ?>"><img src="<?= $movie_slide['poster_movie'] ?>" alt="affiche_film" width="200px" /></a>

            </swiper-slide>role_movie
            <?php
        }
        ?>
    </swiper-container>
</div>

<!-- Tablette -->

<div class="hidden md:block lg:hidden">
    <swiper-container class="my-thumbs" slides-per-view="3.5" rewind="true" spaceBetween="20">
        <?php foreach ($movieTable as $movie_slide) {
            ?>
            <swiper-slide>
                <a href="movie.php?id_movie=<?= $movie_slide['id_movie'] ?>"><img src="<?= $movie_slide['poster_movie'] ?>" alt="affiche_film" width="200px" /></a>

            </swiper-slide>
            <?php
        }
        ?>
    </swiper-container>
</div>

<!-- Destock -->

<div class="hidden lg:block xl:hidden">
    <swiper-container class="my-thumbs" slides-per-view="4" rewind="true" spaceBetween="20">
        <?php foreach ($movieTable as $movie_slide) {
            ?>
            <swiper-slide>
                <a href="movie.php?id_movie=<?= $movie_slide['id_movie'] ?>"><img src="<?= $movie_slide['poster_movie'] ?>" alt="affiche_film" width="200px" /></a>

            </swiper-slide>
            <?php
        }
        ?>
    </swiper-container>
</div>

<!-- Screen Xl-->

<div class="hidden xl:block">
    <swiper-container class="my-thumbs" slides-per-view="6.5" rewind="true" spaceBetween="20">
        <?php foreach ($movieTable as $movie_slide) {
            ?>
            <swiper-slide>
                <a href="movie.php?id_movie=<?= $movie_slide['id_movie'] ?>"><img src="<?= $movie_slide['poster_movie'] ?>" alt="affiche_film" width="200px" /></a>

            </swiper-slide>
            <?php
        }
        ?>
    </swiper-container>
</div>