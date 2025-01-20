<section class= "flex justify-center gap-10">
    <div class="overflow-x-auto bg-white shadow-md rounded-lg mb-10">
        <table class="min-w-full table-auto">
            <thead class="bg-gray-200">
                <tr>
                    <th class="px-6 py-3 text-left text-gray-600 font-semibold">Catégorie</th>
                    <th class="px-6 py-3 text-left text-gray-600 font-semibold">Nombre de Cours</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($coursbyCategory)): ?>
                    <?php foreach ($coursbyCategory as $category): ?>
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
    
    <?php if ($courseWithMostStudents): ?>
        <div class="overflow-x-auto bg-white shadow-md rounded-lg mb-10 p-4">
                <h2 class="text-2xl font-bold text-gray-700 mb-6">Cours avec le plus d'étudiants</h2>
                <table class="min-w-full table-auto">
                    <thead class="bg-indigo-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-indigo-600 font-semibold">Nom du Cours</th>
                            <th class="px-6 py-3 text-left text-indigo-600 font-semibold">Nombre d'Étudiants</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b">
                            <td class="px-6 py-4 text-indigo-600"><?= htmlspecialchars($courseWithMostStudents['course_title']) ?></td>
                            <td class="px-6 py-4 text-indigo-500"><?= $courseWithMostStudents['total_students'] ?> étudiants</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <p class="text-gray-700">Aucun cours n'a d'étudiants inscrits pour le moment.</p>
        <?php endif; ?>
</section>
