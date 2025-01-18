<?php
require_once __DIR__ . '/../model/cours.php';

class CourseController
{
    private $courseModel;

    public function __construct()
    {
        $this->courseModel = new Course();
    }

    public function index()
    {
        // Nombre d'éléments par page
        $perPage = 3;
    
        // Obtenir la page actuelle depuis l'URL, par défaut 1
        $page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
    
        // Calculer l'offset
        $offset = ($page - 1) * $perPage;
    
        // Récupérer les cours avec pagination
        $courses = $this->courseModel->readAll($perPage, $offset);
    
        // Obtenir le nombre total de cours
        $totalCourses = $this->courseModel->countCourses();
    
        // Calculer le nombre total de pages
        $totalPages = ceil($totalCourses / $perPage);
    
        // Inclure la vue avec les données
        include __DIR__ . '/../views/guest.php';
    }
    
    

    public function show($id)
    {
        $course = $this->courseModel->readOne($id);
        include '../views/courses/show.php';
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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
            $cours = $this->courseModel->create();
            if($cours) {
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
?>

