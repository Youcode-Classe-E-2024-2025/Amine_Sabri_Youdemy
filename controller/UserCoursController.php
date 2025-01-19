
<?php
require_once __DIR__ . '/../model/UserCours.php';
class UserCoursController {
    private $userCoursModel;

    public function __construct() {
        $this->userCoursModel = new UserCours();
    }

    public function assignCourseToUser() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $user_id = $_POST["user_id"];
            $cours_id = $_POST["cours_id"];
            $this->userCoursModel->assignCourseToUser($user_id, $cours_id);
            header("Location: index.php?action=showCourse&id=" . $cours_id);
            exit; 
        }
    }
}


?>