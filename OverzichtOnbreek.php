<!--
Authors: Simon Marchand, Milan Van Wonterghem, Tristan De Ben
-->
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
echo "<input type='submit' name='btnZoek' value='Laat zien'><br><input type='submit' name='btnTerug' value='Ga terug'><br>";



$LokalenOntbreek="";
$intLokalenOntbreek=0;

if(isset($_POST["Item"]))
{
    if($_POST["Item"]!="handschoenen")
    {
        if(mysqli_stmt_prepare($stmt,"select lokaal from db_ehbo.dozen where ".$_POST["Item"]." = 'Niet Aanwezig'"))
        {
            mysqli_stmt_execute($stmt);
            $res = mysqli_stmt_get_result($stmt);
            while ($row=mysqli_fetch_assoc($res))
            {
                $intLokalenOntbreek++;
                $LokalenOntbreek.=$row["lokaal"].", ";

            }

            $LokalenOntbreek = substr($LokalenOntbreek, 0, -2);
            if ($intLokalenOntbreek != 0)
            {
                $Ontbreek = "Er ontbreken ".$intLokalenOntbreek." ".$_POST["Item"]."  in de volgende lokalen: ".$LokalenOntbreek;
                $_SESSION['Ontbrekend'] = $Ontbreek;
                echo "$Ontbreek";
            }
            else
            {
                echo "Er ontbreken geen ".$_POST["Item"];
            }

        }

    }
    else {
        if (mysqli_stmt_prepare($stmt, "select lokaal from db_ehbo.dozen where " . $_POST["Item"] . " = 1")) {
            mysqli_stmt_execute($stmt);
            $res = mysqli_stmt_get_result($stmt);
            while ($row = mysqli_fetch_assoc($res)) {
                $intLokalenOntbreek++;
                $LokalenOntbreek .= $row["lokaal"] . ", ";

            }

            $LokalenOntbreek = substr($LokalenOntbreek, 0, -2);
            if ($intLokalenOntbreek != 0) {
                $Ontbreek = "Er zijn  " . $intLokalenOntbreek . " lokalen waar er maar 1 paar " . $_POST["Item"] . "  ligt, en dat is in de volgende lokalen: " . $LokalenOntbreek;
                $_SESSION['Ontbrekend'] = $Ontbreek;
                echo "$Ontbreek";
            } else {
                echo "Er ontbreken geen " . $_POST["Item"];
            }

        }
    }

}
if(isset($_POST["btnTerug"]))
{
    header("Location: Home_Beheerder.php");
}