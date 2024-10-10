<?php
class PrintedBook extends book {
    private $numOfPage;

    function __construct($title, $author, $publicationYear, $numOfPage) {
        parent::__construct($title, $author, $publicationYear);
        $this->numOfPage = $numOfPage;
    }

    function getNumofPages() {
        return $this->numOfPage;
    }

    function getDetails() {
        return parent::getDetails(). ", Number of Pages: {$this->numOfPage}pages";
    }
}
?>