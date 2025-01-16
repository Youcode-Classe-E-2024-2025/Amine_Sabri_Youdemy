<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un Cours</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-8">

    <h1 class="text-3xl font-semibold text-center mb-6">Créer un Nouveau Cours</h1>

    <form action="../controller/coursController.php" method="POST" enctype="multipart/form-data" class="bg-white p-8 rounded-md shadow-md">
        <div class="grid grid-cols-2 gap-4">
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">Titre:</label>
                <input type="text" name="title" class="mt-1 mb-3 px-3 py-2 border border-gray-300 rounded-md w-full" required>
            </div>

            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Description:</label>
                <textarea name="description" class="mt-1 mb-3 px-3 py-2 border border-gray-300 rounded-md w-full" required></textarea>
            </div>

            <div class="mb-4">
                <label for="video_url" class="block text-sm font-medium text-gray-700">Vidéo:</label>
                <input type="file" name="video_url" class="mt-1 mb-3 px-3 py-2 border border-gray-300 rounded-md w-full" required>
            </div>

            <div class="mb-4">
                <label for="image_url" class="block text-sm font-medium text-gray-700">Image:</label>
                <input type="file" name="image_url" class="mt-1 mb-3 px-3 py-2 border border-gray-300 rounded-md w-full" required>
            </div>

            <div class="mb-4">
                <label for="document_url" class="block text-sm font-medium text-gray-700">Document:</label>
                <input type="file" name="document_url" class="mt-1 mb-3 px-3 py-2 border border-gray-300 rounded-md w-full">
            </div>

            <div class="mb-4">
                <label for="category_id" class="block text-sm font-medium text-gray-700">Catégorie:</label>
                <input type="text" name="category_id" value="1" class="mt-1 mb-3 px-3 py-2 border border-gray-300 rounded-md w-full" required>
            </div>

            <div class="mb-4">
                <label for="price" class="block text-sm font-medium text-gray-700">Prix:</label>
                <input type="number" step="0.01" name="price" class="mt-1 mb-3 px-3 py-2 border border-gray-300 rounded-md w-full" required>
            </div>

            <div class="mb-4">
                <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-md hover:bg-blue-600">Créer</button>
            </div>
        </div>
    </form>

</body>
</html>
