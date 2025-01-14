<?php
include_once('./controller/userController.php');
include_once('./controller/authController.php');
if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'index';
}

$controller = new UserController();
$con = new AuthController();

switch ($action) {
    case 'regester':
        $controller->create();
        break;
    case 'connexion':
        $con->connexion();
        break;
}

?>
