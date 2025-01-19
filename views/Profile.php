<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Étudiant</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">

    <!-- Header -->
    <header class="bg-blue-600 text-white py-4 shadow-md">
        <div class="container mx-auto px-6 flex justify-between items-center">
            <h1 class="text-3xl font-bold">Profil Étudiant</h1>
            <a href="index.php" class="text-sm font-medium hover:underline">Accueil</a>
        </div>
    </header>

    <main class="container mx-auto px-6 py-10">
        <!-- Informations de l'étudiant -->
        <section class="bg-white rounded-lg shadow-md p-6 mb-8">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">Informations Personnelles</h2>
            <p class="text-gray-600"><strong>Nom :</strong> <?php echo $student['username']; ?></p>
            <p class="text-gray-600"><strong>Email :</strong> <?php echo $student['email']; ?></p>
            <p class="text-gray-600"><strong>Date d'inscription :</strong> <?php echo date('d M Y', strtotime($student['created_at'])); ?></p>
        </section>
        <!-- Mes cours -->
        <section class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">Mes Cours</h2>

            <?php if (!empty($courses)): ?>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <?php foreach ($courses as $course): ?>
                        <div class="bg-gray-100 rounded-lg shadow-md p-4">
                            <h3 class="text-xl font-bold text-gray-800"><?php echo $course['course_title']; ?></h3>
                            <p class="text-gray-600 mt-2">
                                <strong>Description :</strong> <?php echo $course['course_description']; ?>
                            </p>
                            <p class="text-gray-600 mt-2">
                                <strong>Catégorie :</strong> <?php echo $course['category_name']; ?>
                            </p>
                            <a href="index.php?action=showCourse&id=<?php echo$course['id']; ?>" 
                                class="inline-block mt-4 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">
                                Voir le cours
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <p class="text-gray-600">Aucun cours assigné pour le moment.</p>
            <?php endif; ?>
        </section>
    </main>
</body>
</html>
