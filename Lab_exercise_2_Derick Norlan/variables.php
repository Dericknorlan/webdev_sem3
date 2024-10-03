<?php
class Student {
    public $name;
    public $sex;
    public $age; 
    public $gpa;
    public $isStudent;
    public $birthDate; 

    function __construct($name = "Derick Norlan", $sex = "Male", $birthDate = "2005-10-16", $gpa = 3.85, $isStudent = true) {
        $this->name = $name;
        $this->sex = $sex;
        $this->birthDate = new DateTime($birthDate); 
        $this->gpa = $gpa;
        $this->isStudent = $isStudent;
        $this->age = $this->calculateAge(); 
    }

    // Method to calculate age in years, months, and days
    public function calculateAge() {
        $currentDate = new DateTime(); // Current date
        $ageDifference =$this->birthDate->diff($currentDate); // Calculate the difference
        
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
