<?php
require_once __DIR__ . '/../config/database.php';
class UserCours {
    private $user_id;
    private $cours_id;
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
    }

    public function getUserId() {
        return $this->user_id;
    }

    public function setUserId($user_id) {
        $this->user_id = $user_id;
    }

    public function getCoursId() {
        return $this->cours_id;
    }

    public function setCoursId($cours_id) {
        $this->cours_id = $cours_id;
    }

    public function getCoursesForUser($user_id) {
        $query = "SELECT c.id, c.title, c.image_url 
                  FROM user_cours uc
                  JOIN courses c ON uc.cours_id = c.id
                  WHERE uc.user_id = :user_id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();
        $cours = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $cours;
    }

    public function assignCourseToUser($user_id, $cours_id) {
        $query = "INSERT INTO user_cours (user_id, cours_id) VALUES (:user_id, :cours_id)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':cours_id', $cours_id);
        return $stmt->execute();
    }

    public function removeCourseFromUser($user_id, $cours_id) {
        $query = "DELETE FROM user_cours WHERE user_id = :user_id AND cours_id = :cours_id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':cours_id', $cours_id);
        return $stmt->execute();
    }
}

// $cours= new UserCours();
// $cours->getCoursesForUser(3);

?>