<?php require_once __DIR__ . "/../../controller/categorieController.php" ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord Professionnel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

</head>
<body class="bg-gray-100">
    <div class="flex h-screen">
        <?php include('../include/sidebar.php') ?>

        <main class="flex-1 overflow-y-auto">
            <?php include('../include/header.php') ?>
            
            <div class="p-6">
                <!-- statistiques -->
                <?php include('../statistiques.php') ?>
                
                <div class="p-6">
                <?php
                    if (isset($_GET['page'])) {
                        $page = $_GET['page'];
                        switch ($page) {
                            // case 'accueil':
                            //     include('includes/accueil.php');
                            //     break;
                            // case 'statistiques':
                            //     include('includes/statistiques.php');
                            //     break;
                            // case 'projets':
                            //     include('includes/projets.php');
                            //     break;
                            // case 'messages':
                            //     include('includes/messages.php');
                            //     break;
                            case 'categories':
                                $cat = new CategoryController();
                                $page = isset($_GET['p']) ? (int)$_GET['p'] : 1;
                                $resultsPerPage = 3;

                                $paginationData = $cat->getPaginatedCategories($page, $resultsPerPage);

                                $Categories = $paginationData['categories'];
                                $totalPages = $paginationData['totalPages'];
                                $currentPage = $paginationData['currentPage'];
                                include('../Categories.php');
                                break;
                            default:
                                echo "<h2>Page non trouvée</h2>";
                        }
                    } else {
                        echo "<h2>Bienvenue sur votre Tableau de Bord</h2>";
                    }
                ?>
            </div>
            </div>
        </main>
    </div>
</body>
</html>