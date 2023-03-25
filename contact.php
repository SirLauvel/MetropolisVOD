<?php
session_start();
?>
<!doctype html>
<html>
<?php require('template/head.php'); ?>

<body class="bg-primary">
  <?php require('template/navbar.php'); ?>

  <main class="min-h-[90vh] flex justify-center items-center">
    <div class="bg-antiWhite p-5 sm:p-10 border border-white border-1 rounded">
      <div class="sm:pb-16 sm:flex sm:justify-around sm:gap-60">
        <div class="pb-5">
          <h3 class="text-2xl  font-bold">Aide</h3>
          <?php require('assets/src/component/titleBar.php'); ?>
          <ul class="">
            <li><a href="#">F.A.Q</a></li>
            <li><a href="#">Demander un titre</a>
            <li>
          </ul>
        </div>
        <div class="pb-5">
          <h3 class="text-2xl  font-bold">Service Client</h3>
          <?php require('assets/src/component/titleBar.php'); ?>
          <p class="">03 25 xx xx xx</p>
        </div>
      </div>
      <div class="md:flex md:flex-col md:items-center">
        <div class="text-center">
          <h3 class="text-2xl  font-bold">Envoyer un Message</h3>
          <?php require('assets/src/component/titleBar.php'); ?>
        </div>
        <!--
        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
          role="alert">
          <span class="font-medium">Message envoyé !</span> Nous avons bien reçu votre message, nous vous reconctactons dès
          que possible.
        </div>-->
        <form class="w-full" action="assets/src/back/contactTreatment.php" method="post" name="contactForm">
          <div>
            <label for="objet" class=" text-lg font-bold">Objet</label>
            <select id="objet"
              class="block py-2.5 px-3 w-full text-sm text-primary bg-antiWhite border-0 border-b-4 border-border-gray-400 appearance-none focus:outline-none focus:ring-0 focus:border-secondary peer">
              <option value="">-- Choisi un motif --</option>
              <optgroup label="Compte">
                <option value="forgetUser">Nom d'utilisateur oublié</option>
                <option value="forgetEmail">Email perdu/oublié</option>
              </optgroup>
              <optgroup label="Film">
                <option value="hsLink">Signaler un lecteur HS</option>
                <option value="offer">Demander un film</option>
              </optgroup>
            </select>
            <p id="standard_error_help" class="mt-2 text-sm text-red-600 dark:text-red-400"><span
                class="font-medium"><!-- Zone d'alerte -->
            </p>
          </div>
          <div>
            <label for="message" class=" text-lg font-bold">
              Message
            </label>
            <textarea id="message" rows="4"
              class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 border-4 focus:ring-blue-500 focus:border-secondary"
              placeholder="Ecrire votre message ici."></textarea>
            <p id="standard_error_help" class="mt-2 text-sm text-red-600 dark:text-red-400"><span
                class="font-medium"><!-- Zone d'alerte -->
            </p>
          </div>
          <div class="text-center pt-5">
            <button type="submit"
              class="px-8 py-2 text-sm font-medium text-center  bg-secondary rounded-lg hover:bg-secondary/80 focus:ring-4 focus:outline-none focus:ring-azul">
              Envoyer
            </button>
          </div>
        </form>
      </div>
    </div>
  </main>

  <?php require('template/footer.php'); ?>
</body>

</html>