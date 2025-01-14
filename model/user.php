<?php

class User {
    private $id;
    private $username;
    private $email;
    private $password;
    private $role_id;
    private $status;
    private $db; 

    public function __construct($db, $username, $email, $password, $role_id, $status) {
        $this->db = $db;
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->role_id = $role_id;
        $this->status = $status;
    }

    public static function getAll($db) {
        $query = "SELECT * FROM users";
        $stmt = $db->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create() {
        if ($this->role_id == '3') {
            $query = "INSERT INTO users (username, email, password, role_id, status) VALUES (:username, :email, :password, :role_id, :status)";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':status', $this->status);
        } else {
            $query = "INSERT INTO users (username, email, password, role_id) VALUES (:username, :email, :password, :role_id)";
            $stmt = $this->db->prepare($query);
        }
    
        $stmt->bindParam(':username', $this->username);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':password', $this->password);
        $stmt->bindParam(':role_id', $this->role_id);
        return $stmt->execute();
    }
    
}

?>
