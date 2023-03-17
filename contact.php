<!doctype html>
<html>
<?php require('template/head.php'); ?>

<body class="bg-primary">
  <?php require('template/navbar.php'); ?>

  <main class="h-screen flex flex-col justify-center">
    <div class="">
      <div class="md:pb-16 md:flex md:justify-around md:items-center">
        <div class="pb-5">
          <h3 class="text-2xl text-white font-bold">Aide</h3>
          <?php require('assets/src/component/titleBar.php'); ?>
          <ul class="text-white">
            <li><a href="#">F.A.Q</a></li>
            <li><a href="#">Demander un titre</a>
            <li>
          </ul>
        </div>
        <div class="pb-5">
          <h3 class="text-2xl text-white font-bold">Service Client</h3>
          <?php require('assets/src/component/titleBar.php'); ?>
          <p class="text-white">03 25 xx xx xx</p>
        </div>
      </div>
      <div class="md:flex md:flex-col md:items-center">
        <div>
          <h3 class="text-2xl text-white font-bold">Envoyer un Message</h3>
          <?php require('assets/src/component/titleBar.php'); ?>
        </div>
        <form class="md:w-2/3 xl:w-1/2" action="assets/src/back/contactTreatment.php" method="post" name="contactForm">
          <div>
            <label for="objet" class="text-white text-lg font-bold">Objet</label>
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
            <p id="standard_error_help" class="mt-2 text-sm text-red-600 dark:text-red-400"><span class="font-medium">
            </p>
          </div>
          <div>
            <label for="message" class="text-white text-lg font-bold">Your
              message</label>
            <textarea id="message" rows="4"
              class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 border-4 focus:ring-blue-500 focus:border-secondary"
              placeholder="Ecrire votre message ici."></textarea>
            <p id="standard_error_help" class="mt-2 text-sm text-red-600 dark:text-red-400"><span class="font-medium">
            </p>
          </div>
          <div class="text-center">
            <button type="submit"
              class="px-8 py-2 text-sm font-medium text-center text-white bg-secondary rounded-lg hover:bg-secondary/80 focus:ring-4 focus:outline-none focus:ring-azul">
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