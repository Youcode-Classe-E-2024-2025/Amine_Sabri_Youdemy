<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 ">
    <?php if ($_SESSION['role_id'] == "1"): ?>
        <!-- Section pour le rôle Administrateur -->
        <div class="bg-white rounded-lg shadow p-4">
            <h3 class="text-lg font-semibold mb-2">Total Utilisateurs</h3>
            <p class="text-3xl font-bold">1,234</p>
        </div>
        <div class="bg-white rounded-lg shadow p-4">
            <h3 class="text-lg font-semibold mb-2">Revenus</h3>
            <p class="text-3xl font-bold">45,678 €</p>
        </div>
        <div class="bg-white rounded-lg shadow p-4">
            <h3 class="text-lg font-semibold mb-2">Tâches Complétées</h3>
            <p class="text-3xl font-bold">89%</p>
        </div>
    <?php else: ?>
        <!-- Section pour d'autres rôles (ex. Enseignant) -->
        <div class="bg-white shadow-md rounded-lg p-4">
            <h3 class="text-xl font-semibold text-gray-700">Total des Cours</h3>
            <p class="text-3xl font-bold text-gray-800">45</p>
        </div>
        <div class="bg-white shadow-md rounded-lg p-4">
            <h3 class="text-xl font-semibold text-gray-700">Total des Étudiants Inscrits</h3>
            <p class="text-3xl font-bold text-gray-800">320</p>
        </div>
        <div class="bg-white shadow-md rounded-lg p-4">
            <h3 class="text-xl font-semibold text-gray-700">Total des Étudiants Inscrits</h3>
            <p class="text-3xl font-bold text-gray-800">320</p>
        </div>
    <?php endif; ?>
</div>
