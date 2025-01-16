<?php
include_once('./controller/userController.php');
include_once('./controller/authController.php');
include_once('./controller/categorieController.php');
if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'index';
}

$controller = new UserController();
$categories = new CategoryController();
$con = new AuthController();

switch ($action) {
    case 'regester':
        $controller->create();
        break;
    case 'connexion':
        $con->connexion();
        break;
    case 'updateStatus':
        $controller->updateStatus();
        break;
    case 'createCategories';
        $categories->createCategory();
        break;
    case 'editCategories';
        $categories->updateCategory();
        break;
    case 'deleteCategories';
        $categories->deleteCategory();
        break;
}

?>
