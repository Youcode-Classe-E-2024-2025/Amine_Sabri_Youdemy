<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails du cours</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">
    <header class="bg-gray-800 text-white py-4 shadow-md">
        <div class="container mx-auto px-6 flex justify-between items-center">
            <h1 class="text-3xl font-bold">Détails du cours</h1>
            <a href="<?php echo isset($_SERVER['HTTP_REFERER']) ? htmlspecialchars($_SERVER['HTTP_REFERER']) : '/'; ?>" 
                class="text-sm font-medium hover:underline">
                    Retour
            </a>
        </div>
    </header>
    <main class="container mx-auto px-6 py-10">
        <section class="bg-gray-400 p-6 mb-8">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">Vidéo du cours</h2>
            <div class="relative overflow-hidden rounded-lg shadow-lg">
                    <video 
                        class="w-full h-[500px] rounded-lg" 
                        controls 
                        preload="auto">
                        <source src="../uploads/<?php echo htmlspecialchars($course['video_url']); ?>" type="video/mp4">
                    </video>
            </div>
        </section>



        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="lg:col-span-2 bg-white rounded-lg shadow-md p-6">
                <h2 class="text-2xl font-bold text-gray-800"><?php echo htmlspecialchars($course['course_title']); ?></h2>
                <p class="text-gray-600 mt-4">
                    <strong>Description :</strong> <?php echo htmlspecialchars($course['course_description']); ?>
                </p>
                <p class="text-gray-600 mt-4">
                    <strong>Catégorie :</strong> <?php echo htmlspecialchars($course['category_name']); ?>
                </p>
                <p class="text-gray-600 mt-4">
                    <strong>Ajouté le :</strong> <?php echo htmlspecialchars(date('d M Y', strtotime($course['created_at']))); ?>
                </p>

                <div class="mt-6">
                    <strong>Tags :</strong>
                    <div class="flex flex-wrap gap-2 mt-2">
                        <?php foreach (explode(',', $course['tags']) as $tag): ?>
                            <span class="bg-blue-500 text-white px-3 py-1 rounded-full text-sm">
                                <?php echo htmlspecialchars(trim($tag)); ?>
                            </span>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow-md p-6">
                <h3 class="text-xl font-bold text-gray-800">Documents téléchargeables</h3>
                <?php if (!empty($course['document_url'])): ?>
                    <div class="mt-4">
                        <a 
                            href="<?php echo htmlspecialchars($course['document_url']); ?>" 
                            target="_blank"
                            class="inline-flex items-center text-blue-500 font-semibold hover:underline"
                        >
                            <svg class="h-5 w-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                            Télécharger le document
                        </a>
                        <form method="POST" action="index.php?action=InscriptionCourse" class="max-w-lg mx-auto p-6 bg-white rounded-lg shadow-lg">
                            <div class="mb-4">
                                <input type="hidden" id="user_id" name="user_id" value="<?php echo $_SESSION['user_id']?>">
                            </div>

                            <div class="mb-4">
                                <input type="hidden" id="cours_id" name="cours_id" value="<?php echo $course['course_id']?>">                            </div>
                            <div class="flex justify-center mt-6">
                                <button type="submit" class="px-6 py-3 bg-blue-500 text-white font-semibold rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    Inscription à un cours
                                </button>
                            </div>
                        </form>


                    </div>
                <?php else: ?>
                    <p class="text-gray-600 mt-4">Aucun document disponible pour ce cours.</p>
                <?php endif; ?>
            </div>
        </div>
    </main>

    <?php include('./views/include/footerUser.php') ?></body>
</html>
