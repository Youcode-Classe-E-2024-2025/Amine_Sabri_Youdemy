<?php require_once '../../model/cours.php';
$totalCours = Course::countTotalCourses();
?>
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
            <h3 class="text-lg font-semibold mb-2">Total des Cours</h3>
            <p class="text-3xl font-bold"><?= $totalCours?></p>
        </div>
    <?php endif; ?>
</div>
