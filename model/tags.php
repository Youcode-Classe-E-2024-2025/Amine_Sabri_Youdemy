<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../model/CountableEntity.php';

class Tag implements CountableEntity{
    private $id;
    private $name;
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
    }

    // Getters
    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    // Setters
    public function setId($id) {
        $this->id = $id;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getTotalCount(): int {
        $sql = "SELECT COUNT(*) AS total_tags FROM tags";
        $stmt = $this->db->query($sql);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return (int) $result['total_tags'];
    }

    // Create a new tag
    public function create() {
        $sql = "INSERT INTO tags (name) VALUES (:name)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':name', $this->name);
        return $stmt->execute();
    }

    // Find a tag by ID
    public function findById($id) {
        $sql = "SELECT * FROM tags WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }

    // Update an existing tag
    public function update() {
        $sql = "UPDATE tags SET name = :name WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':id', $this->id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    // Delete a tag by ID
    public function delete() {
        $sql = "DELETE FROM tags WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $this->id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    // Find all tags
    public static function findAll() {
        $database = new Database();
        $db = $database->getConnection();
        $sql = "SELECT * FROM tags";
        $stmt = $db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function readAllPaginated($page, $resultsPerPage) {
        $offset = ($page - 1) * $resultsPerPage;
        $sql = "SELECT id, name FROM tags LIMIT :offset, :resultsPerPage";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->bindValue(':resultsPerPage', $resultsPerPage, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function countAllTags() {
        $sql = "SELECT COUNT(*) AS total FROM tags";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC)['total']; 
    }
    
}
