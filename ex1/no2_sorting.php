<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Merge Two Sorted Arrays</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }

        .result {
            margin-top: 20px;
            padding: 10px;
            border-radius: 5px;
        }

        h1 {
            color: #333;
        }

        label {
            margin-top: 10px;
            display: inline-block;
        }

        input[type="text"],
        input[type="number"] {
            width: 300px;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            margin-top: 10px;
            padding: 10px 15px;
            margin-bottom: 30px;
            color: white;
            background-color: #6d6d6d;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #333;
        }
    </style>
</head>

<body>

    <h1>Merge Two Sorted Arrays</h1>

    <form method="post">
        <label for="nums1">Enter the first array (nums1):</label><br>
        <input type="text" id="nums1" name="nums1" placeholder="e.g., 1,2,3,0,0,0"><br>

        <label for="m">Number of elements in nums2 (m):</label><br>
        <input type="number" id="m" name="m" placeholder="e.g., 1"><br>

        <label for="nums2">Enter the second array (nums2):</label><br>
        <input type="text" id="nums2" name="nums2" placeholder="e.g., 2,5,6"><br>

        <label for="n">Number of elemnts in nums2 (n):</label><br>
        <input type="number" id="n" name="n" placeholder="e.g., 1"><br>

        <input type="submit" value="Merge Arrays">
    </form>

    <?php
    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        function merge(&$nums1, $m, $nums2, $n)
        {
            $x = $m - 1; // Start from the end of nums1
            $y = $n - 1; // Start from the end of nums2
            $z = $m + $n - 1; // End position in nums1

            // Merge arrays from the back to avoid overwriting
            while ($x >= 0 && $y >= 0) {
                if ($nums1[$x] > $nums2[$y]) {
                    $nums1[$z] = $nums1[$x];
                    $x--;
                } else {
                    $nums1[$z] = $nums2[$y];
                    $y--;
                }
                $z--;
            }

            // If nums2 still has elements, add them
            while ($y >= 0) {
                $nums1[$z] = $nums2[$y];
                $y--;
                $z--;
            }
        }

        // Get the values from the form
        $nums1_input = explode(',', $_POST['nums1']);
        $nums1 = array_map('intval', $nums1_input);
        $m = intval($_POST['m']);

        $nums2_input = explode(',', $_POST['nums2']);
        $nums2 = array_map('intval', $nums2_input);
        $n = intval($_POST['n']);

        // Call the merge function
        merge($nums1, $m, $nums2, $n);

        // Output the merged result
        echo '<strong>Merged Array:</strong> ' . implode(', ', $nums1);
    }
    ?>
</body>

</html>