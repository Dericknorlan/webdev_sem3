<?php
// Fungsi untuk menentukan apakah seseorang dewasa atau minor
function checkAge($age) {
    if ($age >= 18) {
        return "You are an adult<br><br>";
    } else {
        return "You are a minor<br><br>";
    }
}

include "variables.php";

// Memeriksa apakah usia sudah diatur
if (isset($student->age)) {
    // Panggil fungsi checkAge dan tampilkan hasilnya
    echo checkAge($student->age);
} else {
    echo "Something went wrong. Check your code!";
}
?>
