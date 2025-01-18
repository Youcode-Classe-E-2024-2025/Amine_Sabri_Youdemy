<?php
require_once __DIR__ . '/../config/database.php';

class Course{

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

    public function __construct()
    {
        $database = new Database();
        $this->db = $database->getConnection();
    }

    public function create(){
        $sql = "INSERT INTO courses (title, description, video_url, image_url, document_url, category_id, price) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        $coures = $stmt->execute([
            $this->title, 
            $this->description, 
            $this->videoUrl, 
            $this->imageUrl, 
            $this->documentUrl, 
            $this->categoryId, 
            $this->price
        ]);
        return $coures;
    }

    public function readAll($limit, $offset)
{
    $sql = "
        SELECT 
            c.id,
            c.title,
            c.description,
            c.video_url,
            c.image_url,
            c.document_url,
            c.price,
            c.created_at,
            cat.name ,
            GROUP_CONCAT(t.name SEPARATOR ', ') AS tags
        FROM 
            courses c
        LEFT JOIN 
            categories cat ON c.category_id = cat.id
        LEFT JOIN 
            course_tag ct ON c.id = ct.course_id
        LEFT JOIN 
            tags t ON ct.tag_id = t.id
        GROUP BY 
            c.id, cat.name
        ORDER BY 
            c.created_at DESC
        LIMIT :limit OFFSET :offset;
    ";

    $stmt = $this->db->prepare($sql);
    $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
    $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


    public function countCourses() {
        $sql = "SELECT COUNT(*) AS total FROM courses";
        $stmt = $this->db->query($sql);
        return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
    }
    

    public function readOne($id)
    {
        $sql = "SELECT * FROM courses WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
        $cours =  $stmt->fetch(PDO::FETCH_ASSOC);
        var_dump($cours);
    }

    public function update($id)
    {
        $sql = "UPDATE courses SET title = ?, description = ?, video_url = ?, image_url = ?, document_url = ?, category_id = ?, price = ? WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $cours = $stmt->execute([
            $this->title, 
            $this->description, 
            $this->videoUrl, 
            $this->imageUrl, 
            $this->documentUrl, 
            $this->categoryId, 
            $this->price, 
            $id
        ]);

        return $cours;
    }

    public function delete($id)
    {
        $sql = "DELETE FROM courses WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$id]);
    }

    // Getters and setters...

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getVideoUrl()
    {
        return $this->videoUrl;
    }

    public function setVideoUrl($videoUrl)
    {
        $this->videoUrl = $videoUrl;
    }

    public function getImageUrl()
    {
        return $this->imageUrl;
    }

    public function setImageUrl($imageUrl)
    {
        $this->imageUrl = $imageUrl;
    }

    public function getDocumentUrl()
    {
        return $this->documentUrl;
    }

    public function setDocumentUrl($documentUrl)
    {
        $this->documentUrl = $documentUrl;
    }

    public function getCategoryId()
    {
        return $this->categoryId;
    }

    public function setCategoryId($categoryId)
    {
        $this->categoryId = $categoryId;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }
}
$cours = new Course();
// $cours->setTitle('Course Title');
// $cours->setDescription('Course Description');
// $cours->setVideoUrl('http://example.com/video');
// $cours->setImageUrl('http://example.com/image.jpg');
// $cours->setDocumentUrl('http://example.com/document.pdf');
// $cours->setCategoryId(1);
// $cours->setPrice(100);
// $cours->create();

// $cours->readAll();
// $cours->readOne(15);


// $cours->setTitle('Course');
// $cours->setDescription('Course ');
// $cours->setVideoUrl('http://example.com/google');
// $cours->setImageUrl('http://example.com/google.jpg');
// $cours->setDocumentUrl('http://example.com/google.pdf');
// $cours->setCategoryId(2);
// $cours->setPrice(10);
// $cours->update(15);

// $cours->delete(15);
?>
