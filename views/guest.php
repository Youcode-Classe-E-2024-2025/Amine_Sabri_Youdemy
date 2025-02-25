<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Youdemy - Révolutionnez votre apprentissage en ligne</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
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
        html {
            scroll-behavior: smooth;
        }
    </style>
</head>
<body class="bg-gray-50 font-sans" x-data="{ mobileMenu: false }">
    <?php include('./views/include/headerUser.php') ?>
    <main class="pt-16">
        <section id="accueil" class="relative bg-gradient-to-br from-primary via-purple-600 to-secondary text-white py-40 overflow-hidden">
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
                        <img src="./uploads/image.png" width="20px" alt="Youdemy learning platform" class="rounded-lg shadow-2xl">
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

        <section id = "catalogue" class="container mx-auto px-6 py-16">
            <h2 class="text-4xl font-bold text-center mb-12">Explorez nos cours populaires</h2>
            <div class="mb-10">
                <form method="POST" class="relative" x-data="{ search: '' }">
                    <input type="text" name="keyword" placeholder="Rechercher un cours..." x-model="search" class="w-full px-6 py-3 rounded-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-primary">
                    <button class="absolute right-2 top-2 bg-primary text-white p-2 rounded-full hover:bg-primary-dark transition duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </button>
                </form>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                <!-- Course Card 1 -->
                <?php foreach ($courses as $course): ?>
                <div class="bg-white rounded-xl h-fit shadow-lg overflow-hidden transform transition duration-300 hover:scale-105" x-data="{ hover: false }" @mouseenter="hover = true" @mouseleave="hover = false">
                    <div class="relative">
                        <img src="./uploads/<?= htmlspecialchars($course['image_url']); ?>" alt="<?= htmlspecialchars($course['title']); ?>" class="w-full h-48 object-cover">
                        <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center opacity-0 transition-opacity duration-300" :class="{ 'opacity-100': hover }">
                            <?php if(isset($_SESSION['username'])): ?>
                                <a href="index.php?action=showCourse&id=<?= $course['id']; ?>" 
                                    class="bg-white text-primary px-4 py-2 rounded-full hover:bg-primary hover:text-white transition duration-300">
                                    Voir le cours
                                </a>                            
                            <?php else: ?>
                                <a href="./views/sign/signIn.php" class="bg-white text-primary px-4 py-2 rounded-full hover:bg-primary hover:text-white transition duration-300">Voir le cours</a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex justify-between items-center mb-4">
                            <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded"> <?= htmlspecialchars($course['name']); ?></span>
                            <span class="text-gray-600">4.8 ⭐️</span>
                        </div>
                        <h3 class="font-bold text-xl mb-2"><?= htmlspecialchars($course['title']); ?></h3>
                        <!-- <p class="text-gray-600 mb-4"><?= htmlspecialchars($course['description']); ?></p> -->
                        <div class="flex justify-between items-center">
                            <span class="text-primary font-bold"><?= htmlspecialchars($course['price']); ?> €</span>
                            <!-- <a href="course.php?id=<?= $course['id']; ?>" class="text-white bg-primary px-4 py-2 rounded-full hover:bg-primary-dark transition duration-300">En savoir plus</a> -->
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <!-- pagination -->
            <div class="flex justify-center mt-6">
                <ul class="flex space-x-2">
                    <li class="page-item <?= $page == 1 ? 'disabled' : ''; ?>">
                        <a class="page-link <?= $page == 1 ? 'cursor-not-allowed' : 'hover:bg-blue-500 hover:text-white'; ?> 
                            bg-blue-300 text-white rounded-lg p-2 transition duration-300" 
                            href="?<?= http_build_query(array_merge($_GET, ['page' => $page - 1])); ?>#catalogue" aria-label="Previous">
                            <span aria-hidden="true" class="bi bi-chevron-left"></span>
                        </a>
                    </li>

                    <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
                        <li class="page-item <?= $i == $page ? 'bg-blue-500 text-white' : ''; ?> 
                            rounded-lg shadow-md">
                            <a class="page-link <?= $i == $page ? 'cursor-default' : 'hover:bg-blue-500 hover:text-white'; ?> 
                                bg-blue-300 text-white rounded-lg p-2 transition duration-300" 
                                href="?<?= http_build_query(array_merge($_GET, ['page' => $i])); ?>#catalogue">
                                <?= $i; ?>
                            </a>
                        </li>
                    <?php endfor; ?>

                    <li class="page-item <?= $page == $totalPages ? 'disabled' : ''; ?>">
                        <a class="page-link <?= $page == $totalPages ? 'cursor-not-allowed' : 'hover:bg-blue-500 hover:text-white'; ?> 
                            bg-blue-300 text-white rounded-lg p-2 transition duration-300" 
                            href="?<?= http_build_query(array_merge($_GET, ['page' => $page + 1])); ?>#catalogue" aria-label="Next">
                            <span aria-hidden="true" class="bi bi-chevron-right"></span>
                        </a>
                    </li>
                </ul>
            </div>
        </section>

        <section id="service" class="bg-gray-100 py-16">
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
    <?php include('./views/include/footerUser.php') ?>
</body>
</html>