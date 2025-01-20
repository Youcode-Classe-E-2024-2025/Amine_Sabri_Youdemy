<?php
include_once('./controller/userController.php');
include_once('./controller/authController.php');
include_once('./controller/categorieController.php');
include_once('./controller/coursController.php');
include_once('./controller/UserCoursController.php');

if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    header('Location: index.php?action=afficheCours');
    exit;
}

$controller = new UserController();
$cours = new CourseController();
$categories = new CategoryController();
$con = new AuthController();
$coursUser = new UserCoursController();

switch ($action) {
    case 'register': 
        $controller->create();
        break;
    case 'showProfil':
        $controller->showProfile();
        break;
    case 'connexion':
        $con->connexion();
        break;
    case 'logout':
        $con->logout();
        break;
    case 'updateStatus':
        $controller->updateStatus();
        break;
    case 'createCategories':
        $categories->createCategory();
        break;
    case 'editCategories':
        $categories->updateCategory();
        break;
    case 'deleteCategories':
        $categories->deleteCategory();
        break;
    case 'afficheCours':
        $cours->index();
        break;
    case 'afficherCoursEnss':
        $cours->afficherCours();
        break;
    case 'showCourse':
        $cours->show($_GET['id']);
        break;
    case 'InscriptionCourse':
        $coursUser->assignCourseToUser();
        break;
    default:
        header('Location: index.php?action=afficheCours');
        exit;
}
