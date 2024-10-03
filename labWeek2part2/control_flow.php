<?php
class ControlFlow {
    public $definition;

    // Constructor to determine adult or minor
    public function __construct($age) {
        $this->definition = ($age >= 18) ? "You are an adult" . '<br><br>' : "You are a minor" . '<br><br>';
    }
}

include_once "variables.php";

// Check if age is set and create an instance of ControlFlow
if (isset($student->age)) {
    $controlFlow = new ControlFlow($student->age);
    echo $controlFlow->definition;
} else {
    echo "Something went wrong. Check your code!";
}
?>