<?php
class Ebook extends Book {
    private $fileSize;

    function __construct($title, $author, $publicationYear, $fileSize) {
        parent::__construct($title, $author, $publicationYear);
        $this->fileSize = $fileSize;
    }

    function getFileSize() {
        return $this->fileSize;
    }
    
    public function getDetails() {
        return parent::getDetails(). ", File Size : {$this->fileSize}MB";
    }
} 
?>