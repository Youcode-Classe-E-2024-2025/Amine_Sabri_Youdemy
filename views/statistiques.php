<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
    <?php if ($_SESSION['role_id'] == "1"): ?>
        <!-- Section pour le rôle Administrateur -->
        <div class="bg-white rounded-lg shadow p-4">
            <h3 class="text-lg font-semibold mb-2">Total category</h3>
            <p class="text-3xl font-bold"><?= $totalCategories ?></p>
        </div>
        <div class="bg-white rounded-lg shadow p-4">
            <h3 class="text-lg font-semibold mb-2">Total Tags</h3>
            <p class="text-3xl font-bold"><?= $totalTags ?></p>
        </div>
        <div class="bg-white rounded-lg shadow p-4">
            <h3 class="text-lg font-semibold mb-2">Total des Cours</h3>
            <p class="text-3xl font-bold"><?= $totalCourses?></p>
        </div>
    <?php endif; ?>
</div>
