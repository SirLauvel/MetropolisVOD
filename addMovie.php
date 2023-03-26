<?php
session_start();
if (!isset($_SESSION['account'])) {
  header('location: index.php');
} elseif (isset($_SESSION['account'])) {
  if ($_SESSION['account']['id_role'] != 1) {
    header('location: index.php');
  }
}

require_once('assets/src/back/alertMessage.php');
require_once('assets/src/back/class/Country.php');
require_once('assets/src/back/class/Category.php');

$countryTable = Country::getAll();
$categoryTable = Category::getAll();
?>
<!doctype html>
<html>
<?php require('template/head.php'); ?>

<body class="bg-primary">
  <?php require('template/navbar.php'); ?>

  <main class="p-5 flex justify-center items-center">
    <div class="p-5 bg-antiWhite border rounded-lg">
      <div class="flex flex-col items-center">
        <h2 class="text-2xl font-bold">Ajoute de Film</h2>
        <?php require('assets/src/component/titleBar.php'); ?>
      </div>
      <form class="flex flex-col gap-8" action="assets/src/back/addMovieTreatment.php" method="post">
        <!--enctype="multipart/form-data"-->
        <?= $messageAlert ?>
        <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center sm:gap-10 gap-8">
          <div class="sm:w-1/2 relative z-0">
            <input type="text" id="title_movie" name="title_movie"
              class="block py-2.5 px-0 w-full text-lg text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-secondary peer"
              placeholder=" " />
            <label for="title_movie"
              class="absolute text-lg text-gray-900 font-medium duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-secondary peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
              Titre*</label>
          </div>
          <div class="sm:w-1/2">
          <label for="duration_movie"
              class="text-lg text-gray-900 font-medium">
              Durée*</label>
            <input type="time" id="duration_movie" name="duration_movie" min="00:00" max="05:00"
              class="block py-0 px-0 text-lg text-gray-900 bg-transparent border-0 border-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-secondary peer"
              placeholder=" " />
          </div>
        </div>
        <div class="w-full relative z-0">
          <textarea id="synopsis_movie" rows="3"
            class="block p-2.5 px-0 w-full text-lg text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-secondary peer"
            placeholder=" " name="synopsis_movie"></textarea>
          <label for="floating_standard"
            class="absolute text-lg text-gray-900 font-medium duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-secondary peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
            Synopsie*</label>
        </div>

        <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center sm:gap-10 gap-8">
          <div class="sm:w-1/2">
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="small_size">
              Film* (vidéo)
            </label>
            <input
              class="block w-full mb-5 text-xs text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
              id="small_size" type="text" name="video_movie">
          </div>
          <div class="sm:w-1/2">
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="small_size">
              Poster* (Image)
            </label>
            <input
              class="block w-full mb-5 text-xs text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
              id="small_size" type="text" name="poster_movie">
          </div>

        </div>


        <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center sm:gap-10 gap-8">
          <div class="sm:w-1/2">
            <label for="country" class="block mb-2 text-sm font-medium text-gray-900">Pays*</label>
            <select id="country" name="id_country"
              class="w-full focus:w-2/3 sm:focus:w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-secondary focus:border-secondary block p-2.5">
              <option selected>Choisie le pays</option>
              <?php
              //Boucle des pays
              foreach ($countryTable as $country) {
                ?>
                <option value="<?= $country['id_country'] ?>"><?= $country['name_country'] ?></option>
                <?php
              }
              ;
              ?>
            </select>
          </div>
          <div class="sm:w-1/2">
            <label for="country" class="block mb-2 text-sm font-medium text-gray-900">Catégorie* (3 max)</label>
            <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
              class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-secondary focus:border-secondary block p-2.5 flex justify-between items-center"
              type="button">Catégorie<svg class="w-4 h-4 ml-2" aria-hidden="true" fill="none" stroke="currentColor"
                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
              </svg>
            </button>
            <!-- Dropdown menu -->
            <div id="dropdown"
              class="z-10 w-44 hidden bg-white divide-y divide-gray-100 rounded-lg shadow  dark:bg-gray-700 ">
              <ul class="h-40 overflow-y-auto p-3 text-sm text-gray-700 dark:text-gray-200"
                aria-labelledby="dropdownDefaultButton">
                <?php
                //Boucle des Catégories
                $i = 0;
                foreach ($categoryTable as $category) {
                  ?>
                  <li>
                    <input id="<?php echo 'name_category' . $i ?>" type="checkbox" name="category_movie[]"
                      value="<?= $category['id_category'] ?>"
                      class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="<?php echo 'name_category' . $i ?>"
                      class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?= $category['name_category'] ?></label>
                  </li>
                  <?php
                  $i++;
                }
                ;
                ?>
              </ul>
            </div>
          </div>
        </div>
        <div class="flex justify-center">
          <a type="submit" name="addMovieForm" class="text-sm font-medium cursor-pointer">
            <div
              class="px-8 py-2 text-center bg-secondary rounded-lg hover:bg-secondary/80 focus:ring-4 focus:outline-none focus:ring-azul">
              Ajouter
            </div>
          </a>

        </div>
      </form>
    </div>
  </main>

  <?php require('template/footer.php'); ?>
</body>

</html>