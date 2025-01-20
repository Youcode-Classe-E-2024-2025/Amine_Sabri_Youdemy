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
  </script>
</body>
</html>
