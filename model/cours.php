<?php

class Course
{
    private $id;
    private $title;
    private $description;
    private $videoUrl; 
    private $imageUrl;
    private $documentUrl;
    private $categoryId;
    private $price;
    private $createdAt;

    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function create()
    {
        $stmt = $this->db->prepare("INSERT INTO courses (title, description, video_url, image_url, document_url, category_id, price) VALUES (?, ?, ?, ?, ?, ?, ?)");
        return $stmt->execute([
            $this->title, 
            $this->description, 
            $this->videoUrl, 
            $this->imageUrl, 
            $this->documentUrl, 
            $this->categoryId, 
            $this->price
        ]);
    }

    public function readAll()
    {
        $stmt = $this->db->query("SELECT * FROM courses ORDER BY created_at DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function readOne($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM courses WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id)
    {
        $stmt = $this->db->prepare("UPDATE courses SET title = ?, description = ?, video_url = ?, image_url = ?, document_url = ?, category_id = ?, price = ? WHERE id = ?");
        return $stmt->execute([
            $this->title, 
            $this->description, 
            $this->videoUrl, 
            $this->imageUrl, 
            $this->documentUrl, 
            $this->categoryId, 
            $this->price, 
            $id
        ]);
    }

}
?>
