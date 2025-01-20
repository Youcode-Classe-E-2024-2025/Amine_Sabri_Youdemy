<div class="overflow-x-auto bg-white shadow-md rounded-lg mb-10">
        <table class="min-w-full table-auto">
            <thead class="bg-gray-200">
                <tr>
                    <th class="px-6 py-3 text-left text-gray-600 font-semibold">Catégorie</th>
                    <th class="px-6 py-3 text-left text-gray-600 font-semibold">Nombre de Cours</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($coursbyCtegory)): ?>
                    <?php foreach ($coursbyCtegory as $category): ?>
                        <tr class="border-b">
                            <td class="px-6 py-4"><?= htmlspecialchars($category['category_name']) ?></td>
                            <td class="px-6 py-4"><?= $category['total_courses'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="2" class="px-6 py-4 text-center">Aucune donnée disponible.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>