<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <style>
        .container {
            align-items: center;
            justify-content: center;
            display: flex;
            padding-bottom: 20px;
        }

        input[type="number"] {
            text-align: center;
            width: 180px;
            padding: 5px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            text-align: center;
            width: auto;
            padding: 5px;
            margin-top: 5px;
            border-radius: 4px;
            border: 1px solid #ccc;
            border-radius: 4px;
            cursor: pointer;
        }

        p {
            text-align: center;
            margin: 3px;
        }
    </style>
</head>

<body>
    <!-- Form for user input -->
    <div class="container">
        <form action="" method="post">
            <input type="number" name="inputanUser" placeholder="Masukkan Angka (1-50)">
            <input type="submit" name="submit" value="print palindrome">
        </form>
    </div>

    <?php
    // Define the maximum and minimum limits for user input
    $max = 50;
    $min = 1;

    // Check if the form has been submitted
    if (isset($_POST['submit'])) {
        // Check if the user has provided input
        if (isset($_POST['inputanUser'])) {
            // Retrieve and store the user input
            $digit = $_POST['inputanUser'];
            // Ensure the input is within the defined range; if not, adjust it
            if ($digit > $max) $digit = $max; // Set to maximum if greater than max
            if ($digit < $min) $digit = $min; // Set to minimum if less than min
        }
    }

    // Function to generate a palindrome pattern based on the number of repetitions
    function generatePalindrome($reps)
    {
        $result = ""; // Initialize the result string
        // Loop through the number of repetitions
        for ($z = 1; $z <= $reps; $z++) {
            $palindrome = ""; // Initialize a string for the current palindrome
            // Construct the palindrome string (a sequence of "1"s)
            for ($l = 0; $l < $z; $l++) {
                $palindrome .= "1"; // Append "1" for each repetition
            }
            // Append the current palindrome and the multiplication format to the result
            $result .= '<p>' . $palindrome . ' x ' . $palindrome . ' = ';

            // Generate the left half of the palindrome (incrementing numbers)
            for ($x = 0; $x < $z; $x++) {
                $result .= $x + 1; // Append incremented values
            }

            // Generate the right half of the palindrome (decrementing numbers)
            for ($y = $x - 1; $y > 0; $y--) {
                $result .= $y; // Append decremented values
            }

            // Close the paragraph tag for the current palindrome output
            $result .= "</p>";
        }
        return $result; // Return the constructed result
    }
    ?>

    <?php
    // If the user input is set, call the palindrome function and display the result
    if (isset($digit)) {
        echo generatePalindrome($digit);
    }
    ?>
</body>

</html>