<?php
session_start();
if (!isset($_SESSION['account'])) {
    header('location: login.php');
}
;
require('assets/src/back/function.php');
$favoriteTable = getFavorite($_SESSION['account']['id_users']);
?>

<!doctype html>
<html>
<?php require('template/head.php'); ?>

<body class="h-screen bg-primary">
    <?php require('template/navbar.php'); ?>

    <main class="mt-[10vh] min-h-[90vh] p-10 flex justify-center items-center">
        <div class="w-full md:w-1/2 lg:w-1/3 mt-16 bg-antiWhite rounded-lg p-5">
            <div class="-translate-y-28">
                <div class="flex flex-col items-center">
                    <img class="w-44 h-44 rounded-full border border-black border-2"
                        src="<?= $_SESSION['account']['avatar'] ?>" alt="Large avatar">
                    <h2 class="text-2xl font-bold py-5">
                        <?= $_SESSION['account']['pseudo'] ?>
                    </h2>
                </div>
                <div>
                    <h3 class="text-xl font-medium">Mes infos</h3>

                    <ul class="text-lg pb-5 ml-5">
                        <li>
                            <?= $_SESSION['account']['name'] . " " . $_SESSION['account']['surname'] ?>
                        </li>
                        <li>
                            <?= $_SESSION['account']['email'] ?>
                        </li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-xl font-medium pb-3">Action</h3>
                    <ul class="text-lg pb-5 ml-5">
                        <li>
                            <a href="favoriteList.php">Mes favoris</a>
                        </li>
                        <li>
                            <button data-modal-target="updateAccount" data-modal-toggle="updateAccount" type="button">
                                Modifier mes infos personnels
                            </button>
                        <li>
                        <li>
                            <button data-modal-target="updatePassword" data-modal-toggle="updatePassword" type="button">
                                Modifier mon mot de passe
                            </button>
                        </li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-xl font-medium pb-3">Admin</h3>
                    <ul class="text-lg ml-5">
                        <li><a href="movieList.php">Liste des films</a></li>
                        <li><a href="userList.php">Liste des utilisateurs</a></li>
                        <li><a href="countryList.php">Liste des pays</a></li>
                        <li><a href="categoryList.php">Liste des catégories</a></li>
                        <li><a href="actorList.php">Liste des acteurs</a></li>
                        <li><a href="producerList.php">Liste des producteurs</a></li>
                        <li><a href="realisatorList.php">Liste des réalisateurs</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </main>
    <aside>
        <div id="updatePassword" tabindex="-1" aria-hidden="true"
            class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
            <div class="relative w-full h-full max-w-md md:h-auto">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <button type="button"
                        class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                        data-modal-hide="updatePassword">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <div class="px-6 py-6 lg:px-8">
                        <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Modification de mot de passe
                        </h3>
                        <form class="space-y-6" action="assets/src/back/updatePassword.php" method="post">
                            <div class="relative">
                                <input type="password" id="password_users" name="password_users"
                                    class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-secondary peer"
                                    placeholder="Nom" />
                                <label for="password_users"
                                    class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-secondary peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">
                                    Mot de passe
                                </label>
                            </div>
                            <div class="relative">
                                <input type="password" id="newPassword_users" name="newPassword_users"
                                    class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-secondary peer"
                                    placeholder="Nom" />
                                <label for="newPassword_users"
                                    class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-secondary peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">
                                    Nouveau mot de passe
                                </label>
                            </div>
                            <div class="relative">
                                <input type="password" id="repeatNewPassword_users" name="repeatNewPassword_users"
                                    class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-secondary peer"
                                    placeholder="Nom" />
                                <label for="repeatNewPassword_users"
                                    class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-secondary peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">
                                    Répéter le nouveau mot de passe
                                </label>
                            </div>
                            <input type="hidden" name="id_users" value="<?= $_SESSION['account']['id_users'] ?>" />
                            <div class="text-center">
                                <button type="submit" name="updatePassword"
                                    class="text-white bg-blue-700 hover:bg-blue-600 focus:ring-2 focus:outline-none focus:ring-azul font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                    Modifier
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div id="updateAccount" tabindex="-1" aria-hidden="true"
            class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
            <div class="relative w-full h-full max-w-md md:h-auto">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <button type="button"
                        class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                        data-modal-hide="updateAccount">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <div class="px-6 py-6 lg:px-8">
                        <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Modification du compte
                        </h3>
                        <form enctype="multipart/form-data" class="space-y-6" action="assets/src/back/updateAccount.php"
                            method="post">
                            <div class="relative">
                                <input type="text" id="name_users" name="name_users"
                                    value="<?= $_SESSION['account']['name'] ?>"
                                    class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-secondary peer"
                                    placeholder="Nom" />
                                <label for="name_users"
                                    class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-secondary peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">
                                    Nom
                                </label>
                            </div>
                            <div class="relative">
                                <input type="text" id="surname_users" name="surname_users"
                                    value="<?= $_SESSION['account']['surname'] ?>"
                                    class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-secondary peer"
                                    placeholder="Nom" />
                                <label for="surname_users"
                                    class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-secondary peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">
                                    Prénom
                                </label>
                            </div>
                            <div class="relative">
                                <input type="text" id="pseudo_users" name="pseudo_users"
                                    value="<?= $_SESSION['account']['pseudo'] ?>"
                                    class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-secondary peer"
                                    placeholder="Nom" />
                                <label for="pseudo_users"
                                    class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-secondary peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">
                                    Pseudo
                                </label>
                            </div>
                            <div class="relative">
                                <input type="email" id="email_users" name="email_users"
                                    value="<?= $_SESSION['account']['email'] ?>"
                                    class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-secondary peer"
                                    value="" />
                                <label for="email_users"
                                    class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-secondary peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">
                                    Email
                                </label>
                            </div>
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                    for="avatar_insert">Avatar</label>
                                <input name="avatar_users" value=""
                                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                    aria-describedby="avatar_userst_help" id="avatar_users" type="file" >
                                <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="avatar_users_help">SVG,
                                    PNG,
                                    JPG or GIF (MAX. 800x400px).</p>
                            </div>
                            <input type="hidden" name="avatar_users" value="<?= $_SESSION['account']['avatar'] ?>" />
                            <input type="hidden" name="id_users" value="<?= $_SESSION['account']['id_users'] ?>" />
                            <div class="text-center">
                                <button type="submit" name="updateAccount"
                                    class="text-white bg-blue-700 hover:bg-blue-600 focus:ring-2 focus:outline-none focus:ring-azul font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                    Modifier
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </aside>

    <?php require('template/footer.php'); ?>
</body>

</html>