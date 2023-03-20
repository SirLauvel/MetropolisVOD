<!doctype html>
<html>
<?php require('template/head.php'); ?>

<body class="bg-primary">
    <?php require('template/navbar.php'); ?>

    <main class="m-h-[90vh] flex flex-col justify-center items-center">
        <div class="relative p-10 border border-white border-1 rounded-lg bg-antiWhite">
            <div>
                <h3 class="text-3xl font-bold ">Connexion</h3>
                <?php require('assets/src/component/titleBar.php'); ?>
            </div>
            <form action="assets/src/back/registrationTreatment.php" method="post">
                <div class="flex flex-col gap-3">
                    <div class="relative z-0">
                        <input type="text" id="floating_standard"
                            class="block py-2.5 px-4 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-400 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-secondary peer"
                            placeholder=" " />
                        <label for="floating_standard"
                            class="absolute text-lg text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-secondary peer-focus:font-bold peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                        Pseudo</label>
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium"></span></p>
                    </div>

                    <div class="relative z-0">
                        <input type="password" id="password"
                            class="block py-2.5 px-4 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-400 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-secondary peer"
                            placeholder=" " />
                        <label for="password"
                            class="absolute text-lg text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-secondary peer-focus:font-bold peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                        Mot de passe</label>
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium"></span></p>
                    </div>
                </div>
                <div class="text-center pt-5">
                    <button type="submit"
                        class="px-8 py-2 text-sm text-antiWhite  font-medium text-center bg-secondary rounded-lg hover:bg-secondary/80 hover:text-primary focus:ring-4 focus:outline-none focus:ring-azul">
                        Envoyer
                    </button>
                </div>
            </form>
            <div class="absolute bottom-0 right-2">
                <a href="#" class="text-sm text-azul">Mot de passse oublié ?</a>
            </div>
        </div>
    </main>

    <?php require('template/footer.php'); ?>
</body>

</html>