<html>
<form method="post">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Overzicht Doos</title>
    </head>
    <body>




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
$columnNames = array(); // Initialize an array to store column names

if (mysqli_stmt_prepare($stmt, $query)) {
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);

    echo "<table border='1'>";
    echo "<tr>";
    // Fetch column names and display them as table headers
    while ($row = mysqli_fetch_assoc($res)) {
        echo "<th>" . $row['COLUMN_NAME'] . "</th>";
        $columnNames[] = $row['COLUMN_NAME']; // Append column name to the array
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
            echo "</tr><tr>";
            foreach ($columnNames as $columnName) {
                // Here you can access each column name and perform actions as needed
                switch ($columnName) {
                    case "schaar":
                        echo "<td><input value='nee' type='radio' name='".$columnName."'>Nee<br><input value='ja' type='radio' name='".$columnName."'>Ja</td>";
                        break;
                    case "ontsmettingsmiddel":
                        echo "<td><input value='nee' type='radio' name='".$columnName."'>Nee<br><input value='weinig' type='radio' name='".$columnName."'>Weinig<br><input value='ja' type='radio' name='".$columnName."'>Ja</td>";
                        break;
                    case "handschoenen":
                        echo "<td>Aantal:<input type='number' style='width: 40px' name='".$columnName."'></td>";
                        break;
                    default:
                        echo "<td><input value='nee' type='radio' name='".$columnName."'>Nee<br><input value='ja' type='radio' name='".$columnName."'>Ja</td>";
                        break;
                }

            }
        }
        echo "</table>";

        echo "</tr><input type='submit' value='Aanpassen' name='btnAanpassen'>";










    } else {
        echo "Error fetching data: " . mysqli_error($link);
    }


} else {
    echo "Error fetching column names: " . mysqli_error($link);
}



if(isset($_POST["btnAanpassen"]))
{
    //UPDATE `db_ehbo`.`dozen` SET `schaar` = 'ja', `ontsmettingsmiddel` = 'weinig', `handschoenen` = '3', `documenten` = 'ja' WHERE (`doosid` = '1');


    $query="UPDATE db_ehbo.dozen set ";
    foreach ($columnNames as $columnName)
    {
        if($_POST[$columnName])
        {
            //echo $columnName." - ".$_POST[$columnName]."<br>";
            $query.= $columnName." = ".$_POST[$columnName].", ";

        }
    }
    //echo $query;
    $query = substr($query, 0, -2);
    $query.=" where (lokaal = ".$_SESSION["klas"].")";
}

// Close connection
mysqli_close($link);
?>


    </body>

</form>

</html>
