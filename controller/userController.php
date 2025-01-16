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

}


?>
