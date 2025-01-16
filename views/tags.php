<?php require_once __DIR__ . "/../controller/tagsController.php" ?>
<div class="container mx-auto p-6 bg-white shadow-md rounded-lg">
    <h1 class="text-3xl font-semibold text-center text-gray-700 mb-2">Liste des Tags</h1>
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
                <?php if (!empty($Tags)): ?>
                    <?php foreach ($Tags as $tag): ?>
                        <tr class="hover:bg-gray-100 border-b border-gray-200">
                            <!-- <td class="px-6 py-3"><?= $tag['id'];?></td> -->
                            <td class="px-6 py-3"><?= $tag['name']; ?></td>
                            <td class="px-6 py-3 text-center">
                                <a href="dashbord.php?page=tags&id=<?= $tag['id']; ?>"                                    class="inline-block text-yellow-500 hover:text-yellow-600">
                                    <i class="bi bi-pencil-square text-xl"></i>
                                </a>
                                <form action="../../index.php?action=deleteTags" method="POST" class="inline-block" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce tag ?');">
                                    <input type="hidden" name="id" value="<?= $tag['id']; ?>">
                                    <button type="submit" class="text-red-500 hover:text-red-600">
                                        <i class="bi bi-trash-fill text-xl"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="3" class="px-6 py-3 text-center text-gray-500">Aucun tag trouvé.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-4 flex justify-center space-x-2">
        <?php if ($currentPage > 1): ?>
            <a href="dashbord.php?page=tags&p=<?= $currentPage - 1; ?>" 
               class="px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-700 rounded">Précédent</a>
        <?php endif; ?>

        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <a href="dashbord.php?page=tags&p=<?= $i; ?>" 
               class="px-4 py-2 <?= $i == $currentPage ? 'bg-blue-500 text-white' : 'bg-gray-200 hover:bg-gray-300 text-gray-700'; ?> rounded">
                <?= $i; ?>
            </a>
        <?php endfor; ?>

        <?php if ($currentPage < $totalPages): ?>
            <a href="dashbord.php?page=tags&p=<?= $currentPage + 1; ?>" 
               class="px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-700 rounded">Suivant</a>
        <?php endif; ?>
    </div>
</div>

<div class="mt-8">
    <h2 class="text-2xl font-semibold text-gray-700 mb-4">Ajouter un Tag</h2>
    <form action="../../index.php?action=createTags" method="POST" class="space-y-4">
        <div>
            <label for="tag_name" class="block text-gray-700">Nom du tag</label>
            <input type="text" name="tag_name" id="tag_name" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        </div>
        <div>
            <button type="submit" class="w-full bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Ajouter</button>
        </div>
    </form>
</div>


