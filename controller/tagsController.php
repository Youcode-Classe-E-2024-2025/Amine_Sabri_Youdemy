<?php
require_once __DIR__ . '/../model/tags.php';

class TagController {
    private $modelTag;

    public function __construct() {
        $this->modelTag = new Tag(); 
    }

    public function create($name) {
        $this->modelTag->setName($name);
        if ($this->modelTag->create()) {
            return ['success' => true, 'message' => 'Tag created successfully.'];
        } else {
            return ['success' => false, 'message' => 'Failed to create tag.'];
        }
    }
    
    public function getById($id) {
        $result = $this->modelTag->findById($id);
        if ($result) {
            // var_dump($result);
            return ['success' => true, 'data' => $result];
        } else {
            return ['success' => false, 'message' => 'Tag not found.'];
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
    
    public function delete($id) {
        $this->modelTag->setId($id);
        
        if ($this->modelTag->delete()) {
            return ['success' => true, 'message' => 'Tag deleted successfully.'];
        } else {
            return ['success' => false, 'message' => 'Failed to delete tag.'];
        }
    }
    




    
}

