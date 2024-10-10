<?php
class Book {
    private $title;
    private $author;
    private $publicationYear;

    function __construct($title, $author, $publicationYear) {
        $this->title = $title;
        $this->author = $author;
        $this->publicationYear = $publicationYear;
    }

    function getTitle() {
        return $this->title;
    }

    function getAuthor() {
        return $this->author;
    }

    function getPublicationYear() {
        return $this->publicationYear;
    }

    public function getDetails() {
        return "Title: ". $this->title. ", Author: ". $this->author. ", Publication Year: ". $this->publicationYear;
    }
}
?>