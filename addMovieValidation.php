<?php
session_start();
if (!isset($_SESSION['AddMovie_Step4'])) {
header('location: addMovie.php');
}

?>

<!doctype html>
<html>
<?php require('template/head.php'); ?>

<body class="bg-primary">
    <?php require('template/navbar.php'); ?>

    <main class="min-h-[90vh] mt-[10vh] p-5 w-full">
        <div class='w-full flex justify-center'>
            <div class='w-full md:w-2/3 lg:w-1/2 flex flex-col gap-10'>
                <div class="flex flex-col items-center">
                    <ol class="flex items-center w-full">
                        <li
                            class="flex w-full items-center text-green-500 after:content-[''] after:w-full after:h-1 after:border-b after:border-4 after:inline-block after:border-green-800">
                            <span
                                class="flex items-center justify-center w-10 h-10 rounded-full lg:h-12 lg:w-12 bg-green-600 shrink-0">
                                <svg aria-hidden="true" class="w-5 h-5 lg:w-6 lg:h-6 text-white" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>

                            </span>
                        </li>
                        <li
                            class="flex w-full items-center after:content-[''] after:w-full after:h-1 after:border-b after:border-4 after:inline-block border-green-500">
                            <span
                                class="flex items-center justify-center w-10 h-10 rounded-full lg:h-12 lg:w-12 bg-green-500 shrink-0">
                                <svg aria-hidden="true" class="w-5 h-5 lg:w-6 lg:h-6 text-white" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>

                            </span>
                        </li>
                        <li
                            class="flex w-full items-center after:content-[''] after:w-full after:h-1 after:border-b after:border-4 after:inline-block after:border-green-500">
                            <span
                                class="flex items-center justify-center w-10 h-10 rounded-full lg:h-12 lg:w-12 bg-green-500 shrink-0">
                                <svg aria-hidden="true" class="w-5 h-5 lg:w-6 lg:h-6 text-white" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>

                            </span>
                        </li>
                        <li class="flex items-center">
                            <span
                                class="flex items-center justify-center w-10 h-10 rounded-full lg:h-12 lg:w-12 bg-gray-700 shrink-0">
                                <svg aria-hidden="true" class="w-5 h-5 lg:w-6 lg:h-6 text-gray-100" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path>
                                    <path fill-rule="evenodd"
                                        d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm9.707 5.707a1 1 0 00-1.414-1.414L9 12.586l-1.293-1.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </span>
                        </li>
                    </ol>

                </div>
                <div class="p-5 bg-antiWhite border rounded-lg">
                    <div class="flex flex-col items-center">
                        <h2 class="text-2xl font-bold">Confimation Film</h2>
                        <?php require('assets/src/component/titleBar.php'); ?>
                    </div>
                    <div class="pb-5">
                        <h3 class="text-xl font-bold pb-2">Film Infos</h3>
                        <ul class="sm:grid sm:grid-cols-4 sm:gap-4 ml-5">
                            <li class="text-lg font-bold">Titre</li>
                            <li class="text-lg italic sm: col-span-3 ml-5 sm:ml-0">
                                <?= $movie['title_movie'] ?>
                            </li>

                            <li class="text-lg font-bold ">Synopsis</li>
                            <li class="text-lg italic sm: col-span-3 ml-5 sm:ml-0">
                                <?= $movie['synopsis_movie'] ?>
                            </li>

                            <li class="text-lg font-bold ">Durée</li>
                            <li class="text-lg italic sm: col-span-3 ml-5 sm:ml-0">
                                <?= $movie['duration_movie'] ?>
                            </li>

                            <li class="text-lg font-bold ">Url</li>
                            <li class="text-lg italic sm: col-span-3 ml-5 sm:ml-0">
                                <?= $movie['video_movie'] ?>
                            </li>

                            <li class="text-lg font-bold ">Affiche</li>
                            <li class="text-lg italic sm: col-span-3 ml-5 sm:ml-0">
                                <?= $movie['poster_movie'] ?>
                            </li>

                            <li class="text-lg font-bold ">Pays</li>
                            <li class="text-lg italic sm: col-span-3 ml-5 sm:ml-0">
                                <?= $movie['country_movie'] ?>
                            </li>

                            <li class="text-lg font-bold ">Catégorie</li>
                            <li class="text-lg italic sm: col-span-3 ml-5 sm:ml-0">
                                <ul>
                                    <?php
                                    foreach ($movie['category_movie'] as $category) { ?>
                                        <li>
                                            <?= $category ?>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="pb-5 flex flex-col sm:flex-row sm:justify-around sm:items-center">
                        <div>
                            <h3 class="text-xl font-bold pb-2">Réalisateur</h3>
                            <ul class="">
                                <?php
                                foreach ($movie['realisator_movie'] as $realisator) { ?>
                                    <li class="text-lg italic">
                                        <?= $realisator ?>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold pb-2">Producteur</h3>
                            <ul class="">
                                <?php
                                foreach ($movie['producer_movie'] as $producer) { ?>
                                    <li class="text-lg italic">
                                        <?= $producer ?>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold pb-2">Acteur</h3>
                        <ul class="grid grid-cols-2 gap-2 ml-5">
                            <?php
                            foreach ($movie['actor_movie'] as $actor) { ?>
                                <li class="text-lg font-bold"><?= $actor['name_actor'] ?></li>
                                <li class="text-lg italic">(<?= $actor['role_actor'] ?>)</li>
                            <?php } ?>

                        </ul>
                    </div>
                </div>
            </div>
    </main>

    <?php require('template/footer.php'); ?>
</body>

</html>