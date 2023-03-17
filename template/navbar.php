<nav class="bg-transparent border-gray-200 px-2 sm:px-4 py-2.5 rounded absolute top-0 left-0 z-10 w-full shadow-2xl shadow-inner">
    <div class="container flex flex-wrap items-center justify-between mx-auto">
        <div class="flex items-center">
            <button
                class="inline-flex items-center p-2 ml-1 text-sm text-white rounded-lg md:hidden hover:bg-azul focus:outline-none focus:ring-2 focus:ring-gray-200"
                type="button" data-drawer-target="drawer-navigation" data-drawer-show="drawer-navigation"
                aria-controls="drawer-navigation">
                <span class="sr-only">Open main menu</span>
                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
            <a href="https://flowbite.com/" class="flex items-center font-bold">
                <img src="https://flowbite.com/docs/images/logo.svg" class="h-6 mr-3 sm:h-9" alt="Flowbite Logo" />
                <span class="self-center text-xl font-semibold whitespace-nowrap text-secondary">MétropolisVOD</span>
            </a>
        </div>
        <div class="flex items-center">
            <div class="items-center justify-between hidden w-full md:flex md:w-auto">
                <ul class="hidden md:flex flex-row space-x-4 p-2 mt-0 text-sm font-medium">
                    <li>
                        <a href="#" class="block p-2 text-white rounded hover:bg-secondary font-bold text-lg">Accueil</a>
                    </li>
                    <li>
                        <a href="#" class="block p-2 text-white rounded hover:bg-secondary font-bold text-lg">Film</a>
                    </li>
                    <li>
                        <button id="dropdownCompteLink" data-dropdown-toggle="dropdownCompte"
                            class="flex items-center justify-between w-full font-medium p-2 text-white rounded hover:bg-secondary font-bold text-lg">Compte
                            <svg class="w-4 h-4 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg></button>
                        <!-- Dropdown menu -->
                        <div id="dropdownCompte"
                            class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-400"
                                aria-labelledby="dropdownLargeButton">
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-azul">Profil</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-azul">Mes
                                        favoris</a>
                                </li>
                                <li aria-labelledby="dropdowParameterLink">
                                    <button id="dropdowParameterButton" data-dropdown-toggle="dropdowParameter"
                                        data-dropdown-placement="right-start" type="button"
                                        class="flex items-center justify-between w-full px-4 py-2 hover:bg-azul">Paramètre<svg
                                            aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                clip-rule="evenodd"></path>
                                        </svg></button>
                                    <div id="dropdowParameter"
                                        class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44">
                                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                            aria-labelledby="doubleDropdownButton">
                                            <li>
                                                <a href="#"
                                                    class="block px-4 py-2 hover:bg-azul">Modifier
                                                    mes infos personnelles</a>
                                            </li>
                                            <li>
                                                <a href="#"
                                                    class="block px-4 py-2 hover:bg-azul">Modifier
                                                    mon mot de passe</a>
                                            </li>
                                            <li>
                                                <a href="#"
                                                    class="block px-4 py-2 hover:bg-azul">Mofifier
                                                    mon avatar</a>
                                            </li>

                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-azul">Déconnecter</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="#" class="block p-2 text-white rounded hover:bg-secondary font-bold text-lg">Contact</a>
                    </li>
                    <li>
                        <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar"
                            class="flex items-center justify-between w-full py-2 pl-3 pr-4 font-medium text-white rounded hover:bg-secondary font-bold text-lg">
                            Admin
                            <svg class="w-5 h-5 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg></button>
                        <!-- Dropdown menu -->
                        <div id="dropdownNavbar"
                            class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-400"
                                aria-labelledby="dropdownLargeButton">
                                <li>
                                    <a href="#" class="block px-4 py-2 hover:bg-azul">Liste
                                        des utilisateurs</a>
                                </li>
                                <li>
                                    <a href="#" class="block px-4 py-2 hover:bg-azul">Liste
                                        des films</a>
                                </li>
                                <li>
                                    <a href="#" class="block px-4 py-2 hover:bg-azul">Liste
                                        du top 10</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>

            <div class="flex items-center ml-4">
                <button id="dropdownNotificationButton" data-dropdown-toggle="dropdownNotification"
                    class="inline-flex items-center text-sm font-medium text-center text-gray-500 hover:text-secondary focus:outline-none"
                    type="button">
                    <svg class="h-8 w-8 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9" />
                        <path d="M13.73 21a2 2 0 0 1-3.46 0" />
                    </svg>
                    <div class="relative flex">
                        <div
                            class="relative inline-flex w-3 h-3 bg-red-500 border-2 border-white rounded-full -top-2 right-3">
                        </div>
                    </div>
                </button>
                <!-- Dropdown menu -->
                <div id="dropdownNotification"
                    class="z-20 hidden w-full max-w-sm bg-antiWhite divide-y divide-gray-100 rounded-lg shadow "
                    aria-labelledby="dropdownNotificationButton">
                    <div class="block px-4 py-2 font-medium text-center text-white rounded-t-lg bg-tertairy">
                        Notifications
                    </div>
                    <div class="divide-y divide-antiWhite">
                        <a href="#" class="flex px-4 py-3 hover:bg-azul">
                            <div class="flex-shrink-0">
                                <img class="rounded-full w-11 h-11" src="/docs/images/people/profile-picture-1.jpg"
                                    alt="Jese image">
                                <div
                                    class="absolute flex items-center justify-center w-5 h-5 ml-6 -mt-5 bg-blue-600 border border-white rounded-full">
                                    <svg class="w-3 h-3 text-white" aria-hidden="true" fill="currentColor"
                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M8.707 7.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l2-2a1 1 0 00-1.414-1.414L11 7.586V3a1 1 0 10-2 0v4.586l-.293-.293z">
                                        </path>
                                        <path
                                            d="M3 5a2 2 0 012-2h1a1 1 0 010 2H5v7h2l1 2h4l1-2h2V5h-1a1 1 0 110-2h1a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V5z">
                                        </path>
                                    </svg>
                                </div>
                            </div>
                            <div class="w-full pl-3">
                                <div class="text-gray-500 text-sm mb-1.5">New message from <span
                                        class="font-semibold text-secondary">Jese Leos</span>: "Hey,
                                    what's up? All set for the presentation?"</div>
                                <div class="text-xs text-blue-600">a few moments ago</div>
                            </div>
                        </a>
                        <a href="#" class="flex px-4 py-3 hover:bg-azul">
                            <div class="flex-shrink-0">
                                <img class="rounded-full w-11 h-11" src="/docs/images/people/profile-picture-2.jpg"
                                    alt="Joseph image">
                                <div
                                    class="absolute flex items-center justify-center w-5 h-5 ml-6 -mt-5 bg-gray-900 border border-white rounded-full">
                                    <svg class="w-3 h-3 text-white" aria-hidden="true" fill="currentColor"
                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z">
                                        </path>
                                    </svg>
                                </div>
                            </div>
                            <div class="w-full pl-3">
                                <div class="text-gray-500 text-sm mb-1.5"><span
                                        class="font-semibold text-secondary">Joseph
                                        Mcfall</span> and
                                    <span class="font-medium text-secondary">5 others</span> started
                                    following you.
                                </div>
                                <div class="text-xs text-blue-600">10 minutes ago</div>
                            </div>
                        </a>
                        <a href="#" class="flex px-4 py-3 hover:bg-azul">
                            <div class="flex-shrink-0">
                                <img class="rounded-full w-11 h-11" src="/docs/images/people/profile-picture-3.jpg"
                                    alt="Bonnie image">
                                <div
                                    class="absolute flex items-center justify-center w-5 h-5 ml-6 -mt-5 bg-red-600 border border-white rounded-full">
                                    <svg class="w-3 h-3 text-white" aria-hidden="true" fill="currentColor"
                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="w-full pl-3">
                                <div class="text-gray-500 text-sm mb-1.5"><span
                                        class="font-semibold text-secondary">Bonnie
                                        Green</span> and
                                    <span class="font-medium text-secondary">141 others</span> love your
                                    story. See it and view more stories.
                                </div>
                                <div class="text-xs text-blue-600">44 minutes ago</div>
                            </div>
                        </a>
                        <a href="#" class="flex px-4 py-3 hover:bg-azul">
                            <div class="flex-shrink-0">
                                <img class="rounded-full w-11 h-11" src="/docs/images/people/profile-picture-4.jpg"
                                    alt="Leslie image">
                                <div
                                    class="absolute flex items-center justify-center w-5 h-5 ml-6 -mt-5 bg-green-400 border border-white rounded-full">
                                    <svg class="w-3 h-3 text-white" aria-hidden="true" fill="currentColor"
                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M18 13V5a2 2 0 00-2-2H4a2 2 0 00-2 2v8a2 2 0 002 2h3l3 3 3-3h3a2 2 0 002-2zM5 7a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1zm1 3a1 1 0 100 2h3a1 1 0 100-2H6z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="w-full pl-3">
                                <div class="text-gray-500 text-sm mb-1.5"><span
                                        class="font-semibold text-secondary">Leslie
                                        Livingston</span>
                                    mentioned you in a comment: <span class="font-medium text-blue-500"
                                        href="#">@bonnie.green</span> what do you say?</div>
                                <div class="text-xs text-blue-600">1 hour ago</div>
                            </div>
                        </a>
                        <a href="#" class="flex px-4 py-3 hover:bg-azul">
                            <div class="flex-shrink-0">
                                <img class="rounded-full w-11 h-11" src="/docs/images/people/profile-picture-5.jpg"
                                    alt="Robert image">
                                <div
                                    class="absolute flex items-center justify-center w-5 h-5 ml-6 -mt-5 bg-purple-500 border border-white rounded-full">
                                    <svg class="w-3 h-3 text-white" aria-hidden="true" fill="currentColor"
                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M2 6a2 2 0 012-2h6a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V6zM14.553 7.106A1 1 0 0014 8v4a1 1 0 00.553.894l2 1A1 1 0 0018 13V7a1 1 0 00-1.447-.894l-2 1z">
                                        </path>
                                    </svg>
                                </div>
                            </div>
                            <div class="w-full pl-3">
                                <div class="text-gray-500 text-sm mb-1.5"><span
                                        class="font-semibold text-secondary">Robert
                                        Brown</span> posted a
                                    new video: Glassmorphism - learn how to implement the new design trend.</div>
                                <div class="text-xs text-blue-600">3 hours ago</div>
                            </div>
                        </a>
                    </div>
                    <a href="#"
                        class="block py-2 text-sm font-medium text-center text-white rounded-b-lg bg-tertairy hover:bg-azul">
                        <div class="inline-flex items-center ">
                            <svg class="w-4 h-4 mr-2 text-white" aria-hidden="true" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                                <path fill-rule="evenodd"
                                    d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            Voir tout
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="text-center">
    </div>
    <div id="drawer-navigation"
        class="fixed top-0 left-0 z-40 h-screen p-4 overflow-y-auto transition-transform -translate-x-full bg-tertairy w-80"
        tabindex="-1" aria-labelledby="drawer-navigation-label">
        <h5 id="drawer-navigation-label" class="text-base font-semibold text-white uppercase">Menu</h5>
        <button type="button" data-drawer-hide="drawer-navigation" aria-controls="drawer-navigation"
            class="text-white bg-transparent  hover:text-azul rounded-lg text-sm p-1.5 absolute top-2.5 right-2.5 inline-flex items-center">
            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                    clip-rule="evenodd"></path>
            </svg>
            <span class="sr-only">Close menu</span>
        </button>
        <div class="py-4 overflow-y-auto">
            <p class="text-center text-white py-3">Bonjour Natsuki Hanae !</p>
            <ul class="space-y-2">
                <li>
                    <a href="#" class="flex items-center p-2 text-base font-normal text-secondary rounded-lg">
                        <svg aria-hidden="true"
                            class="w-6 h-6 text-secondary transition duration-75 group-hover:text-secondary"
                            fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                            <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                        </svg>
                        <span class="ml-3">Accueil</span>
                    </a>
                </li>
                <li>
                    <button type="button"
                        class="flex items-center w-full p-2 text-base font-normal text-secondary transition duration-75 rounded-lg group hover:bg-azul"
                        aria-controls="dropdown-film" data-collapse-toggle="dropdown-film">
                        <svg aria-hidden="true"
                            class="flex-shrink-0 w-6 h-6 text-secondary transition duration-75 group-hover:text-secondary"
                            fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="flex-1 ml-3 text-left whitespace-nowrap">Film</span>
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <ul id="dropdown-film" class="hidden py-2 space-y-2">
                        <li>
                            <a href="#"
                                class="flex items-center w-full p-2 text-base font-normal text-antiWhite transition duration-75 rounded-lg pl-11 group hover:bg-azul">Tous</a>
                        </li>
                        <hr class="border-secondary w-4/5 ml-10">
                        <li>
                            <a href="#"
                                class="flex items-center w-full p-2 text-base font-normal text-antiWhite transition duration-75 rounded-lg pl-11 group hover:bg-azul">Action</a>
                        </li>
                        <li>
                            <a href="#"
                                class="flex items-center w-full p-2 text-base font-normal text-antiWhite transition duration-75 rounded-lg pl-11 group hover:bg-azul">Aventure</a>
                        </li>
                        <li>
                            <a href="#"
                                class="flex items-center w-full p-2 text-base font-normal text-antiWhite transition duration-75 rounded-lg pl-11 group hover:bg-azul">Fantaisie</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <button type="button"
                        class="flex items-center w-full p-2 text-base font-normal text-secondary transition duration-75 rounded-lg group hover:bg-azul"
                        aria-controls="dropdown-compte" data-collapse-toggle="dropdown-compte">
                        <svg aria-hidden="true"
                            class="flex-shrink-0 w-6 h-6 text-secondary transition duration-75 group-hover:text-secondary"
                            fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="flex-1 ml-3 text-left whitespace-nowrap">Compte</span>
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <ul id="dropdown-compte" class="hidden py-2 space-y-2">
                        <li>
                            <a href="#"
                                class="flex items-center w-full p-2 text-base font-normal text-antiWhite transition duration-75 rounded-lg pl-11 group hover:bg-azul">Profil</a>
                        </li>
                        <li>
                            <a href="#"
                                class="flex items-center w-full p-2 text-base font-normal text-antiWhite transition duration-75 rounded-lg pl-11 group hover:bg-azul">Favoris</a>
                        </li>
                        <li>
                            <a href="#"
                                class="flex items-center w-full p-2 text-base font-normal text-antiWhite transition duration-75 rounded-lg pl-11 group hover:bg-azul">Paramètre</a>
                        </li>
                        <li>
                            <button href="#"
                                class="flex items-center w-full p-2 text-base font-normal text-antiWhite transition duration-75 rounded-lg pl-11 group hover:bg-azul">Déconnecté</button>
                        </li>
                    </ul>
                </li>
                <li>
                    <button type="button"
                        class="flex items-center w-full p-2 text-base font-normal text-secondary transition duration-75 rounded-lg group hover:bg-azul"
                        aria-controls="dropdown-admin" data-collapse-toggle="dropdown-admin">
                        <svg aria-hidden="true"
                            class="flex-shrink-0 w-6 h-6 text-secondary transition duration-75 group-hover:text-secondary"
                            fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="flex-1 ml-3 text-left whitespace-nowrap">Admin</span>
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <ul id="dropdown-admin" class="hidden py-2 space-y-2">
                        <li>
                            <a href="#"
                                class="flex items-center w-full p-2 text-base font-normal text-antiWhite transition duration-75 rounded-lg pl-11 group hover:bg-azul">Liste
                                des utilisateurs</a>
                        </li>
                        <li>
                            <a href="#"
                                class="flex items-center w-full p-2 text-base font-normal text-antiWhite transition duration-75 rounded-lg pl-11 group hover:bg-azul">Liste
                                des films</a>
                        </li>
                        <li>
                            <a href="#"
                                class="flex items-center w-full p-2 text-base font-normal text-antiWhite transition duration-75 rounded-lg pl-11 group hover:bg-azul">Liste
                                du Top10</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>