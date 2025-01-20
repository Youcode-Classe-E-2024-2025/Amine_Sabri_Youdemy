<?php
require_once __DIR__ . '/../model/tags.php';

class TagController {
    private $modelTag;

    public function __construct() {
        $this->modelTag = new Tag(); 
    }

    public function createTag() {
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $name = $_POST['tag_name']; 
            $this->modelTag->setName($name);
            $this->modelTag->create();
            header('Location: views/layouts/dashbord.php?page=tags');
        }
    }    
    public function update($id, $name) {
        $this->modelTag->setId($id);
        $this->modelTag->setName($name);
        
        if ($this->modelTag->update()) {
            return ['success' => true, 'message' => 'Tag updated successfully.'];
        } else {
            return ['success' => false, 'message' => 'Failed to update tag.'];
        }
    }
    
    public function deletetags() {
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $id = $_POST['id'];
            $tag = $this->modelTag->delete($id);
            header('Location: views/layouts/dashbord.php?page=tags');
        }
    }
    
    public function getPaginatedTags($page, $resultsPerPage) {
        $totalTags = $this->modelTag->countAllTags(); 
        $totalPages = ceil($totalTags / $resultsPerPage); 
        $Tags = $this->modelTag->readAllPaginated($page, $resultsPerPage);
    
        return [
            'tags' => $Tags,
            'totalPages' => $totalPages,
            'currentPage' => $page
        ];
    }
    
}

$tag = new TagController();
// $tag->create('sarfar');
// $tag->getById(1);
// $tag->update(1, "Designing");
// $tag->delete(7);
// $tag->getAll();
