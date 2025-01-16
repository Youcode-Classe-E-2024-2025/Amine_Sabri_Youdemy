<?php
require_once __DIR__ . '/../model/categorie.php';
class CategoryController {
    private $model;

    public function __construct() {
        $this->model = new Category();
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

?>