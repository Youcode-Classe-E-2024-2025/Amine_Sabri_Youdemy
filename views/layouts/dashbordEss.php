<?php require_once './model/tags.php'?>
<?php require_once './model/categorie.php'?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Admin - Gestion des Cours</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">

  <!-- Sidebar -->
  <div class="flex">
    <div class="w-64  bg-gray-800 text-white p-4">
      <h2 class="text-2xl font-bold mb-6">Admin Dashboard</h2>
      <ul>
        <li><a href="#" class="block py-2 px-4 hover:bg-gray-700 rounded">Vue d'ensemble</a></li>
        <li><a href="#" class="block py-2 px-4 hover:bg-gray-700 rounded">Gestion des Cours</a></li>
        <li><a href="#" class="block py-2 px-4 hover:bg-gray-700 rounded">Statistiques</a></li>
      </ul>
    </div>
    <!-- Main Content -->
    <div class="flex-1">
        <?php include('./views/include/header.php')?>
        <div class="mt-6 p-6">
          <div class= "mb-6">
              <?php include('./views/statistiques.php') ?>

          </div>
          <h3 class="text-2xl font-semibold text-gray-800">Gestion des Cours</h3>
        <div class="bg-white shadow-md rounded-lg p-4 mt-4">
      <botton id ="bottonAjouterCouer" class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600">Ajouter un Cours</botton>
    </div>

    <table class="min-w-full bg-white shadow-md rounded-lg mt-6">
        <thead>
            <tr>
                <th class="py-2 px-4 text-left text-gray-600">Titre</th>
                <th class="py-2 px-4 text-left text-gray-600">Catégorie</th>
                <th class="py-2 px-4 text-left text-gray-600">Tags</th>
                <th class="py-2 px-4 text-left text-gray-600">Actions</th>
            </tr>
        </thead>
        <tbody>
          <?php if (!empty($courses)) : ?>
              <?php foreach ($courses as $course) : ?>
                  <tr class="border-t">
                      <td class="py-2 px-4 text-gray-700"><?= htmlspecialchars($course['title']) ?></td>
                      <td class="py-2 px-4 text-gray-700"><?= htmlspecialchars($course['name']) ?></td>
                      <td class="py-2 px-4 text-gray-700"><?= htmlspecialchars($course['tags']) ?></td>
                      <td class="py-2 px-4 text-gray-700">
                          <a href="index.php?action=deleteCours&id=<?= $course['id'] ?>" class="bg-yellow-500 text-white py-1 px-3 rounded-md hover:bg-yellow-600">Modifier</a>
                          <a href="index.php?action=deleteCours&id=<?= $course['id'] ?>" class="bg-red-500 text-white py-1 px-3 rounded-md hover:bg-red-600">Supprimer</a>
                      </td>
                  </tr>
              <?php endforeach; ?>
              <?php else : ?>
                  <tr>
                      <td colspan="4" class="py-2 px-4 text-center text-gray-700">Aucun cours trouvé.</td>
                  </tr>
              <?php endif; ?>
        </tbody>
    </table>

<!-- Pagination -->
      <div class="mt-4 mb-10">
          <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
              <a href="./index.php?<?= http_build_query(['action' => 'afficherCours', 'page' => $i]) ?>" 
                class="py-2 px-4 <?= $page == $i ? 'bg-blue-500 text-white' : 'bg-gray-200 text-gray-700' ?> rounded-md mx-1">
                  <?= $i ?>
              </a>
          <?php endfor; ?>
      </div>
      
  <div id="formJouteCours" class="container mx-auto ">
  <form action="./index.php?action=createCours" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow-md">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
      <!-- Titre -->
      <div>
        <label for="title" class="block text-gray-700 font-bold">Titre du cours :</label>
        <input type="text" name="title" id="title" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Ex: Introduction à JavaScript">
      </div>

      <!-- Prix -->
      <div>
        <label for="price" class="block text-gray-700 font-bold">Prix :</label>
        <input type="number" step="0.01" name="price" id="price" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Ex: 99.99">
      </div>

      
      <!-- Catégorie -->
      <div>
          <?php $categories = Category::readAll();?>
        <label for="category_id" class="block text-gray-700 font-bold">Catégorie :</label>
        <select name="category_id" id="category_id" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
          <option value="" disabled selected>Choisir une catégorie</option>
          <?php foreach ($categories as $category): ?>
            <option value="<?= $category['id'] ?>"><?= htmlspecialchars($category['name']) ?></option>
            <?php endforeach; ?>
          </select>
        </div>

        
        <!-- Image -->
        <div>
          <label for="image_url" class="block text-gray-700 font-bold">Image du cours :</label>
          <input type="file" name="image_url" id="image_url" accept="image/*" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
        
        <!-- Document -->
        <div>
          <label for="document_url" class="block text-gray-700 font-bold">Document associé :</label>
          <input type="file" name="document_url" id="document_url" accept=".pdf,.doc,.docx" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
        
        <!-- Tags -->
        <!-- Vidéo -->
        <div>
          <label for="video_url" class="block text-gray-700 font-bold">Vidéo associée :</label>
          <input type="file" name="video_url" id="video_url" accept="video/*" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
        <div>
            <?php $tags = Tag::findAll();?>
          <label for="tags" class="block text-gray-700 font-bold">Tags :</label>
          <select name="tags[]" id="tags" multiple class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            <?php foreach ($tags as $tag): ?>
              <option value="<?= $tag['id'] ?>"><?= htmlspecialchars($tag['name']) ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <!-- Description -->
          <div>
            <label for="description" class="block text-gray-700 font-bold">Description :</label>
            <textarea name="description" id="description" required rows="4" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Ajoutez une description pour le cours"></textarea>
          </div>
    </div>

    <!-- Bouton Soumettre -->
    <div class="flex justify-end mt-6">
      <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600">Ajouter le cours</button>
    </div>
  </form>
</div>

  </div>
  <script>

document.querySelector('.relative').addEventListener('click', function() {
    const dropdown = this.querySelector('.absolute');
    dropdown.classList.toggle('hidden');
});

const bottonAjouterCouer = document.querySelector("#bottonAjouterCouer");
const formJouteCours = document.querySelector("#formJouteCours");

bottonAjouterCouer.addEventListener('click',function(){
  formJouteCours.classList.toggle("hidden");
})
</script>
</body>
</html>
