<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un utilisateur</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body >

    <div class="container  mx-auto mt-20 max-w-md bg-gray-200 p-6 rounded-lg shadow-lg">
        <h1 class="text-2xl text-center font-bold mb-5 text-green-700">Créer un compte</h1>

        <form action="../../index.php?action=create" method="POST" >
            <div class="grid grid-cols-2 gap-x-4 ">
                <div class="mb-2">
                    <label for="username" class="block text-green-700 font-bold mb-2 text-sm">Nom d'utilisateur:</label>
                    <input type="text" id="username" name="username" class="shadow appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-green-500" required>
                </div>
    
                <div class="mb-2">
                    <label for="email" class="block text-green-700 font-bold mb-2 text-sm">Email:</label>
                    <input type="email" id="email" name="email" class="shadow appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-green-500" required>
                </div>
            </div>

            <div class="mb-2">
                <label for="password" class="block text-green-700 font-bold mb-2 text-sm">Mot de passe:</label>
                <input type="password" id="password" name="password" class="shadow appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-green-500" required>
            </div>

            <div class="mb-2">
                <label for="role_id" class="block text-green-700 font-bold mb-2 text-sm">Rôle:</label>
                <select id="role_id" name="role_id" class="shadow appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-green-500" required>
                    <option value="2">Enseignant</option>
                    <option value="3">Étudiant</option>
                </select>
            </div>

            <div class="flex items-center justify-center">
                <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">S'inscrire</button>
            </div>
        </form>
        <div class="mt-1 text-center">
            <p>Vous avez déjà un compte ? <a href="./signIn.php" class="text-green-700 font-bold hover:text-green-900">Connectez-vous</a></p>
        </div>
    </div>

</body>
</html>
