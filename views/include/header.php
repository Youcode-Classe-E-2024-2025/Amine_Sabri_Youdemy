<header class="bg-white shadow p-4">
    <div class="flex justify-between items-center">
        <h2 class="text-xl font-semibold"></h2>
        <div class="flex items-center space-x-4">
            <div class="relative">
                <button class="flex items-center space-x-2 px-2 rounded-3xl bg-gray-800 text-white">
                    <span><?= $_SESSION['username']?></span>
                    <i class="bi bi-person-fill"></i>
                </button>
                <div class="absolute right-0 mt-2 w-48 bg-white shadow-lg rounded-lg border border-gray-200 hidden group-hover:block">
                    <ul class="py-2">
                        <li>
                            <a href="profil.php" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Profil</a>
                        </li>
                        <li>
                            <form action="../../index.php?action=logout" method="POST" class="block">
                                <input type="hidden" name="name">
                                <button type="submit" class="w-full px-4 py-2 text-gray-700 hover:bg-gray-100 text-left">
                                    Déconnexion
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>