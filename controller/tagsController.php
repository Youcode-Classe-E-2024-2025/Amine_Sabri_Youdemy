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
    
 
}

