<?php
require_once __DIR__ . '/../model/user.php';
require_once __DIR__ . '/../config/database.php';
session_start();
class UserController {
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
    }

    public function index() {
        return User::getAllWithRoles($this->db); 
    }
    
    public function show() {
        if ($_SERVER['REQUEST_METHOD'] === 'GET'){
            $id = $_GET["id"];
            $student = User::getUserById($this->db, $id);
            if($student){
                include __DIR__ . '/../views/Profile.php';
            }
        }
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $role_id = $_POST['role_id'];
            $status = 'actif';

            if(empty(trim($username)) || empty(trim($email)) || empty(trim($password)) || empty(trim($role_id))){
                $_SESSION["message"] = "Enter les inputs";
                header('Location: views/sign/signUp.php');
                return;
            }
            $hashPassword = password_hash($password,PASSWORD_DEFAULT);
            $user = new User($this->db, $username, $email, $hashPassword, $role_id, $status);
            $user->create();
            // var_dump($_POST);
            // var_dump($status);
            header('Location: views\sign\signIn.php');
            $_SESSION['message'] = 'Create compte';
        } else {
            header('Location: ../views/sign/signUp.php');
        }
    }
    

    public function updateStatus() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userId = $_POST['user_id'];
            $status = $_POST['status'];
            $user = User::updateStatus($this->db, $userId, $status);
            if ($user){
                header('Location: views/layouts/dashbord.php?page=users');
            } else {
                header('Location: views/layouts/dashbord.php?page=users');
            }
        }
        $this->index();
    }
    
    public function getPaginatedUsers($page, $resultsPerPage) {
        $totalUsers = User::countAllUsers($this->db);
        $totalPages = ceil($totalUsers / $resultsPerPage);
        
        $users = User::readAllPaginated($this->db, $page, $resultsPerPage); 
    
        return [
            'users' => $users,
            'totalPages' => $totalPages,
            'currentPage' => $page
        ];
    }
    
    
    
    

}

// $controller = new UserController();
// $controller->show(3);

?>
