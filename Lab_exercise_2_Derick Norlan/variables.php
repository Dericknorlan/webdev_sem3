<?php
class Student {
    public $name;
    public $sex;
    public $age; // This will hold a formatted string for age
    public $gpa;
    public $isStudent;
    public $birthDate; // Store the birth date privately

    function __construct($name = "Derick Norlan", $sex = "Male", $birthDate = "2005-10-16", $gpa = 3.85, $isStudent = true) {
        $this->name = $name;
        $this->sex = $sex;
        $this->birthDate = $birthDate; // Use YYYY-MM-DD format for clarity
        $this->gpa = $gpa;
        $this->isStudent = $isStudent;
        $this->age = $this->calculateAge(); // Calculate the age upon instantiation
    }

    // Method to calculate age in years, months, and days
    public function calculateAge() {
        $birthDate = new DateTime($this->birthDate); // Create a DateTime object for birth date
        $currentDate = new DateTime(); // Current date
        $ageDifference = $birthDate->diff($currentDate); // Calculate the difference
        
        // Return the formatted age string
        return $ageDifference->y . ' years ' . $ageDifference->m . ' months ' . $ageDifference->d . ' days';
    }

    public function displayInfo() {
        echo '
            Name: ' . $this->name . '<br>
            Sex: ' . $this->sex . '<br>
            Age: ' . $this->age . '<br>
            GPA: ' . $this->gpa . '<br>
            Is Student: ' . ($this->isStudent ? "Yes" : "No").'<br>'
        ;
    }
}

$student = new Student();
$student->displayInfo();
?>
