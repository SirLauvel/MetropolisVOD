<!doctype html>
<html>
<?php require('template/head.php'); ?>

<body class="bg-primary">
    <?php require('template/navbar.php'); ?>

    <main class="h-screen flex flex-col justify-center items-center">
        <div>
            <div>
                <h3 class="text-3xl font-bold text-white">Inscription</h3>
                <?php require('assets/src/component/titleBar.php'); ?>
            </div>
            <form action="assets/src/back/registrationTreatment.php" method="post">
                <div>
                    <label for="name" class="block mb-2 text-lg font-bold text-white">
                        Nom</label>
                    <input type="text" id="name"
                        class="block py-2.5 px-3 w-full text-sm text-primary bg-antiWhite border-0 border-b-4 border-border-gray-400  rounded appearance-none focus:outline-none focus:ring-0 focus:border-secondary peer">
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium"></span></p>
                </div>
            </form>
        </div>
    </main>

    <?php require('template/footer.php'); ?>
</body>

</html>