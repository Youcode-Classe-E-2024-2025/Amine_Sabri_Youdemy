<?php

require_once __DIR__ . '/../model/cours.php';
require_once __DIR__ . '/../config/database.php';

class CourseController
{
    private $courseModel;

    public function __construct()
    {
        $database = new Database();
        $db = $database->getConnection();
        $this->courseModel = new Course($db);
    }

    public function index()
    {
        $courses = $this->courseModel->readAll();
        include '../views/courses/index.php';
    }

    public function show($id)
    {
        $course = $this->courseModel->readOne($id);
        include '../views/courses/show.php';
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $title = htmlspecialchars($_POST['title']);
            $description = htmlspecialchars($_POST['description']);
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

            if ($this->courseModel->create()) {
                header("Location: index.php");
                exit;
            } else {
                echo "Erreur lors de la création du cours.";
            }
        }

        include '../views/courses/create.php';
    }

    public function delete($id)
    {
        if ($this->courseModel->delete($id)) {
            header("Location: index.php");
            exit;
        } else {
            echo "Erreur lors de la suppression du cours.";
        }
    }
}
$bb = new CourseController();

// $bb->create();
$bb->index();
?>

