<?php
session_start();
require('assets/src/back/function.php');
//var_dump($_SESSION['account']);
$id_movie = $_GET['id_movie'];
$movie = getMovie($id_movie);
$movieTable = getMovieAll();
//var_dump($movie);
?>

<!doctype html>
<html>
<?php require('template/head.php'); ?>

<body class="bg-primary">
    <?php require('template/navbar.php'); ?>
    <main class="min-h-[90vh] mt-[10vh] px-10">
        <div class="mb-10 border-4 rounded-lg">
            <video class="w-full" autoplay muted controls>
                <source src="<?= $movie['video_movie'] ?>" type="video/mp4">
                Your browser does not support the video tag.
            </video>

        </div>
        <div class="">
            <p class="text-gray-400 text-md flex gap-3">
                <?php
                //var_dump($movie['category_movie']);
                foreach($movie['category_movie'] as $category) { ?>
                <a href="#"><?= $category['name_category'] ?> </a>
            <?php } ?>
            </p>
            <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                <h1 class="text-white text-4xl pb-5">
                    <?= $movie['title_movie'] ?>
                </h1>

                <div>
                    <?php if (isset($_SESSION['account'])) { ?>
                        <button type="button" id="btn_addFavorite"
                            onclick="favorite(<?= $_GET['id_movie'] ?>, <?= $_SESSION['account']['id_users'] ?>)">
                            <div class="flex items-center">
                                <div class="w-8 h-8text-secondary transition duration-75 group-hover:text-secondary">
                                    <img src="assets/img/icons/favorite.svg" alt="" />
                                </div>
                                <p class="ml-2 text-lg font-bold text-white">Favoris</p>
                            </div>
                        </button>
                    <?php }
                    ; ?>
                    <div class="flex items-center">
                        <svg aria-hidden="true" class="w-8 h-8" fill="#FF6B00" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <title>Rating star</title>
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                            </path>
                        </svg>
                        <p class="ml-2 text-md font-bold text-white">
                            <?= $movie['score_movie'] ?>
                        </p>
                    </div>
                    <div class="flex items-center">
                        <svg class="w-8 h-8 " fill="none" stroke="#FF6B00" stroke-width="1.5" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <p class="ml-2 text-md font-bold text-white">
                            <?= $movie['duration_movie'] ?>
                        </p>
                    </div>
                </div>
            </div>


            <p class="w-3/4 md:w-1/2 text-white text-md text-justify pb-20">
                <?= $movie['synopsis_movie'] ?>
            </p>
        </div>
        <div class="w-full pb-10 flex flex-col items-center">
            <div>
                <div class="w-full text-xl font-medium text-center text-gray-500">
                    <ul class="flex flex-wrap -mb-px" id="movieTab" data-tabs-toggle="#movieTabContent" role="tablist">
                        <li class="mr-2" role="presentation">
                            <button href="#" class="inline-block text-white p-4 rounded-t-lg border-b-2"
                                id="associated-tab" data-tabs-target="#associated" type="button" role="tab"
                                aria-controls="associated" aria-selected="false">Contenue
                                Associé</button>
                        </li>
                        <li class="mr-2" role="presentation">
                            <button href="#" class="inline-block text-white p-4 rounded-t-lg border-b-2" id="detail-tab"
                                data-tabs-target="#detail" type="button" role="tab" aria-controls="detail"
                                aria-selected="false" aria-current="page">Détails</button>
                        </li>
                        <li class="mr-2" role="presentation">
                            <button href="#" class="inline-block text-white p-4 rounded-t-lg border-b-2" id="actor-tab"
                                data-tabs-target="#actor" type="button" role="tab" aria-controls="actor"
                                aria-selected="false">Acteur
                            </button>
                        </li>
                        <li class="mr-2" role="presentation">
                            <button href="#" class="inline-block text-white p-4 rounded-t-lg border-b-2 "
                                id="comment-tab" data-tabs-target="#comment" type="button" role="tab"
                                aria-controls="comment" aria-selected="false">Commentaire
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="movieTabContent">

            <div class="text-white h-2/4" id="associated" role="tabpanel" aria-labelledby="associated-tab">
                <?php require('assets/src/component/slider.php'); ?>
            </div>
            <div class="text-white" id="detail" role="tabpanel" aria-labelledby="detail-tab">
                <ul>
                    <!--
                    <li class="pb-5 text-white font-bold text-2xl">Avertissement relatif au contenu</li>
                    <li class="pb-5 text-white text-lg">Des scènes, des propos ou des images peuvent heurter la
                        sensibilité des spectateurs</li>
                    -->
                    <li class="pb-5 text-white font-bold text-2xl">Réalisateur</li>
                    <li class="pb-5 text-white text-lg">
                        <?php
                        foreach ($movie['realisator_movie'] as $realisator) {
                            echo $realisator['name_realisator'] ?><br>
                            <?php
                        } ?>
                    </li>

                    <li class="pb-5 text-white font-bold text-2xl">Producteur</li>
                    <li class="pb-5 text-white text-lg">
                        <?php
                        foreach ($movie['producer_movie'] as $producer) {
                           echo  $producer['name_producer'] ?><br>
                                <?php } ?>
                    </li>

                    <li class="pb-5 text-white font-bold text-2xl">Origine</li>
                    <li class="pb-5 text-white text-lg"><a href="https://fr.wikipedia.org/wiki/Haruo_Sotozaki"
                            target="_blank"><?= $movie['country_movie'] ?></a></li>
                </ul>
            </div>
            <div class="text-white h-2/4" id="actor" role="tabpanel" aria-labelledby="actor-tab">
                <?php require('assets/src/component/actorSlider.php'); ?>

            </div>
            <div class="text-white" id="comment" role="tabpanel" aria-labelledby="comment-tab">
                content #4
            </div>
        </div>
    </main>
    <?php require('template/footer.php'); ?>
</body>

</html>