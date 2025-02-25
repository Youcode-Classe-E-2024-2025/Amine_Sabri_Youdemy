<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un utilisateur</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body >
<header>
    <div class="text-2xl font-bold text-blue-500 p-6">
        <a href="#" class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mr-2" viewBox="0 0 20 20" fill="currentColor">
                <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838l-2.727 1.17 1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zm5.99 7.176A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z"/>
            </svg>
            Youdemy
        </a>
    </div>
</header>
    <?php

    session_start();
    if (isset($_SESSION['message'])) {
        echo '
        <div class="flex justify-center items-center p-4  fixed top-0 left-0 w-full z-50 ">
            <p id="message" class="text-white bg-green-400 border-2 border-green-400 w-fit p-1 space-x-9 rounded-lg text-center">
                ' . $_SESSION['message'] . '
            </p>
        </div>';
        unset($_SESSION['message']);
    }
    ?>
    <div class="container  mx-auto mt-16 max-w-md bg-gray-200 p-6 rounded-lg shadow-lg">
        <h1 class="text-2xl text-center  font-bold mb-5 text-blue-500">Connexion</h1>

        <form action="../../index.php?action=connexion" method="POST" class="">
            <div class="mb-4">
                <label for="email" class="block text-blue-500 font-bold mb-2 text-sm">Email:</label>
                <input type="email" id="email" name="email" class="shadow appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-green-500" required>
            </div>

            <div class="mb-4">
                <label for="password" class="block text-blue-500 font-bold mb-2 text-sm">Mot de passe:</label>
                <input type="password" id="password" name="password" class="shadow appearance-none border  w-full py-2 px-3  rounded-lg text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-green-500" required>
            </div>
            <div class="flex items-center justify-center">
                <button type="submit" class="bg-blue-500 hover:bg-blue-500 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Se connecter</button>
            </div>
        </form>
        <div class="mt-4 text-center">
            <p>Vous n'avez pas de compte ? <a href="./signUp.php" class="text-blue-500 font-bold hover:text-green-900">Créez un compte</a></p>
        </div>
    </div>

<script src="../../assets/js/script.js"></script>
</body>
</html>
