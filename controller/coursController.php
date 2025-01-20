<?php
require_once __DIR__ . '/../model/cours.php';

class CourseController
{
    private $courseModel;

    public function __construct()
    {
        $this->courseModel = new Course();
    }

    public function index(){
        $perPage = 3;
        $page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
        $offset = ($page - 1) * $perPage;
        $courses = $this->courseModel->readAll($perPage, $offset);
        $totalCourses = $this->courseModel->countCoursesGuest();
        $totalPages = ceil($totalCourses / $perPage);
        include __DIR__ . '/../views/guest.php';
    }
    
    public function afficherCours(){
        $perPage = 3;
        $page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
        $offset = ($page - 1) * $perPage;
        $user_id = $_SESSION['user_id'] ?? '';
        $courses = $this->courseModel->readAllByUser($user_id,$perPage, $offset);
        $totalCourses = $this->courseModel->countCourses($user_id);
        $totalPages = ceil($totalCourses / $perPage);
        include __DIR__ . '/../views/layouts/dashbordEss.php';
    }

    public function show($id)
    {
        $course = $this->courseModel->readOne($id);
        // var_dump($course)
        include __DIR__ . '/../views/detailCours.php';  
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $title = $_POST['title'];
            $description = $_POST['description'];
            $category_id = intval($_POST['category_id']);
            $price = floatval($_POST['price']);
            $created_by = $_POST['created_by'];
            $tags = isset($_POST['tags']) ? $_POST['tags'] : [];

            $targetDir = "./uploads/";
            $imageFileName = null;
            $documentFileName = null;
            $videoFileName = null;

            if (isset($_FILES['image_url']) && $_FILES['image_url']['error'] == 0) {
                $imageFileName = basename($_FILES['image_url']['name']);
                $imageTargetFile = $targetDir . $imageFileName;
                move_uploaded_file($_FILES['image_url']['tmp_name'], $imageTargetFile);
            }

            if (isset($_FILES['document_url']) && $_FILES['document_url']['error'] == 0) {
                $documentFileName = basename($_FILES['document_url']['name']);
                $documentTargetFile = $targetDir . $documentFileName;
                move_uploaded_file($_FILES['document_url']['tmp_name'], $documentTargetFile);
            }

            if (isset($_FILES['video_url']) && $_FILES['video_url']['error'] == 0) {
                $videoFileName = basename($_FILES['video_url']['name']);
                $videoTargetFile = $targetDir . $videoFileName;
                move_uploaded_file($_FILES['video_url']['tmp_name'], $videoTargetFile);
            }

            $this->courseModel->setTitle($title);
            $this->courseModel->setDescription($description);
            $this->courseModel->setVideoUrl($videoFileName);
            $this->courseModel->setImageUrl($imageFileName);
            $this->courseModel->setDocumentUrl($documentFileName);
            $this->courseModel->setCategoryId($category_id);
            $this->courseModel->setPrice($price);
            $this->courseModel->setCreated_by($created_by);
            $cours = $this->courseModel->create($tags);
            if($cours) {
                header("Location: index.php?action=afficherCoursEnss");
                exit;
            } else {
                echo "Erreur lors de la création du cours.";
            }
        }

        include '../views/courses/create.php';
    }

    public function delete(){
        if($_SERVER["REQUEST_METHOD"] === "GET"){
            $id = $_GET['id'];
            $cours = $this->courseModel->delete($id);
            if ($cours) {
                header("Location: index.php?action=afficherCoursEnss");
                exit;
            } else {
                echo "Erreur lors de la suppression du cours.";
            }
        }
    }

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $title = $_POST['title'];
            $description = $_POST['description'];
            $category_id = intval($_POST['category_id']);
            $price = floatval($_POST['price']);

            $targetDir = "../uploads/";
            $imageFileName = null;
            $documentFileName = null;
            $videoFileName = null;

            if (isset($_FILES['image_url']) && $_FILES['image_url']['error'] == 0) {
                $imageFileName = basename($_FILES['image_url']['name']);
                $imageTargetFile = $targetDir . $imageFileName;
                move_uploaded_file($_FILES['image_url']['tmp_name'], $imageTargetFile);
            }

            if (isset($_FILES['document_url']) && $_FILES['document_url']['error'] == 0) {
                $documentFileName = basename($_FILES['document_url']['name']);
                $documentTargetFile = $targetDir . $documentFileName;
                move_uploaded_file($_FILES['document_url']['tmp_name'], $documentTargetFile);
            }

            if (isset($_FILES['video_url']) && $_FILES['video_url']['error'] == 0) {
                $videoFileName = basename($_FILES['video_url']['name']);
                $videoTargetFile = $targetDir . $videoFileName;
                move_uploaded_file($_FILES['video_url']['tmp_name'], $videoTargetFile);
            }

            $this->courseModel->setTitle($title);
            $this->courseModel->setDescription($description);
            $this->courseModel->setVideoUrl($videoFileName);
            $this->courseModel->setImageUrl($imageFileName);
            $this->courseModel->setDocumentUrl($documentFileName);
            $this->courseModel->setCategoryId($category_id);
            $this->courseModel->setPrice($price);
            if ($this->courseModel->update($id)) {
                header("Location: index.php?action=afficherCoursEnss");
                echo "biew";
                exit;
            } else {
                echo "Erreur lors de la mise à jour du cours.";
            }
        }

        // $course = $this->courseModel->readOne($id);

        // include '../views/courses/update.php';
    }

    public static function showUsersByCreator() {
        // session_start();
        $creator_id = $_SESSION['user_id'] ?? '';
        $courseModel = new Course();
        $users = $courseModel->getUsersByCourseCreator($creator_id);
        return $users;
    }

}

// $show = new CourseController();
// $show->afficherCours();
// $show->showUsersByCreator();
?>

