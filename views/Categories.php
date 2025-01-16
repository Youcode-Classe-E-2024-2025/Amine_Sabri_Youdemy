<?php require_once __DIR__ . "/../controller/categorieController.php" ?>
<div class="container mx-auto p-6 bg-white shadow-md rounded-lg">
    <h1 class="text-3xl font-semibold text-center text-gray-700 mb-2">Liste des Catégories</h1>
    <div class="overflow-x-auto">
        <table class="table-auto w-full text-left border-collapse border border-gray-200">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <!-- <th class="px-6 py-3 border border-gray-300">ID</th> -->
                    <th class="px-6 py-3 border border-gray-300">Nom</th>
                    <th class="px-6 py-3 border border-gray-300 text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($Categories)): ?>
                    <?php foreach ($Categories as $category): ?>
                        <tr class="hover:bg-gray-100 border-b border-gray-200">
                            <!-- <td class="px-6 py-3"><?= $category['id'];?></td> -->
                            <td class="px-6 py-3"><?= $category['name']; ?></td>
                            <td class="px-6 py-3 text-center">
                                <a href="dashbord.php?page=categories&id=<?= $category['id']; ?>"                                    class="inline-block text-yellow-500 hover:text-yellow-600">
                                    <i class="bi bi-pencil-square text-xl"></i>
                                </a>
                                <form action="../../index.php?action=deleteCategories" method="POST" class="inline-block" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette catégorie ?');">
                                    <input type="hidden" name="id" value="<?= $category['id']; ?>">
                                    <button type="submit" class="text-red-500 hover:text-red-600">
                                        <i class="bi bi-trash-fill text-xl"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="3" class="px-6 py-3 text-center text-gray-500">Aucune catégorie trouvée.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

</div>



