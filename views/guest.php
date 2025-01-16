<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Youdemy - Révolutionnez votre apprentissage en ligne</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#4F46E5',
                        secondary: '#10B981',
                        accent: '#F59E0B',
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                }
            }
        }
    </script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="bg-gray-50 font-sans" x-data="{ mobileMenu: false }">
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
                    <a href="#" class="text-gray-600 hover:text-primary transition duration-300">Accueil</a>
                    <a href="#" class="text-gray-600 hover:text-primary transition duration-300">Catalogue</a>
                    <a href="#" class="text-gray-600 hover:text-primary transition duration-300">Service</a>
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
            <a href="#" class="block py-2 px-4 text-sm hover:bg-gray-200">Accueil</a>
            <a href="#" class="block py-2 px-4 text-sm hover:bg-gray-200">Catalogue</a>
            <a href="#" class="block py-2 px-4 text-sm hover:bg-gray-200">Service</a>
            <a href="#" class="block py-2 px-4 text-sm hover:bg-gray-200">Connexion</a>
            <a href="#" class="block py-2 px-4 text-sm bg-primary text-white hover:bg-primary-dark">S'inscrire</a>
        </div>
    </header>

    <main class="pt-16">
        <section class="relative bg-gradient-to-br from-primary via-purple-600 to-secondary text-white py-40 overflow-hidden">
            <div class="container mx-auto px-6 relative z-10">
                <div class="md:flex md:items-center md:justify-between">
                    <div class="md:w-1/2 mb-8 md:mb-0">
                        <h1 class="text-5xl md:text-6xl font-bold mb-6 leading-tight"  >
                            Transformez votre avenir avec <span class="text-yellow-300">Youdemy</span>
                        </h1>
                        <p class="text-xl mb-8 max-w-lg"  >
                            Découvrez une nouvelle ère d'apprentissage en ligne. Des cours interactifs, des experts passionnés, et une communauté dynamique vous attendent.
                        </p>
                    </div>
                    <div class="md:w-1/2 relative"  >
                        <img src="./image.png" width="20px" alt="Youdemy learning platform" class="rounded-lg shadow-2xl">
                        <div class="absolute -bottom-10 -left-10 bg-accent text-white p-6 rounded-lg shadow-lg transform rotate-3 animate-pulse">
                            <p class="font-bold text-2xl">+1000 cours</p>
                            <p class="text-lg">dans diverses catégories</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="absolute top-0 left-0 right-0 h-64 bg-gradient-to-b from-black to-transparent opacity-50"></div>
            <div class="absolute bottom-0 left-0 right-0">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#f3f4f6" fill-opacity="1" d="M0,96L48,112C96,128,192,160,288,160C384,160,480,128,576,112C672,96,768,96,864,112C960,128,1056,160,1152,160C1248,160,1344,128,1392,112L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>
            </div>
        </section>

        <section class="container mx-auto px-6 py-16">
            <h2 class="text-4xl font-bold text-center mb-12">Explorez nos cours populaires</h2>
            <div class="mb-10">
                <div class="relative" x-data="{ search: '' }">
                    <input type="text" placeholder="Rechercher un cours..." x-model="search" class="w-full px-6 py-3 rounded-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-primary">
                    <button class="absolute right-2 top-2 bg-primary text-white p-2 rounded-full hover:bg-primary-dark transition duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </button>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                <!-- Course Card 1 -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden transform transition duration-300 hover:scale-105" x-data="{ hover: false }" @mouseenter="hover = true" @mouseleave="hover = false">
                    <div class="relative">
                        <img src="./image1.png" alt="Introduction à la programmation" class="w-full h-48 object-cover">
                        <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center opacity-0 transition-opacity duration-300" :class="{ 'opacity-100': hover }">
                            <a href="#" class="bg-white text-primary px-4 py-2 rounded-full hover:bg-primary hover:text-white transition duration-300">Voir le cours</a>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex justify-between items-center mb-4">
                            <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded">Programmation</span>
                            <span class="text-gray-600">4.8 ⭐️</span>
                        </div>
                        <h3 class="font-bold text-xl mb-2">Introduction à la programmation</h3>
                        <p class="text-gray-600 mb-4">Apprenez les bases de la programmation avec ce cours complet pour débutants.</p>
                        <div class="flex justify-between items-center">
                            <span class="text-primary font-bold">39,99 €</span>
                            <a href="#" class="text-white bg-primary px-4 py-2 rounded-full hover:bg-primary-dark transition duration-300">En savoir plus</a>
                        </div>
                    </div>
                </div>
                <!-- Course Card 2 -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden transform transition duration-300 hover:scale-105" x-data="{ hover: false }" @mouseenter="hover = true" @mouseleave="hover = false">
                    <div class="relative">
                        <img src="./image.png" alt="Design UX/UI avancé" class="w-full h-48 object-cover">
                        <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center opacity-0 transition-opacity duration-300" :class="{ 'opacity-100': hover }">
                            <a href="#" class="bg-white text-primary px-4 py-2 rounded-full hover:bg-primary hover:text-white transition duration-300">Voir le cours</a>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex justify-between items-center mb-4">
                            <span class="bg-pink-100 text-pink-800 text-xs font-semibold px-2.5 py-0.5 rounded">Design</span>
                            <span class="text-gray-600">4.9 ⭐️</span>
                        </div>
                        <h3 class="font-bold text-xl mb-2">Design UX/UI avancé</h3>
                        <p class="text-gray-600 mb-4">Maîtrisez les techniques avancées de design d'interface utilisateur.</p>
                        <div class="flex justify-between items-center">
                            <span class="text-primary font-bold">59,99 €</span>
                            <a href="#" class="text-white bg-primary px-4 py-2 rounded-full hover:bg-primary-dark transition duration-300">En savoir plus</a>
                        </div>
                    </div>
                </div>
                <!-- Course Card 3 -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden transform transition duration-300 hover:scale-105" x-data="{ hover: false }" @mouseenter="hover = true" @mouseleave="hover = false">
                    <div class="relative">
                        <img src="./image2.png" alt="Marketing digital" class="w-full h-48 object-cover">
                        <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center opacity-0 transition-opacity duration-300" :class="{ 'opacity-100': hover }">
                            <a href="#" class="bg-white text-primary px-4 py-2 rounded-full hover:bg-primary hover:text-white transition duration-300">Voir le cours</a>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex justify-between items-center mb-4">
                            <span class="bg-green-100 text-green-800 text-xs font-semibold px-2.5 py-0.5 rounded">Marketing</span>
                            <span class="text-gray-600">4.7 ⭐️</span>
                        </div>
                        <h3 class="font-bold text-xl mb-2">Marketing digital</h3>
                        <p class="text-gray-600 mb-4">Découvrez les stratégies efficaces pour promouvoir votre entreprise en ligne.</p>
                        <div class="flex justify-between items-center">
                            <span class="text-primary font-bold">49,99 €</span>
                            <a href="#" class="text-white bg-primary px-4 py-2 rounded-full hover:bg-primary-dark transition duration-300">En savoir plus</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-12 flex justify-center">
                <nav class="inline-flex rounded-md shadow" aria-label="Pagination">
                    <a href="#" class="px-4 py-2 rounded-l-md bg-white text-gray-700 hover:bg-gray-50 transition duration-300">Précédent</a>
                    <a href="#" class="px-4 py-2 bg-primary text-white hover:bg-primary-dark transition duration-300">1</a>
                    <a href="#" class="px-4 py-2 bg-white text-gray-700 hover:bg-gray-50 transition duration-300">2</a>
                    <a href="#" class="px-4 py-2 bg-white text-gray-700 hover:bg-gray-50 transition duration-300">3</a>
                    <a href="#" class="px-4 py-2 rounded-r-md bg-white text-gray-700 hover:bg-gray-50 transition duration-300">Suivant</a>
                </nav>
            </div>
        </section>

        <section class="bg-gray-100 py-16">
            <div class="container mx-auto px-6">
                <h2 class="text-4xl font-bold text-center mb-12">Pourquoi choisir Youdemy ?</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                    <div class="bg-white p-6 rounded-xl shadow-md transform transition duration-300 hover:scale-105">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-primary mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        <h3 class="text-xl font-semibold mb-2">Cours interactifs</h3>
                        <p class="text-gray-600">Nos cours sont conçus pour être engageants et interactifs, favorisant un apprentissage actif.</p>
                    </div>
                    <div class="bg-white p-6 rounded-xl shadow-md transform transition duration-300 hover:scale-105">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-primary mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                        </svg>
                        <h3 class="text-xl font-semibold mb-2">Apprentissage personnalisé</h3>
                        <p class="text-gray-600">Adaptez votre parcours d'apprentissage à votre rythme et à vos objectifs personnels.</p>
                    </div>
                    <div class="bg-white p-6 rounded-xl shadow-md transform transition duration-300 hover:scale-105">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-primary mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                        <h3 class="text-xl font-semibold mb-2">Certificats reconnus</h3>
                        <p class="text-gray-600">Obtenez des certificats reconnus par l'industrie pour valoriser vos nouvelles compétences.</p>
                    </div>
                </div>
            </div>
        </section>

    </main>

    <footer class="bg-gray-800 text-white py-12">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-2xl font-semibold mb-4">Youdemy</h3>
                    <p class="text-gray-400">Plateforme de cours en ligne innovante pour tous.</p>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-4">Liens rapides</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white transition duration-300">Accueil</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition duration-300">Catalogue</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition duration-300">À propos</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition duration-300">Contact</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-4">Nous contacter</h4>
                    <p class="text-gray-400">Email: contact@youdemy.com</p>
                    <p class="text-gray-400">Téléphone: +33 1 23 45 67 89</p>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-4">Suivez-nous</h4>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-white transition duration-300">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"/></svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition duration-300">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"/></svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition duration-300">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd"/></svg>
                        </a>
                    </div>
                </div>
            </div>
            <div class="mt-8 border-t border-gray-700 pt-8 text-center">
                <p class="text-gray-400">&copy; 2025 Youdemy. Tous droits réservés.</p>
            </div>
        </div>
    </footer>
</body>
</html>