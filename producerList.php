<?php
session_start();
if (isset($_SESSION['account'])) {
    if ($_SESSION['account']['id_role'] != 1) {
        header('location: index.php');
    }
} else {
    header('location: index.php');
}

require('assets/src/back/function.php');
$producerTable = getProducerAll();
?>

<!doctype html>
<html>
<?php require('template/head.php'); ?>

<body class="bg-primary">
    <?php require('template/navbar.php'); ?>

    <main class="min-h-[90vh] mt-[10vh] p-10">
        <div class="bg-antiWhite p-10 rounded">
            <div class="flex flex-col items-center">
                <h2 class="text-3xl font-bold">Liste des producteurs</h2>
                <?php require('assets/src/component/titleBar.php'); ?>
            </div>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <div class="flex items-center justify-between p-10 bg-white dark:bg-gray-900">
                    <div>
                        <button id="dropdownActionButton" data-dropdown-toggle="dropdownAction"
                            class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-3 py-1.5 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"
                            type="button">
                            <span class="sr-only">Action button</span>
                            Action
                            <svg class="w-3 h-3 ml-2" aria-hidden="true" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </button>
                        <!-- Dropdown menu -->
                        <div id="dropdownAction"
                            class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                            <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                                aria-labelledby="dropdownActionButton">
                                <li>
                                    <button data-modal-target="addProducer" data-modal-toggle="addProducer"
                                        class="w-full block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                        Ajouter
                                    </button>
                                </li>
                                <li>
                                    <button
                                        class="w-full block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                        Supprimer
                                    </button>
                                </li>

                            </ul>
                        </div>
                    </div>
                    <label for="table-search" class="sr-only">Search</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <input type="text" id="table-search-users"
                            class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Search for users">
                    </div>
                </div>
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="p-4">
                                <div class="flex items-center">
                                    <input id="checkbox-all-search" type="checkbox"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="checkbox-all-search" class="sr-only">checkbox</label>
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Nom Prénom</th>
                            <th scope="col" class="px-6 py-3 text-center">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($producerTable as $producer) { ?>
                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="w-4 p-4">
                                    <div class="flex items-center">
                                        <input id="checkbox-table-search-1" type="checkbox" name="producer"
                                            value="<?= $producer['id_producer'] ?>"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                    </div>
                                </td>
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <?= $producer['name_producer'] ?>
                                </th>
                                <td class="px-6 py-4">
                                    <div class="flex justify-center gap-5">
                                        <div>
                                            <button data-modal-target="udapteModal_<?= $producer['id_producer'] ?>"
                                                data-modal-toggle="udapteModal_<?= $producer['id_producer'] ?>"
                                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-1 text-center inline-flex items-center">
                                                Modifier
                                            </button>
                                        </div>
                                        <div>
                                            <button data-modal-target="alertDelete_<?= $producer['id_producer'] ?>"
                                                data-modal-toggle="alertDelete_<?= $producer['id_producer'] ?>"
                                                class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-1 text-center inline-flex items-center">
                                                Supprimer
                                            </button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <div id="udapteModal_<?= $producer['id_producer'] ?>" tabindex="-1"
                                class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
                                <div class="relative w-full h-full max-w-md md:h-auto">
                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                        <button type="button"
                                            class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                                            data-modal-hide="udapteModal_<?= $producer['id_producer'] ?>">
                                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                        <div class="p-6 text-center">
                                            <h3 class="mb-5 text-xl font-bold text-gray-500">Modication de producteur</h3>
                                            <form
                                                action="assets/src/back/updateProducer.php?id_producer=<?= $producer['id_producer'] ?>"
                                                method="post">
                                                <div class="relative">
                                                    <input type="text" id="name_producer" name="name_producer"
                                                        value="<?= $producer['name_producer'] ?>"
                                                        class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-secondary peer"
                                                        placeholder="Nom Prénom" />
                                                    <label for="name_producer"
                                                        class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-secondary peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">
                                                        Nom Prénom
                                                    </label>
                                                </div>
                                                <input type="hidden" name="id_producer"
                                                    value="<?= $producer['id_producer'] ?>" />
                                                <div class="p-6 text-center">
                                                    <button data-modal-hide="udapteModal_<?= $producer['id_producer'] ?>"
                                                        type="submit" name="updateProducer"
                                                        class="text-white bg-blue-700 hover:bg-blue-600 focus:ring-2 focus:outline-none focus:ring-azul font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                                        Modifier
                                                    </button>
                                                    <button data-modal-hide="udapteModal_<?= $producer['id_producer'] ?>"
                                                        type="button"
                                                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Non,
                                                        annuler</button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="alertDelete_<?= $producer['id_producer'] ?>" tabindex="-1"
                                class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
                                <div class="relative w-full h-full max-w-md md:h-auto">
                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                        <button type="button"
                                            class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                                            data-modal-hide="alertDelete_<?= $producer['id_producer'] ?>">
                                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                        <div class="p-6 text-center">
                                            <svg aria-hidden="true"
                                                class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Êtes-vous
                                                sûr de vouloir effacer le producteur : <span class="font-bold">
                                                    <?= $producer['name_producer'] ?>
                                                </span> ?</h3>
                                            <form action="assets/src/back/deleteProducer.php" method="post">
                                                <input type="hidden" name="id_producer"
                                                    value="<?= $producer['id_producer'] ?>" />
                                                <button data-modal-hide="alertDelete_<?= $producer['id_producer'] ?>"
                                                    type="submit" name="deleteProducer"
                                                    class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                                    Oui, je suis sûr !
                                                </button>
                                            </form>
                                            <button data-modal-hide="alertDelete_<?= $producer['id_producer'] ?>"
                                                type="button"
                                                class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Non,
                                                annuler</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <aside>
        <div id="addProducer" tabindex="-1"
            class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
            <div class="relative w-full h-full max-w-md md:h-auto">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <button type="button"
                        class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                        data-modal-hide="addProducer">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <div class="p-6 text-center">
                        <h3 class="mb-5 text-xl font-bold text-gray-500">Ajout de producteur</h3>
                        <form action="assets/src/back/addProducer.php" method="post">
                            <div class="relative">
                                <input type="text" id="name_producer" name="name_producer"
                                    class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-secondary peer"
                                    placeholder=" " />
                                <label for="name_producer"
                                    class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">
                                    Nom Prénom
                                </label>
                            </div>

                            <div class="p-6 text-center">
                                <button data-modal-hide="addProducer" type="submit" name="addProducer"
                                    class="text-white bg-secondary hover:bg-secondary/80 focus:ring-2 focus:outline-none focus:ring-azul font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                    Ajouter
                                </button>
                                <button data-modal-hide="addProducer" type="button"
                                    class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Non,
                                    annuler</button>
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