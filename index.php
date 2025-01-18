<?php
include_once('./controller/userController.php');
include_once('./controller/authController.php');
include_once('./controller/categorieController.php');
include_once('./controller/coursController.php');

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

switch ($action) {
    case 'register': // Corrigé de 'regester'
        $controller->create();
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
    default:
        header('Location: index.php?action=afficheCours');
        exit;
}
