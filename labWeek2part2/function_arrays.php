<?php
class functions_arrays {
    function greet($student) {
        echo 'Hello, ' . $student->name .'<br>';
    }
}

include_once "control_flow.php";
$students = [];

$student2 = new Student("kemal", "Male", "03-04-2005", 3.80);
$student2->displayInfo();
echo '<br>';

$student3 = new Student("aaron", "Male", "06-09-2005", 3.81);
$student3->displayInfo();
echo '<br>';

$student4 = new Student("deny", "Male", "25-08-2005", 3.90);
$student4->displayInfo();
echo '<br>';

$student5 = new Student("aryo", "Male", "05-06-2004", 3.80);
$student5->displayInfo();
echo '<br>';

array_push($students, $student, $student2, $student3, $student4, $student5);
$functions = new functions_arrays();
foreach ($students as $student) {
    $functions->greet($student);
}
?>
