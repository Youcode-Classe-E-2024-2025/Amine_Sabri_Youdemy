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
    private $created_by;
    private $db;

    public function __construct()
    {
        $database = new Database();
        $this->db = $database->getConnection();
    }

    public function create($tags)
{
    $this->db->beginTransaction();


    $sql = "INSERT INTO courses (title, description, video_url, image_url, document_url, category_id, price,created_by) VALUES (?, ?, ?, ?, ?, ?, ? , ?)";
    $stmt = $this->db->prepare($sql);
    $stmt->execute([
        $this->title,
        $this->description,
        $this->videoUrl,
        $this->imageUrl,
        $this->documentUrl,
        $this->categoryId,
        $this->price,
        $this->created_by
    ]);
    $courseId = $this->db->lastInsertId();
    $sqlTags = "INSERT INTO course_tag (course_id, tag_id) VALUES (?, ?)";
    $stmtTags = $this->db->prepare($sqlTags);

    foreach ($tags as $tagId) {
        $stmtTags->execute([$courseId, $tagId]);
    }
    $this->db->commit();

    return $courseId;
}

public function readAll($limit, $offset, $keyword = "") {
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
            cat.name,
            GROUP_CONCAT(t.name SEPARATOR ', ') AS tags
        FROM 
            courses c
        LEFT JOIN 
            categories cat ON c.category_id = cat.id
        LEFT JOIN 
            course_tag ct ON c.id = ct.course_id
        LEFT JOIN 
            tags t ON ct.tag_id = t.id ";

    if (!empty($keyword)) {
        $sql .= "WHERE c.title LIKE :keyword OR c.description LIKE :keyword ";
    }

    $sql .= "GROUP BY 
                c.id, cat.name
            ORDER BY 
                c.created_at DESC
            LIMIT :limit OFFSET :offset;
            ";

    $stmt = $this->db->prepare($sql);
    $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
    $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
    if (!empty($keyword)) {
        $stmt->bindValue(':keyword', "%".$keyword."%");
    }
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

public function readAllByUser($user_id, $limit, $offset) {
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
            cat.name,
            GROUP_CONCAT(t.name SEPARATOR ', ') AS tags
        FROM 
            courses c
        LEFT JOIN 
            categories cat ON c.category_id = cat.id
        LEFT JOIN 
            course_tag ct ON c.id = ct.course_id
        LEFT JOIN 
            tags t ON ct.tag_id = t.id
        WHERE
            c.created_by = :user_id
        GROUP BY 
            c.id, cat.name
        ORDER BY 
            c.created_at DESC
        LIMIT :limit OFFSET :offset;
    ";

    $stmt = $this->db->prepare($sql);
    $stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
    $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
    $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

public function countCoursesGuest($keyword = "") {
    $sql = "SELECT COUNT(*) AS total FROM courses ";

    if (!empty($keyword)) {
       $sql .= 'WHERE title LIKE :keyword OR description LIKE :keyword';
    }

    $stmt = $this->db->prepare($sql);
    // $stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
    if (!empty($keyword)) {
        $stmt->bindValue(':keyword', "%".$keyword."%");
    }
    $stmt->execute();
    
    return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
}

public function countCourses($user_id) {
    $sql = "SELECT COUNT(*) AS total FROM courses WHERE created_by = :user_id";
    $stmt = $this->db->prepare($sql);
    $stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
    $stmt->execute();
    
    return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
}

    

    public static function readOne($id)
    {
        $database = new Database();
        $db = $database->getConnection();
        $sql = "
            SELECT 
                courses.id ,
                courses.title ,
                courses.description ,
                courses.video_url,
                courses.image_url,
                courses.document_url,
                courses.created_at,
                courses.price,
                categories.name,
                GROUP_CONCAT(tags.name SEPARATOR ', ') AS tags
            FROM 
                courses
            LEFT JOIN 
                categories ON courses.category_id = categories.id
            LEFT JOIN 
                course_tag ON courses.id = course_tag.course_id
            LEFT JOIN 
                tags ON course_tag.tag_id = tags.id
            WHERE 
                courses.id = ?
            GROUP BY 
                courses.id, categories.name;
        ";
        $stmt = $db->prepare($sql);
        $stmt->execute([$id]);
        $courses = $stmt->fetch(PDO::FETCH_ASSOC);
        return $courses;
        // var_dump($cours);
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


    public function getUsersByCourseCreator($creator_id) {
        $query = "SELECT 
                    u.username,
                    u.email,
                    c.title AS course_title
                  FROM 
                    user_cours uc
                  JOIN 
                    users u ON u.id = uc.user_id
                  JOIN 
                    courses c ON c.id = uc.cours_id
                  WHERE 
                    c.created_by = :creator_id";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':creator_id', $creator_id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public static function countUsersInCoursesByUser($user_id) {
        $database = new Database();
        $db = $database->getConnection();
        $sql = "
            SELECT 
                COUNT(*) AS total_courses
            FROM 
                courses
            WHERE 
                created_by = :user_id
        ";
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result ? $result['total_courses'] : 0;
    }
    
    public static function countUsersInCoursesByCreator($user_id) {
        $database = new Database();
        $db = $database->getConnection();
        $sql = "
            SELECT 
                COUNT(DISTINCT uc.user_id) AS total_users
            FROM 
                user_cours uc
            JOIN 
                courses c ON uc.cours_id = c.id
            WHERE 
                c.created_by = :user_id
        ";
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result ? $result['total_users'] : 0;
    }

    public function countTotalCourses() {
        $sql = "SELECT COUNT(*) AS total_courses FROM courses";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result ? $result['total_courses'] : 0;
    }
    
    public function getCourseWithMostStudents() {
        $sql = "
            SELECT 
                c.title AS course_title,
                COUNT(uc.user_id) AS total_students
            FROM 
                courses c
            LEFT JOIN 
                user_cours uc ON c.id = uc.cours_id
            GROUP BY 
                c.id
            ORDER BY 
                total_students DESC
            LIMIT 1
        ";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getCourseByCategory() {
        $sql = "
            SELECT 
                cat.name AS category_name,
                COUNT(c.id) AS total_courses
            FROM 
                courses c
            LEFT JOIN 
                categories cat ON c.category_id = cat.id
            GROUP BY 
                cat.name
            ORDER BY 
                total_courses DESC
        ";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getTopTeachers() {
        $sql = "
            SELECT 
                u.username AS teacher_name,
                COUNT(c.id) AS total_courses
            FROM 
                courses c
            JOIN 
                users u ON c.created_by = u.id
            GROUP BY 
                u.id
            ORDER BY 
                total_courses DESC
            LIMIT 3
        ";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
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
    public function getCreated_by()
    {
        return $this->created_by;
    }

    public function setCreated_by($created_by)
    {
        $this->created_by =$created_by;
    }
}
// $cours = new Course();
// $cours->setTitle('Course Title');
// $cours->setDescription('Course Description');
// $cours->setVideoUrl('http://example.com/video');
// $cours->setImageUrl('http://example.com/image.jpg');
// $cours->setDocumentUrl('http://example.com/document.pdf');
// $cours->setCategoryId(1);
// $cours->setPrice(100);
// $cours->create();

// $cours->readAll();
// $cours->readOne(20);


// $cours->setTitle('Course');
// $cours->setDescription('Course ');
// $cours->setVideoUrl('http://example.com/google');
// $cours->setImageUrl('http://example.com/google.jpg');
// $cours->setDocumentUrl('http://example.com/google.pdf');
// $cours->setCategoryId(2);
// $cours->setPrice(10);
// $cours->update(15);

// $cours->delete(15);


// $course = new Course();
// $course->setTitle("hello word");
// $course->setDescription("Description");
// $course->setVideoUrl("http://example.com/video.mp4");
// $course->setImageUrl("http://example.com/image.jpg");
// $course->setDocumentUrl("http://example.com/document.pdf");
// $course->setCategoryId(1);
// $course->setPrice(100);
// $course->setCreated_by(6); 

// $tags = [1, 2, 3]; 
// $course->create($tags);
?>
