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
        <input type="text" id="nums1" name="nums1" placeholder="e.g., 1,2,3,0,0,0" required><br>

        <label for="m">Number of valid elements in nums1 (m):</label><br>
        <input type="number" id="m" name="m" placeholder="e.g., 3" required><br>

        <label for="nums2">Enter the second array (nums2):</label><br>
        <input type="text" id="nums2" name="nums2" placeholder="e.g., 2,5,6" required><br>

        <label for="n">Number of valid elements in nums2 (n):</label><br>
        <input type="number" id="n" name="n" placeholder="e.g., 3" required><br>

        <input type="submit" value="Merge Arrays">
    </form>

    <?php
    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        function merge(&$nums1, $m, $nums2, $n) {
            // Indices for nums1 and nums2
            $i = 0; // Pointer for nums1
            $j = 0; // Pointer for nums2
            $merged = []; // Resultant merged array

            // Merge while there are elements in both arrays
            while ($i < $m && $j < $n) {
                if ($nums1[$i] <= $nums2[$j]) {
                    $merged[] = $nums1[$i];
                    $i++;
                } else {
                    $merged[] = $nums2[$j];
                    $j++;
                }
            }

            // If there are remaining elements in nums1
            while ($i < $m) {
                $merged[] = $nums1[$i];
                $i++;
            }

            // If there are remaining elements in nums2
            while ($j < $n) {
                $merged[] = $nums2[$j];
                $j++;
            }

            // Replace nums1 with merged result
            $nums1 = $merged;
        }

        // Get the values from the form
        $nums1_input = explode(',', $_POST['nums1']);
        $nums1 = array_map('intval', $nums1_input);
        $m = intval($_POST['m']); // Number of valid elements in nums1

        $nums2_input = explode(',', $_POST['nums2']);
        $nums2 = array_map('intval', $nums2_input);
        $n = intval($_POST['n']); // Number of valid elements in nums2

        // Sort both arrays before merging
        sort($nums1);
        sort($nums2);

        // Call the merge function
        merge($nums1, $m, $nums2, $n);

        // Output the merged result
        echo '<strong>Merged Array:</strong> ' . implode(', ', $nums1) ;
    }
    ?>

</body>

</html>
