<?php require_once './model/tags.php'?>
<?php require_once './model/categorie.php'?>
<?php require_once './model/cours.php'?>
<?php require_once './controller/coursController.php'?>
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
        <a href="index.php?action=afficherCoursEnss" class="hover:text-gray-300">Cours</a>
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
      <button id ="bottonUpdateCouer" class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600">Update un Cours</button>
        <table class="min-w-full bg-white shadow-md rounded-lg mt-6">
            <thead>
                <tr>
                    <th class="py-2 px-4 text-left text-gray-600">Titre</th>
                    <th class="py-2 px-4 text-left text-gray-600">Catégorie</th>
                    <th class="py-2 px-4 text-left text-gray-600">Tags</th>
                    <th class="py-2 px-4 text-left text-gray-600">Price</th>
                    <th class="py-2 px-4 text-left text-gray-600">Image</th>
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
                        <td class="py-2 px-4 text-gray-700"><?= htmlspecialchars($course['price']) ?></td>
                        <td class="py-2 px-4 text-gray-700">    <img src="./uploads/<?= htmlspecialchars($course['image_url']) ?>" alt="Image du cours" class="h-12 w-12 object-cover"></td>
                        <td class="py-2 px-4 text-gray-700">
                            <a  href="index.php?action=afficherCoursEnss&id=<?= $course['id'] ?>" class=" text-yellow-400 py-1 px-3 rounded-md "><i class="bi bi-pencil-square"></i></a>
                            <a href="index.php?action=deleteCours&id=<?= $course['id'] ?>" class="text-red-500 py-1 px-3 rounded-md"><i class="bi bi-trash"></i></a>
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
    <section id="formJouteCours" class="container mx-auto hidden">
        <form action="./index.php?action=createCours" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow-md">
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
              <label for="title" class="block text-gray-700 font-bold">Titre du cours :</label>
              <input type="text" name="title" id="title" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Ex: Introduction à JavaScript">
            </div>
            <input type="hidden" name="created_by" id="created_by" value ="<?php echo $_SESSION['user_id'] ?>" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Ex: Introduction à JavaScript">
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
    </section>


    <section id="formUpdateCours" class="hidden">
        <?php 
        $id = $_GET["id"] ?? '';
        $courses = Course::readOne($id);
        // var_dump($courses);
        ?>
        <form action="./index.php?action=UpdateCours" method="POST" enctype="multipart/form-data" class="max-w-4xl mx-auto p-6 bg-white rounded-lg shadow-lg space-y-6">
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700">Titre du cours</label>
                <input type="text" name="title" value="<?= $courses['title'] ?? '' ?>" required class="mt-1 block w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <input type="hidden" name="id" value="<?= $id ?>" required class="mt-1 block w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea name="description" required class="mt-1 block w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"><?= $courses['description'] ?? '' ?></textarea>
            </div>

            <div>
                <?php $categories = Category::readAll(); ?>
                <label for="category_id" class="block text-sm font-medium text-gray-700">Catégorie</label>
                <select name="category_id" id="category_id" required class="mt-1 block w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="" disabled selected>Choisir une catégorie</option>
                    <?php foreach ($categories as $category): ?>
                        <option value="<?= $category['id'] ?>">
                            <?= htmlspecialchars($category['name']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div>
                <label for="price" class="block text-sm font-medium text-gray-700">Prix</label>
                <input type="number" name="price" value="<?= $courses['price'] ?>" required class="mt-1 block w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label for="image_url" class="block text-sm font-medium text-gray-700">Image</label>
                <input type="file" name="image_url" value="<?= $courses['image_url'] ?>" class="mt-1 block w-full text-gray-700 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            <div>
                <label for="document_url" class="block text-sm font-medium text-gray-700">Document</label>
                <input type="file" name="document_url" class="mt-1 block w-full text-gray-700 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

            <div>
                <label for="video_url" class="block text-sm font-medium text-gray-700">Vidéo</label>
                <input type="file" name="video_url" class="mt-1 block w-full text-gray-700 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="px-6 py-3 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">Mettre à jour</button>
            </div>
        </form>

    </section>
    <section class="p-6">
    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Utilisateurs Inscrits aux Cours</h2>
    <?php 
        $users = CourseController::showUsersByCreator();
    ?>
    <table class="min-w-full table-auto border-collapse border border-gray-200">
        <thead class="bg-gray-100">
            <tr>
                <th class="py-2 px-4 text-left text-sm font-medium text-gray-700">Username</th>
                <th class="py-2 px-4 text-left text-sm font-medium text-gray-700">Email</th>
                <th class="py-2 px-4 text-left text-sm font-medium text-gray-700">Course Title</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($users)): ?>
                <?php foreach ($users as $user): ?>
                    <tr class="border-t border-gray-200 hover:bg-gray-50">
                        <td class="py-2 px-4 text-sm text-gray-700"><?= htmlspecialchars($user['username']) ?></td>
                        <td class="py-2 px-4 text-sm text-gray-700"><?= htmlspecialchars($user['email']) ?></td>
                        <td class="py-2 px-4 text-sm text-gray-700"><?= htmlspecialchars($user['course_title']) ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="3" class="py-2 px-4 text-center text-gray-500">Aucun utilisateur trouvé.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</section>

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
    const bottonUpdateCouer = document.querySelector("#bottonUpdateCouer");
    const formJouteCours = document.querySelector("#formJouteCours");
    const formUpdateCours = document.querySelector("#formUpdateCours");


        bottonAjouterCouer.addEventListener('click',function(){
          formJouteCours.classList.toggle("hidden");
        });
        bottonUpdateCouer.addEventListener('click',function(){
          formUpdateCours.classList.toggle("hidden");
        });
  </script>
</body>
</html>
