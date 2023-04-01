<?php
session_start();
if (!isset($_SESSION['account'])) {
    header('location: index.php');
} elseif (isset($_SESSION['account'])) {
    if ($_SESSION['account']['id_role'] != 1) {
        header('location: index.php');
    }
}

//require_once('assets/src/back/class/Access.php');

require_once('assets/src/back/alertMessage.php');
require_once('assets/src/back/class/Movie.php');

$id_movie = $_GET['id_movie'];
$actorTable = Actor::getAll();
$categoryTable = Category::getAll();
$countryTable = Country::getAll();
$Movie = new Movie($id_movie);
$movie = $Movie->getMovie();
$producerTable = Producer::getAll();
$realisatorTable = Realisator::getAll();
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
                            class="flex w-full items-center text-blue-500 after:content-[''] after:w-full after:h-1 after:border-b after:border-4 after:inline-block after:border-blue-800">
                            <span
                                class="flex items-center justify-center w-10 h-10 bg-blue-100 rounded-full lg:h-12 lg:w-12 dark:bg-blue-800 shrink-0">
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 lg:w-6 lg:h-6 dark:text-gray-100"
                                    fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M10 2a1 1 0 00-1 1v1a1 1 0 002 0V3a1 1 0 00-1-1zM4 4h3a3 3 0 006 0h3a2 2 0 012 2v9a2 2 0 01-2 2H4a2 2 0 01-2-2V6a2 2 0 012-2zm2.5 7a1.5 1.5 0 100-3 1.5 1.5 0 000 3zm2.45 4a2.5 2.5 0 10-4.9 0h4.9zM12 9a1 1 0 100 2h3a1 1 0 100-2h-3zm-1 4a1 1 0 011-1h2a1 1 0 110 2h-2a1 1 0 01-1-1z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </span>
                        </li>
                        <li
                            class="flex w-full items-center after:content-[''] after:w-full after:h-1 after:border-b after:border-4 after:inline-block after:border-gray-700">
                            <span
                                class="flex items-center justify-center w-10 h-10 rounded-full lg:h-12 lg:w-12 bg-gray-700 shrink-0">
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 lg:w-6 lg:h-6 dark:text-gray-100"
                                    fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M10 2a1 1 0 00-1 1v1a1 1 0 002 0V3a1 1 0 00-1-1zM4 4h3a3 3 0 006 0h3a2 2 0 012 2v9a2 2 0 01-2 2H4a2 2 0 01-2-2V6a2 2 0 012-2zm2.5 7a1.5 1.5 0 100-3 1.5 1.5 0 000 3zm2.45 4a2.5 2.5 0 10-4.9 0h4.9zM12 9a1 1 0 100 2h3a1 1 0 100-2h-3zm-1 4a1 1 0 011-1h2a1 1 0 110 2h-2a1 1 0 01-1-1z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </span>
                        </li>
                        <li
                            class="flex w-full items-center after:content-[''] after:w-full after:h-1 after:border-b after:border-4 after:inline-block after:border-gray-700">
                            <span
                                class="flex items-center justify-center w-10 h-10 rounded-full lg:h-12 lg:w-12 bg-gray-700 shrink-0">
                                <svg aria-hidden="true" class="w-5 h-5 lg:w-6 lg:h-6 text-gray-100" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M10 2a1 1 0 00-1 1v1a1 1 0 002 0V3a1 1 0 00-1-1zM4 4h3a3 3 0 006 0h3a2 2 0 012 2v9a2 2 0 01-2 2H4a2 2 0 01-2-2V6a2 2 0 012-2zm2.5 7a1.5 1.5 0 100-3 1.5 1.5 0 000 3zm2.45 4a2.5 2.5 0 10-4.9 0h4.9zM12 9a1 1 0 100 2h3a1 1 0 100-2h-3zm-1 4a1 1 0 011-1h2a1 1 0 110 2h-2a1 1 0 01-1-1z"
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
                        <h2 class="text-2xl font-bold">Ajoute de Film</h2>
                        <?php require('assets/src/component/titleBar.php'); ?>
                    </div>
                    <form enctype="multipart/form-data" action="assets/src/back/udapteMovieTreatment.php" method="post">
                        <div class="flex flex-col gap-10">
                            <div id="step_1" class="">
                                <div
                                    class="flex flex-col sm:flex-row sm:justify-between sm:items-center sm:gap-10 gap-8">
                                    <div class="md:block sm:w-1/2 relative z-0">
                                        <input type="text" id="title_movie" name="title_movie"
                                            value="<?= $movie['title_movie'] ?>"
                                            class="block py-2.5 px-0 w-full text-lg text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-secondary peer"
                                            placeholder=" " />
                                        <label for="title_movie"
                                            class="absolute text-lg text-gray-900 font-medium duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-secondary peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                            Titre*</label>
                                        <p id="errorTitle" class="mt-2 text-sm text-red-600 dark:text-red-500"></p>
                                    </div>
                                    <div class="sm:w-1/2">
                                        <label for="duration_movie" class="text-lg text-gray-900 font-medium">
                                            Durée*</label>
                                        <input type="time" id="duration_movie" name="duration_movie" min="00:00"
                                            max="05:00" value="<?= $movie['duration_movie'] ?>"
                                            class="block py-0 px-0 text-lg text-gray-900 bg-transparent border-0 border-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-secondary peer"
                                            placeholder=" " />
                                        <p id="errorDuration" class="mt-2 text-sm text-red-600 dark:text-red-500"></p>
                                    </div>
                                </div>
                                <div class="w-full relative z-0">
                                    <textarea id="synopsis_movie" rows="3"
                                        class="block p-2.5 px-0 w-full text-lg text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-secondary peer"
                                        placeholder="<?= $movie['synopsis_movie'] ?>" name="synopsis_movie"></textarea>
                                    <label for="floating_standard"
                                        class="absolute text-lg text-gray-900 font-medium duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-secondary peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                        Synopsie*</label>
                                    <p id="errorSynopsis" class="mt-2 text-sm text-red-600 dark:text-red-500"></p>
                                </div>

                                <div
                                    class="flex flex-col sm:flex-row sm:justify-between sm:items-center sm:gap-10 gap-8">
                                    <div class="sm:w-1/2">
                                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                            for="small_size">
                                            Film* (vidéo)
                                        </label>
                                        <input
                                            class="block w-full mb-5 text-xs text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
                                            id="small_size" type="text" name="video_movie"
                                            value="<?= $movie['video_movie'] ?>">
                                        <p id="errorVideo" class="mt-2 text-sm text-red-600 dark:text-red-500"></p>
                                    </div>
                                    <div class="sm:w-1/2">
                                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                            for="small_size">
                                            Poster* (Image)
                                        </label>
                                        <input
                                            class="block w-full mb-5 text-xs text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
                                            id="small_size" type="file" name="poster_movie">
                                        <p id="errorPoster" class="mt-2 text-sm text-red-600 dark:text-red-500"></p>
                                    </div>
                                </div>
                                <div class="flex flex-col sm:flex-row sm:justify-between sm:gap-10 gap-8">
                                    <div class="sm:w-1/2">
                                        <label for="country"
                                            class="block mb-2 text-sm font-medium text-gray-900">Pays*</label>
                                        <select id="country" name="name_country"
                                            class="w-full focus:w-2/3 sm:focus:w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-secondary focus:border-secondary block p-2.5">
                                            <?php
                                            //Boucle des pays
                                            foreach ($countryTable as $country) {
                                                ?>
                                                <option value="<?= $country['name_country'] ?>" <?php if ($country == $movie['country_movie']) { ?> selected <?php } ?>><?= $country['name_country'] ?></option>
                                                <?php
                                            }
                                            ;
                                            ?>
                                        </select>
                                        <p id="errorCountry" class="mt-2 text-sm text-red-600 dark:text-red-500"></p>
                                    </div>
                                    <div class="relative sm:w-1/2">
                    <label for="dropdown_category" class="block mb-2 text-sm font-medium text-gray-900">Catégorie* (3
                      max)</label>
                    <button id="dropdown_category" data-dropdown-toggle="dropdown"
                      class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-secondary focus:border-secondary block p-2.5 flex justify-between items-center"
                      type="button">Catégorie<svg class="w-4 h-4 ml-2" aria-hidden="true" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                      </svg>
                    </button>
                    <!-- Dropdown menu -->
                    <div id="dropdown"
                      class="z-10 w-full hidden bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 ">
                      <ul class="h-40 overflow-y-auto p-3 text-sm text-gray-700 dark:text-gray-200"
                        aria-labelledby="dropdown_category">
                        <?php
                        //Boucle des Catégories
                        $i = 0;
                        foreach ($categoryTable as $category) {
                          ?>
                          <li>
                            <input id="<?= $category['name_category'] ?>" type="checkbox" name="category_movie[]"
                              value="<?= $category['id_category'] ?>" onclick="doInputCategory(this)" <?php if(array_search($category['name_category'], $movie['category_movie']) !== false) {?> checked <?php } ?>
                              class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="<?= $category['name_category'] ?>"
                              class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?= $category['name_category'] ?></label>
                          </li>
                          <?php
                        }
                        ;
                        ?>
                      </ul>
                    </div>
                    <div id="categoryContent" class="flex flex-wrap gap-2 italic text-sm"> </div>
                  </div>
                  <p id="errorCategory" class="mt-2 text-sm text-red-600 dark:text-red-500"></p>
                </div>
              </div>

              <div id="step_2" class="hidden">
                <div class="flex flex-col gap-10">
                  <div class="relative">
                    <label for="dropdown_realisator"
                      class="block mb-2 text-sm font-medium text-gray-900">Réalisateur</label>
                    <button id="dropdown_realisator" data-dropdown-toggle="dropdown_realisatorContent"
                      class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-secondary focus:border-secondary block p-2.5 flex justify-between items-center"
                      type="button">Réalisateur<svg class="w-4 h-4 ml-2" aria-hidden="true" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                        </path>
                      </svg>
                    </button>
                    <ul id="realisatorContent">
                    </ul>
                    <!-- Dropdown menu -->
                    <div id="dropdown_realisatorContent"
                      class="z-10 w-full hidden bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 ">
                      <ul class="h-40 overflow-y-auto p-3 text-sm text-gray-700 dark:text-gray-200"
                        aria-labelledby="dropdown_realisator">
                        <?php
                        //Boucle des Catégories
                        foreach ($realisatorTable as $realisator) {
                          ?>
                          <li>
                            <input id="<?= $realisator['name_realisator'] ?>" type="checkbox" name="realisator_movie[]"
                              value="<?= $realisator['id_realisator'] ?>" onclick="doInputRealisator(this)" <?php if(array_search($realisator['name_realisator'], $movie['realisator_movie']) !== false) {?> checked <?php } ?>
                              class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="<?= $realisator['name_realisator'] ?>"
                              class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?= $realisator['name_realisator'] ?></label>
                          </li>
                          <?php
                        }
                        ;
                        ?>
                      </ul>
                    </div>
                  </div>
                  <div class="relative">
                    <label for="dropdown_producer"
                      class="block mb-2 text-sm font-medium text-gray-900">Producteur</label>
                    <button id="dropdown_producer" data-dropdown-toggle="dropdown_producerContent"
                      class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-secondary focus:border-secondary block p-2.5 flex justify-between items-center"
                      type="button">Producteur<svg class="w-4 h-4 ml-2" aria-hidden="true" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                        </path>
                      </svg>
                    </button>
                    <ul id="producerContent">
                    </ul>
                    <!-- Dropdown menu -->
                    <div id="dropdown_producerContent"
                      class="z-10 w-full hidden bg-white divide-y divide-gray-100 rounded-lg shadow">
                      <ul class="h-60 w-full overflow-y-auto p-3 text-sm text-gray-700"
                        aria-labelledby="dropdown_producer">
                        <?php
                        //Boucle des Catégories
                        foreach ($producerTable as $producer) {
                          ?>
                          <li>
                            <input id="<?= $producer['name_producer'] ?>" type="checkbox" name="producer_movie[]"
                              value="<?= $producer['id_producer'] ?>" onclick="doInputProducer(this)" <?php if(array_search($producer['name_producer'], $movie['producer_movie']) !== false) {?> checked <?php } ?>
                              class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="<?= $producer['name_producer'] ?>"
                              class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?= $producer['name_producer'] ?></label>
                          </li>
                          <?php
                        }
                        ;
                        ?>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>

              <div id="step_3" class="hidden">
                <div class="relative">
                  <label for="dropdown_actor" class="block mb-2 text-xl font-medium text-gray-900">Acteur</label>
                  <button id="dropdown_actor" data-dropdown-toggle="dropdown_actorContent"
                    class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-secondary focus:border-secondary block p-2.5 flex justify-between items-center"
                    type="button">Acteur<svg class="w-4 h-4 ml-2" aria-hidden="true" fill="none" stroke="currentColor"
                      viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                  </button>
                  <p id="errorActor" class="mt-2 text-sm text-red-600 dark:text-red-500"></p>
                  <!-- Dropdown menu -->
                  <div id="dropdown_actorContent"
                    class="z-10 w-full hidden bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 ">
                    <ul class="h-40 overflow-y-auto p-3 text-sm text-gray-700 dark:text-gray-200"
                      aria-labelledby="dropdown_actor">
                      <?php
                      //Boucle des Catégories
                      var_dump($actorMovieBdd);
                      foreach ($actorTable as $actor) {
                        ?>
                        <li>
                          <input id="<?= $actor['name_actor'] ?>" type="checkbox" name="actor_movie[]"
                            value="<?= $actor['id_actor'] ?>" onclick="doInputActor(this)" <?php if(array_search($actor['name_actor'], $movie['actor_movie']) !== false) {?> checked <?php } ?>
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                          <label for="<?= $actor['name_actor'] ?>"
                            class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?= $actor['name_actor'] ?></label>
                        </li>
                        <?php
                      }
                      ;
                      ?>
                    </ul>
                  </div>
                </div>
                <div class="w-full flex flex-col">
                  <h3 class="text-xl font-medium pb-2">Rôle</h3>
                  <div id="roleContent">


                  </div>
                </div>
              </div>
              <div class="w-full">
                <div class="w-full flex justify-end">
                  <input id="btnStep1_next" type="button" onclick="step_2(this)"
                    class="text-sm text-white font-medium cursor-pointer px-8 py-2 text-center bg-secondary rounded-lg hover:bg-secondary/80 focus:ring-4 focus:outline-none focus:ring-azul"
                    value="Suivant">
                </div>
                <div class="w-full flex justify-between">
                  <input id="btnStep2_previous" type="button" onclick="step_1()"
                    class="hidden text-sm text-white font-medium cursor-pointer px-8 py-2 text-center bg-secondary rounded-lg hover:bg-secondary/80 focus:ring-4 focus:outline-none focus:ring-azul"
                    value="Précédent">
                  <input id="btnStep2_next" type="button" onclick="step_3()"
                    class="hidden text-sm text-white font-medium cursor-pointer px-8 py-2 text-center bg-secondary rounded-lg hover:bg-secondary/80 focus:ring-4 focus:outline-none focus:ring-azul"
                    value="Suivant">
                </div>
                <div class="w-full flex justify-between">
                  <input id="btnStep3_previous" type="button" onclick="step_2(this)"
                    class="hidden text-sm text-white font-medium cursor-pointer px-8 py-2 text-center bg-secondary rounded-lg hover:bg-secondary/80 focus:ring-4 focus:outline-none focus:ring-azul"
                    value="Précédent">
                  <button id="btnStep3_next" type="submit" name="addMovie"
                    class="hidden text-sm text-white font-medium cursor-pointer px-8 py-2 text-center bg-secondary rounded-lg hover:bg-secondary/80 focus:ring-4 focus:outline-none focus:ring-azul"
                    value="Suivant"> Ajouter
                  </button>
                </div>
                <button id="btn_step3" type="submit" name="addMovie"
                  class="hidden text-sm text-white font-medium cursor-pointer px-8 py-2 text-center bg-secondary rounded-lg hover:bg-secondary/80 focus:ring-4 focus:outline-none focus:ring-azul"
                  value="Suivant"> Ajouter
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </main>

 <?php require('template/footer.php'); ?>
</body>

</html>