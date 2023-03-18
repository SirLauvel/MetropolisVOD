<!doctype html>
<html>
<?php require('template/head.php'); ?>

<body class="bg-primary">
    <?php require('template/navbar.php'); ?>

    <main class="h-screen flex flex-col justify-center items-center">
        <div class="p-10 border border-white border-1 rounded">
            <div>
                <h3 class="text-3xl font-bold text-white">Inscription</h3>
                <?php require('assets/src/component/titleBar.php'); ?>
            </div>
            <form action="assets/src/back/registrationTreatment.php" method="post">
                <div class="sm:flex sm:gap-20">
                    <div>
                        <label for="name" class="block mb-2 text-lg font-bold text-white">
                            Nom</label>
                        <input type="text" id="name"
                            class="block py-2.5 px-3 w-full text-sm text-primary bg-antiWhite border-0 border-b-4 border-border-gray-400  rounded appearance-none focus:outline-none focus:ring-0 focus:border-secondary peer">
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium"></span></p>
                    </div>
                    <div>
                        <label for="surname" class="block mb-2 text-lg font-bold text-white">
                            Prénom</label>
                        <input type="text" id="surname"
                            class="block py-2.5 px-3 w-full text-sm text-primary bg-antiWhite border-0 border-b-4 border-border-gray-400  rounded appearance-none focus:outline-none focus:ring-0 focus:border-secondary peer">
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium"></span></p>
                    </div>
                </div>
                <div class="sm:flex sm:gap-20">
                    <div>
                        <label for="pseudo" class="block mb-2 text-lg font-bold text-white">
                            Pseudo</label>
                        <input type="text" id="pseudo"
                            class="block py-2.5 px-3 w-full text-sm text-primary bg-antiWhite border-0 border-b-4 border-border-gray-400  rounded appearance-none focus:outline-none focus:ring-0 focus:border-secondary peer">
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium"></span></p>
                    </div>
                    <div>
                        <label for="email" class="block mb-2 text-lg font-bold text-white">
                            Email</label>
                        <input type="email" id="email"
                            class="block py-2.5 px-3 w-full text-sm text-primary bg-antiWhite border-0 border-b-4 border-border-gray-400  rounded appearance-none focus:outline-none focus:ring-0 focus:border-secondary peer">
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium"></span></p>
                    </div>
                </div>
                <div class="sm:flex sm:gap-20">
                    <div>
                        <label for="password" class="block mb-2 text-lg font-bold text-white">
                            Mot de passe</label>
                        <input type="password" id="password"
                            class="block py-2.5 px-3 w-full text-sm text-primary bg-antiWhite border-0 border-b-4 border-border-gray-400  rounded appearance-none focus:outline-none focus:ring-0 focus:border-secondary peer">
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium"></span></p>
                    </div>
                    <div>
                        <label for="password" class="block mb-2 text-lg font-bold text-white">
                            Répéter mot de passe</label>
                        <input type="password" id="password"
                            class="block py-2.5 px-3 w-full text-sm text-primary bg-antiWhite border-0 border-b-4 border-border-gray-400  rounded appearance-none focus:outline-none focus:ring-0 focus:border-secondary peer">
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium"></span></p>
                    </div>
                </div>
                <div class="sm:text-center pt-5">
                    <button type="submit"
                        class="px-8 py-2 text-sm font-medium text-center text-white bg-secondary rounded-lg hover:bg-secondary/80 focus:ring-4 focus:outline-none focus:ring-azul">
                        Envoyer
                    </button>
                </div>
            </form>
        </div>
    </main>

    <?php require('template/footer.php'); ?>
</body>

</html>