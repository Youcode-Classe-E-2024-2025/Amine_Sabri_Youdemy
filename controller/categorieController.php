<?php
require_once __DIR__ . '/../model/categorie.php';
require_once __DIR__ . '/../model/cours.php';
require_once __DIR__ . '/../model/tags.php';
class CategoryController {
    private $model;

    public function __construct() {
        $this->model = new Category();
        $this->modelTags = new Tag();
        $this->modecours = new Course();
    }

    public function createCategory() {
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $name = $_POST["category_name"];
            $this->model->setName($name);
            $Categories = $this->model->create();
            header('Location: views/layouts/dashbord.php?page=categories');
        }
    }

    public function getAllCategories() {
        return $this->model->readAll(); 
    }

    public function getCategoryById($id) {
        return $this->model->readById($id);
    }

    public function updateCategory() {
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $id = $_POST['id'];
            $name = $_POST['name'];
            $this->model->setId($id);
            $this->model->setName($name);
            $Categories = $this->model->update();
            header('Location: views/layouts/dashbord.php?page=categories');
        }
    }

    public function deleteCategory() {
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $id = $_POST['id'];
            $Categories = $this->model->delete($id);
            header('Location: views/layouts/dashbord.php?page=categories');
        }
    }


    public function getPaginatedCategories($page, $resultsPerPage) {
        $totalCategories = $this->model->countAllCategories(); 
        $totalPages = ceil($totalCategories / $resultsPerPage); 
    
        $Categories = $this->model->readAllPaginated($page, $resultsPerPage); 
    
        return [
            'categories' => $Categories,
            'totalPages' => $totalPages,
            'currentPage' => $page
        ];
    }

    public function showTotals() {
        $totalCategories = $this->model->getTotalCount();
        $totalTags = $this->modelTags->getTotalCount();
        $totalCourses = $this->modecours->countTotalCourses();
        include __DIR__ . '/../views/statistiques.php';
    } 
}

// $cat = new CategoryController();
// $cat->showTotals();

// $cat->createCategory('correct category');
// $cat->updateCategory(5,'modifier category');
// $cat->deleteCategory(5);
// $cat->getAllCategories();
// var_dump($cat->getCategoryById(1));
?>