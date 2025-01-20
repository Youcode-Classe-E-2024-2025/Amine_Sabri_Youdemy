<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../model/CountableEntity.php';
class Category implements CountableEntity{
    private $id;
    private $name;
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getTotalCount(): int {
        $sql = "SELECT COUNT(*) AS total_categories FROM categories";
        $stmt = $this->db->query($sql);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return (int) $result['total_categories'];
    }
    public function create() {
        $query = "INSERT INTO categories (name) VALUES (:name)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':name', $this->name);
        return $stmt->execute();
    }

    // Read
    public static function readAll() {
        $database = new Database();
        $db = $database->getConnection();
        $query = "SELECT * FROM categories";
        $stmt = $db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function readById($id) {
        $query = "SELECT * FROM categories WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update() {
        $query = "UPDATE categories SET name = :name WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':id', $this->id);
        return $stmt->execute();
    }

    public function delete($id) {
        $query = "DELETE FROM categories WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function readAllPaginated($page, $resultsPerPage) {
        $offset = ($page - 1) * $resultsPerPage;
        $sql = "SELECT id, name FROM categories LIMIT :offset, :resultsPerPage";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->bindValue(':resultsPerPage', $resultsPerPage, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function countAllCategories() {
        $sql = "SELECT COUNT(*) AS total FROM categories";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC)['total']; 
    }
    
}