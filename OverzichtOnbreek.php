


<?php
include 'Verbinding.php';
$query = "SELECT COLUMN_NAME 
          FROM INFORMATION_SCHEMA.COLUMNS 
          WHERE TABLE_SCHEMA = 'db_ehbo' 
          AND TABLE_NAME = 'dozen'
          LIMIT 2, 999"; // Skipping the first two columns

$stmt = mysqli_stmt_init($link);
$columnNames = array(); // Initialize an array to store column names

if (mysqli_stmt_prepare($stmt, $query)) {
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);

    echo "<table border='1'>";
    echo "<tr>";
    echo "<html>
<form method='post'>
    <select name='Item' >";
    while ($row = mysqli_fetch_assoc($res)) {

        echo "<option value='" . $row['COLUMN_NAME'] . "'>" . $row['COLUMN_NAME'] . "</option>";
    }
}
echo "<input type='submit' name='btnZoek' value='Laat zien'>";




if(isset($_POST["Item"]))
{
    if(mysqli_stmt_prepare($stmt,"select lokaal where ".$_POST["Item"]." = 'Niet Aanwezig'"));
}
