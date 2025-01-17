<header class="bg-white shadow-md fixed w-full z-50 transition-all duration-300" x-data="{ atTop: true }" @scroll.window="atTop = (window.pageYOffset > 50) ? false : true" :class="{ 'py-4': atTop, 'py-2': !atTop }">
    <nav class="container mx-auto px-6">
        <div class="flex justify-between items-center">
            <div class="text-2xl font-bold text-primary">
                <a href="#" class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mr-2" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838l-2.727 1.17 1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zm5.99 7.176A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z"/>
                    </svg>
                    Youdemy
                </a>
            </div>
            <div class="hidden md:flex space-x-6">
                <a href="#accueil" class="text-gray-600 hover:text-primary transition duration-300">Accueil</a>
                <a href="#catalogue" class="text-gray-600 hover:text-primary transition duration-300">Catalogue</a>
                <a href="#service" class="text-gray-600 hover:text-primary transition duration-300">Service</a>
            </div>
            <div class="hidden md:flex items-center space-x-4">
                <a href="#" class="text-primary hover:text-primary-dark transition duration-300">Connexion</a>
                <a href="#" class="bg-primary text-white px-6 py-2 rounded-full hover:bg-primary-dark transition duration-300 transform hover:scale-105">S'inscrire</a>
            </div>
            <button @click="mobileMenu = !mobileMenu" class="md:hidden text-gray-500 hover:text-gray-600 focus:outline-none focus:text-gray-600" aria-label="toggle menu">
                <svg viewBox="0 0 24 24" class="h-6 w-6 fill-current">
                    <path fill-rule="evenodd" d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z"></path>
                </svg>
            </button>
        </div>
    </nav>
    <div class="md:hidden" x-show="mobileMenu" x-cloak x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 transform scale-90" x-transition:enter-end="opacity-100 transform scale-100" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 transform scale-100" x-transition:leave-end="opacity-0 transform scale-90">
        <a href="#accueil" class="block py-2 px-4 text-sm hover:bg-gray-200">Accueil</a>
        <a href="#catalogue" class="block py-2 px-4 text-sm hover:bg-gray-200">Catalogue</a>
        <a href="#" class="block py-2 px-4 text-sm hover:bg-gray-200">Service</a>
        <a href="#" class="block py-2 px-4 text-sm hover:bg-gray-200">Connexion</a>
        <a href="#" class="block py-2 px-4 text-sm bg-primary text-white hover:bg-primary-dark">S'inscrire</a>
    </div>
</header>