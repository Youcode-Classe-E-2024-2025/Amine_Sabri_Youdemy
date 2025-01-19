
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

    public function removeCourseFromUser($user_id, $cours_id) {
        if ($this->userCoursModel->removeCourseFromUser($user_id, $cours_id)) {
            echo "Course removed successfully.";
        } else {
            echo "Failed to remove course.";
        }
    }


    public function getUserCourses($user_id) {
        $courses = $this->userCoursModel->getUserCourses($user_id);
        return $courses;
    }
}


?>