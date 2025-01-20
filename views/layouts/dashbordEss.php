<?php require_once './model/tags.php'?>
<?php require_once './model/categorie.php'?>
<?php require_once './model/cours.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Youdemy Header</title>
</head>
<body>
  <header class="bg-gray-800 text-white">
    <div class="container mx-auto flex justify-between items-center py-4 px-6">
      <div class="text-xl font-bold">
        <a href="#" class="hover:text-gray-300">Youdemy</a>
      </div>
      <nav class="flex space-x-6">
        <a href="#" class="hover:text-gray-300">Cours</a>
        <a href="#" class="hover:text-gray-300">Statistiques</a>
      </nav>
      <div class="relative">
        <button id="dropdownButton" class="flex items-center space-x-2 focus:outline-none"> 
          <span id="username" class="font-medium"><?php echo $_SESSION['username'] ?></span>
          <i class="bi bi-chevron-down"></i>
        </button>
        <div id="dropdownMenu" class="hidden absolute right-0 mt-2 w-48 bg-white text-gray-800 rounded-md shadow-lg p-2">
            <a href="index.php?action=logout"  class="w-full text-left hover:bg-gray-100 focus:outline-none">Déconnexion</a>
        </div>
      </div>
    </div>
  </header>
  <main>
    <section class="p-6">
      <button id ="bottonAjouterCouer" class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600">Ajouter un Cours</button>
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
            <!-- <?php var_dump($courses) ?> -->
            <?php if (!empty($courses)) : ?>
                <?php foreach ($courses as $course) : ?>
                    <tr class="border-t">
                        <td class="py-2 px-4 text-gray-700"><?= htmlspecialchars($course['title']) ?></td>
                        <td class="py-2 px-4 text-gray-700"><?= htmlspecialchars($course['name']) ?></td>
                        <td class="py-2 px-4 text-gray-700"><?= htmlspecialchars($course['tags']) ?></td>
                        <td class="py-2 px-4 text-gray-700">
                            <a  href="index.php?action=afficherCours&id=<?= $course['id'] ?>" class="bg-yellow-500 text-white py-1 px-3 rounded-md hover:bg-yellow-600">Modifier</a>
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
        <div class="mt-4 mb-10">
          <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
              <a href="./index.php?<?= http_build_query(['action' => 'afficherCoursEnss', 'page' => $i]) ?>" 
                class="py-2 px-4 <?= $page == $i ? 'bg-blue-500 text-white' : 'bg-gray-200 text-gray-700' ?> rounded-md mx-1">
                  <?= $i ?>
              </a>
          <?php endfor; ?>
        </div>
    </section>
    <div id="formJouteCours" class="container mx-auto hidden">
        <form action="./index.php?action=createCours" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow-md">
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
              <label for="title" class="block text-gray-700 font-bold">Titre du cours :</label>
              <input type="text" name="title" id="title" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Ex: Introduction à JavaScript">
            </div>
            <div>
              <label for="price" class="block text-gray-700 font-bold">Prix :</label>
              <input type="number" step="0.01" name="price" id="price" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Ex: 99.99">
            </div>
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
              <div>
                <label for="image_url" class="block text-gray-700 font-bold">Image du cours :</label>
                <input type="file" name="image_url" id="image_url" accept="image/*" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
              </div>
              <div>
                <label for="document_url" class="block text-gray-700 font-bold">Document associé :</label>
                <input type="file" name="document_url" id="document_url" accept=".pdf,.doc,.docx" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
              </div>
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
              <div>
                <label for="description" class="block text-gray-700 font-bold">Description :</label>
                <textarea name="description" id="description" required rows="4" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Ajoutez une description pour le cours"></textarea>
              </div>
          </div>
          <div class="flex justify-end mt-6">
            <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600">Ajouter le cours</button>
          </div>
        </form>
    </div>
  </main>

  <script>
    const dropdownButton = document.getElementById('dropdownButton');
    const dropdownMenu = document.getElementById('dropdownMenu');

    dropdownButton.addEventListener('click', () => {
      dropdownMenu.classList.toggle('hidden');
    });

    document.addEventListener('click', (event) => {
      if (
        !dropdownButton.contains(event.target) &&
        !dropdownMenu.contains(event.target)
      ) {
        dropdownMenu.classList.add('hidden');
      }
    });

    const bottonAjouterCouer = document.querySelector("#bottonAjouterCouer");
      const formJouteCours = document.querySelector("#formJouteCours");


        bottonAjouterCouer.addEventListener('click',function(){
          formJouteCours.classList.toggle("hidden");
        });
  </script>
</body>
</html>
