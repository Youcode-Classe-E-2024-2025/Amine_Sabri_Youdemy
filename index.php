<?php
include_once('./controller/userController.php');
if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'index';
}

$controller = new UserController();

switch ($action) {
    // case 'index':
    //     $controller->index();
    //     break;
    case 'create':
        $controller->create();
        break;
    default:
        $controller->index();
        break;
}

?>
