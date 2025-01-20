<?php
require_once __DIR__ . '/../model/user.php';
require_once __DIR__ . '/../config/database.php';

class AuthController {
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
    }

    public function connexion() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST["email"];
            $password = $_POST["password"];

            $modelUser = new User($this->db);

            $user = $modelUser->findByEmail($email, $password);
            if ($user) {
                session_start();
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['role_id'] = $user['role_id'];
                if($user['status'] == "pending"){
                    $_SESSION["message"] = "Attends l'administration va accepter";
                    header('Location: views\sign\signIn.php');
                }elseif($user['status'] == "actif" && $user['role_id'] == "3"){
                    header('Location: index.php?action=afficheCours');
                }elseif($user['role_id'] == "1" && $user['status'] == "actif"){
                    header('Location: views/layouts/dashbord.php?page=users');
                }elseif($user['role_id'] == "2" && $user['status'] == "actif"){
                    header('Location: index.php?action=afficherCoursEnss');
                }
                exit();
            } else {
                header('Location: ../views/sign/signIn.php?error=invalid_credentials');
                exit();
            }
        }
    }

    public function logout() {
        session_start();
        session_destroy();
        header('Location: views/sign/signIn.php');
        // require("views/sign/signIn.php");
        exit();
    }
}
