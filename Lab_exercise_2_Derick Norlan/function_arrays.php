<?php
    function greet($student) {
        echo 'Hello, ' . $student->name . '<br>';
    }

include "control_flow.php";

// Inisialisasi array dengan objek siswa secara langsung
$students = [
    new Student("kemal", "Male", "03-04-2005", 3.80),
    new Student("aaron", "Male", "06-09-2005", 3.81),
    new Student("deny", "Male", "25-08-2005", 3.90),
    new Student("aryo", "Male", "05-06-2004", 3.80)
];

// Menampilkan informasi untuk setiap siswa
foreach ($students as $student) {
    $student->displayInfo();
    greet($student);
    echo '<br>';
}
?>
