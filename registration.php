<?php
session_start();
require('assets/src/back/alertMessage.php');

if(isset($_SESSION['account'])) {
    header('location: index.php');
};
?>

<!doctype html>
<html>
<?php require('template/head.php'); ?>

<body class="bg-primary">
    <?php require('template/navbar.php'); ?>

    <main class="min-h-[90vh] flex flex-col justify-center items-center">
        <div class="p-10 border border-white border-1 rounded-lg bg-antiWhite">
            <div>
                <h3 class="text-3xl font-bold ">Inscription</h3>
                <?php require('assets/src/component/titleBar.php'); ?>
            </div>
            <form action="assets/src/back/registrationTreatment.php" method="post">
                <?= $messageAlert ?>
                <div class="sm:flex sm:gap-20">
                    <div class="relative z-0">
                        <input type="text" id="name" name="name"
                            class="block py-2.5 px-4 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-400 appearance-none dark: dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-secondary peer"
                            placeholder=" " />
                        <label for="name"
                            class="absolute text-lg text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-secondary peer-focus:font-bold peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                            Nom</label>
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium"></span></p>
                    </div>
                    <div class="relative z-0">
                        <input type="text" id="surname" name="surname"
                            class="block py-2.5 px-4 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-400 appearance-none dark: dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-secondary peer"
                            placeholder=" " />
                        <label for="surname"
                            class="absolute text-lg text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-secondary peer-focus:font-bold peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                            Prénom</label>
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium"></span></p>
                    </div>
                </div>
                <div class="sm:flex sm:gap-20">
                    <div class="relative z-0">
                        <input type="text" id="pseudo" name="pseudo"
                            class="block py-2.5 px-4 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-400 appearance-none dark: dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-secondary peer"
                            placeholder=" " />
                        <label for="pseudo"
                            class="absolute text-lg text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-secondary peer-focus:font-bold peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                            Pseudo</label>
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium"></span></p>
                    </div>
                    <div class="relative z-0">
                        <input type="email" id="email" name="email"
                            class="block py-2.5 px-4 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-400 appearance-none dark: dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-secondary peer"
                            placeholder=" " />
                        <label for="email"
                            class="absolute text-lg text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-secondary peer-focus:font-bold peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                            Email</label>
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium"></span></p>
                    </div>
                </div>
                <div class="sm:flex sm:gap-20">
                    <div class="relative z-0">
                        <input type="password" id="password" name="password"
                            class="block py-2.5 px-4 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-400 appearance-none dark: dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-secondary peer"
                            placeholder=" " />
                        <label for="password"
                            class="absolute text-lg text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-secondary peer-focus:font-bold peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                            Mot de passe</label>
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium"></span></p>
                    </div>
                    <div class="relative z-0">
                        <input type="password" id="repeatPassword" name="repeatPassword"
                            class="block py-2.5 px-4 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-400 appearance-none dark: dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-secondary peer"
                            placeholder=" " />
                        <label for="repeatPassword"
                            class="absolute text-lg text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-secondary peer-focus:font-bold peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                            Répéter mot de passe</label>
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium"></span></p>
                    </div>
                </div>
                <div class="sm:text-center pt-5">
                    <button type="submit"
                        class="w-full px-8 py-2 text-sm font-medium text-center  bg-secondary rounded-lg hover:bg-secondary/80 focus:ring-4 focus:outline-none focus:ring-azul">
                        Envoyer
                    </button>
                </div>
            </form>
        </div>
    </main>

    <?php require('template/footer.php'); ?>
</body>

</html>