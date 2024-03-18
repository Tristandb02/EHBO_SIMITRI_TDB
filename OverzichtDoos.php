<?php
include "Verbinding.php";
session_start();
echo "<h1>EHBO-doos van lokaal " . $_SESSION["klas"] . "</h1>";

// Query to get column names from the table
$query = "SELECT COLUMN_NAME 
          FROM INFORMATION_SCHEMA.COLUMNS 
          WHERE TABLE_SCHEMA = 'db_ehbo' 
          AND TABLE_NAME = 'dozen'
          LIMIT 2, 999"; // Skipping the first two columns

$stmt = mysqli_stmt_init($link);

if (mysqli_stmt_prepare($stmt, $query)) {
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);

    echo "<table border='1'>";
    echo "<tr>";
    // Fetch column names and display them as table headers
    while ($row = mysqli_fetch_assoc($res)) {
        echo "<th>" . $row['COLUMN_NAME'] . "</th>";
    }
    echo "</tr>";

    // Now fetch data from the table and display it
    $data_query = "SELECT * FROM db_ehbo.dozen WHERE lokaal = ?";
    if (mysqli_stmt_prepare($stmt, $data_query)) {
        mysqli_stmt_bind_param($stmt, 's', $_SESSION["klas"]);
        mysqli_stmt_execute($stmt);
        $data_res = mysqli_stmt_get_result($stmt);

        while ($data_row = mysqli_fetch_row($data_res)) {
            echo "<tr>";
            foreach ($data_row as $key => $value) {
                if ($key >= 2) { // Skipping the first two columns
                    echo "<td>".$value."</td>";
                }
            }
            echo "</tr>";
        }
    } else {
        echo "Error fetching data: " . mysqli_error($link);
    }

    echo "</table>";
} else {
    echo "Error fetching column names: " . mysqli_error($link);
}

// Close connection
mysqli_close($link);
?>
