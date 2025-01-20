<?php require_once '../model/cours.php'?>
<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>


    <title>Document</title>
</head>
<body>
<header class="bg-gray-800 text-white">
    <div class="container mx-auto flex justify-between items-center py-4 px-6">
      <div class="text-xl font-bold">
        <a href="#" class="hover:text-gray-300">Youdemy</a>
      </div>
      <nav class="flex space-x-6">
        <a href="../index.php?action=afficherCoursEnss" class="hover:text-gray-300">Cours</a>
        <a href="#" class="hover:text-gray-300">Statistiques</a>
      </nav>
      <div class="relative">
        <button id="dropdownButton" class="flex items-center space-x-2 focus:outline-none"> 
          <span id="username" class="font-medium"><?php echo $_SESSION['username'] ?? '' ?></span>
          <i class="bi bi-chevron-down"></i>
        </button>
        <div id="dropdownMenu" class="hidden absolute right-0 mt-2 w-48 bg-white text-gray-800 rounded-md shadow-lg p-2">
            <a href="../index.php?action=logout"  class="w-full text-left hover:bg-gray-100 focus:outline-none">Déconnexion</a>
        </div>
      </div>
    </div>
  </header>

  <?php 
    $user_id = $_SESSION['user_id'];
    $totalCours = Course::countUsersInCoursesByUser($user_id);
    $totalUserIscris = Course::countUsersInCoursesByCreator($user_id)?>
    <section class="p-6 bg-gray-100">
        <div class="max-w-7xl mx-auto">
            <h2 class="text-2xl font-bold mb-6 text-gray-700">Statistiques des Cours</h2>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <div class="p-6 bg-white shadow-md rounded-lg">
                    <h3 class="text-lg font-semibold text-gray-700">Total des Cours</h3>
                    <p class="text-4xl font-bold text-indigo-500 mt-4"><?= $totalCours ?></p>
                </div>
                <div class="p-6 bg-white shadow-md rounded-lg">
                    <h3 class="text-lg font-semibold text-gray-700">Utilisateurs Inscrits</h3>
                    <p class="text-4xl font-bold text-indigo-500 mt-4"><?= $totalUserIscris ?></p>
                </div>
            </div>
        </div>
    </section>
    <section class = "flex">
        <canvas id="myChart1" style="width:100%;max-width:600px"></canvas>
        <canvas id="myChart2" style="width:100%;max-width:600px"></canvas>
    </section>
    <script>
        const dropdownButton = document.getElementById('dropdownButton');
        const dropdownMenu = document.getElementById('dropdownMenu');

        dropdownButton.addEventListener('click', () => {
        dropdownMenu.classList.toggle('hidden');
        });
    </script>
    <script>
        var xValues = ["cours", "users"];
        var yValues = [<?= $totalCours ?>, <?= $totalUserIscris ?>];
        var barColors = [
        "#b91d47",
        "#00aba9"
        ];

        new Chart("myChart1", {
        type: "doughnut",
        data: {
            labels: xValues,
            datasets: [{
            backgroundColor: barColors,
            data: yValues
            }]
        },
        options: {
            title: {
            display: true,
            text: "World Wide Wine Production 2018"
            }
        }
        });
        new Chart("myChart2", {
        type: "pie",
        data: {
            labels: xValues,
            datasets: [{
            backgroundColor: barColors,
            data: yValues
            }]
        },
        options: {
            title: {
            display: true,
            text: "World Wide Wine Production 2018"
            }
        }
        });
</script>
</body>
</html>