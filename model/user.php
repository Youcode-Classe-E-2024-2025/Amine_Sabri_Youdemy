<?php

class User {
    private $id;
    private $username;
    private $email;
    private $password;
    private $role_id;
    private $status;
    private $db; 

    public function __construct($db, $username = null, $email = null, $password = null, $role_id = null, $status = null) {
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

    public function findByEmail($email,$password) {
        $query = "SELECT * FROM users WHERE email = :email";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user) {
            if (password_verify($password, $user['password'])) {
                return $user; 
            } else {
                return false; 
            }
        }
    }


    public static function getAllWithRoles($db) {
        $sql = "SELECT 
                    users.id,
                    users.username,
                    users.email,
                    users.status,
                    users.created_at,
                    roles.name AS role_name
                FROM users
                INNER JOIN roles ON users.role_id = roles.id
                ORDER BY users.created_at DESC";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function updateStatus($db, $userId, $status) {
        $sql = "UPDATE users SET status = :status WHERE id = :id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':id', $userId, PDO::PARAM_INT);
        return $stmt->execute();
    }



    
    
    
}

?>
