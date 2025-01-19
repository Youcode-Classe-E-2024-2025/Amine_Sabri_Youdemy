<?php
require_once __DIR__ . '/../model/user.php';
require_once __DIR__ . '/../model/UserCours.php';
session_start();

class UserController {
    private $modelUser;
    private $userCoursModel;

    public function __construct() {
        $this->modelUser = new User(); 
        $this->userCoursModel = new UserCours(); 
    }

    public function index() {
        return $this->modelUser->getAllWithRoles(); 
    }

    public function showProfile() {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $user_id = $_GET['id'];
            $student = $this->modelUser->getUserById($user_id); 
            $courses = $this->userCoursModel->getCoursesForUser($user_id);
            // var_dump($student);
            // var_dump($courses);
            if ($student) {
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

            if (empty(trim($username)) || empty(trim($email)) || empty(trim($password)) || empty(trim($role_id))) {
                $_SESSION["message"] = "Enter les inputs";
                header('Location: views/sign/signUp.php');
                return;
            }

            $hashPassword = password_hash($password, PASSWORD_DEFAULT);
            $user = new User();
            $user->setUsername($username);
            $user->setEmail($email);
            $user->setPassword($hashPassword);
            $user->setRoleId($role_id);
            $user->setStatus($status);
            $user->create();
            $_SESSION['message'] = 'Compte créé';
            header('Location: views/sign/signIn.php');
        } else {
            header('Location: ../views/sign/signUp.php');
        }
    }

    public function updateStatus() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userId = $_POST['user_id'];
            $status = $_POST['status'];
            $this->modelUser->updateStatus($userId, $status); 
            header('Location: views/layouts/dashbord.php?page=users');
        }
        $this->index();
    }

    public function getPaginatedUsers($page, $resultsPerPage) {
        $totalUsers = $this->modelUser->countAllUsers();
        $totalPages = ceil($totalUsers / $resultsPerPage);
        
        $users = $this->modelUser->readAllPaginated($page, $resultsPerPage);
    
        return [
            'users' => $users,
            'totalPages' => $totalPages,
            'currentPage' => $page
        ];
    }
}

// $cou = new UserController();
// $cou->create();
// $cou-> showProfile(3);

?>
