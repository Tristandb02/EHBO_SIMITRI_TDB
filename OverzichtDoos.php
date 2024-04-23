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

$stmt = mysqli_stmt_init($link);
$data_query = "SELECT * FROM db_ehbo.dozen WHERE lokaal = ?";
if (mysqli_stmt_prepare($stmt, $data_query)) {
    mysqli_stmt_bind_param($stmt, 's', $_SESSION["klas"]);
    mysqli_stmt_execute($stmt);
    $data_res = mysqli_stmt_get_result($stmt);

    $fields = $data_res->fetch_fields();
    $legeKolom = array();

    while ($data_row = mysqli_fetch_assoc($data_res)) {
        $_SESSION["DoosID"]=$data_row["doosid"];
        foreach ($fields as $field) {
            if (is_null($data_row[$field->name])) {
                $legeKolom[] = $field->name;
            }
        }
    }

}




// Query to get column names from the table
$query = "SELECT COLUMN_NAME 
          FROM INFORMATION_SCHEMA.COLUMNS 
          WHERE TABLE_SCHEMA = 'db_ehbo' 
          AND TABLE_NAME = 'dozen'
          LIMIT 2, 999"; // Skipping the first two columns


$columnNames = array(); // Initialize an array to store column names

if (mysqli_stmt_prepare($stmt, $query)) {
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);

    echo "<table border='1'>";
    echo "<tr>";
    // Fetch column names and display them as table headers
    while ($row = mysqli_fetch_assoc($res)) {


            if(!in_array($row['COLUMN_NAME'], $legeKolom))
            {
                echo "<th>" . $row['COLUMN_NAME'] . "</th>";
                $columnNames[] = $row['COLUMN_NAME']; // Append column name to the array
            }




    }
    echo "</tr>";

    // Now fetch data from the table and display it
    $data_query = "SELECT * FROM db_ehbo.dozen WHERE lokaal = ?";
    if (mysqli_stmt_prepare($stmt, $data_query)) {
        mysqli_stmt_bind_param($stmt, 's', $_SESSION["klas"]);
        mysqli_stmt_execute($stmt);
        $data_res = mysqli_stmt_get_result($stmt);

          while ($data_row = mysqli_fetch_row($data_res)) {
    // Check if the row contains any non-empty values
    if (array_filter($data_row)) {
        echo "<tr>";
        foreach ($data_row as $key => $value) {
            if ($key >= 2) { // Skipping the first two columns
                if($value!=null) {

                    echo "<td>" . $value . "</td>";
                }

            }
        }
        echo "</tr><tr>";
        foreach ($columnNames as $columnName) {
            // Here you can access each column name and perform actions as needed

                switch ($columnName) {
                    case "schaar":
                        echo "<td><input value='Niet aanwezig' type='radio' name='" . $columnName . "'>Niet aanwezig<br><input value='Aanwezig' type='radio' name='" . $columnName . "'>Aanwezig</td>";
                        break;
                    case "ontsmettingsmiddel":
                        echo "<td><input value='Niet aanwezig' type='radio' name='" . $columnName . "'>Niet aanwezig<br><input value='Aanwezig' type='radio' name='" . $columnName . "'>Aanwezig</td>";
                        break;
                    case "handschoenen":
                        echo "<td>Aantal:<input type='number' style='width: 40px' name='" . $columnName . "'></td>";
                        break;
                    default:
                        echo "<td><input value='Niet aanwezig' type='radio' name='" . $columnName . "'>Niet aanwezig<br><input value='Aanwezig' type='radio' name='" . $columnName . "'>Aanwezig</td>"; //de default is voor pleisters en documenten en als er een item wordt toegevoegd
                        break;
                }

        }
    }
}


        echo "</table>";

        echo "</tr><input type='submit' value='Aanpassen' name='btnAanpassen'><input type='submit' value='Item Toevoegen' name='btnPagToev'><input type='submit' value='Terug naar klassen overzicht' name='btnNaarKlassen'";










    } else {
        echo "Error fetching data: " . mysqli_error($link);
    }


} else {
    echo "Error fetching column names: " . mysqli_error($link);
}



if(isset($_POST["btnAanpassen"]))
{
    //UPDATE `db_ehbo`.`dozen` SET `schaar` = 'ja', `ontsmettingsmiddel` = 'weinig', `handschoenen` = '3', `documenten` = 'ja' WHERE (`doosid` = '1');

    $aangepast="";
    $query="UPDATE db_ehbo.dozen set ";
    foreach ($columnNames as $columnName)
    {
        if($_POST[$columnName])
        {

            $query.= $columnName." = '".$_POST[$columnName]."', ";
            if($aangepast=="")
            {
                $aangepast.=$columnName;
            }else{
                $aangepast.=", ".$columnName;
            }



        }
    }
    //echo $query;
    $query = substr($query, 0, -2);


    if (mysqli_stmt_prepare($stmt, "SELECT * FROM db_ehbo.dozen WHERE lokaal = ?")) {
        mysqli_stmt_bind_param($stmt, 's', $_SESSION["klas"]);
        mysqli_stmt_execute($stmt);
        $res = mysqli_stmt_get_result($stmt);
        $id=mysqli_fetch_row($res);
    }

    $query.=" where (doosid = '".$id[0]."')";
    if(mysqli_stmt_prepare($stmt,$query))
    {
        if(mysqli_stmt_execute($stmt))
        {
            echo "gelukt";
//INSERT INTO `db_ehbo`.`logboek` (`idLeerkracht`, `datum`, `lokaal`, `status`) VALUES ('1', 'datum', 'K123', '2');
            if(mysqli_stmt_prepare($stmt,"INSERT INTO `db_ehbo`.`logboek` (`idLeerkracht`, `datum`, `lokaal`, `status`) VALUES (?, ?, ?, ?);"))
            {
                $date = date("Y-m-d");
                $status= "Inhoud doos aangepast (".$aangepast.")";

                mysqli_stmt_bind_param($stmt, 'isss',$_SESSION["id"],$date,$_SESSION["klas"],$status);
                 if(mysqli_stmt_execute($stmt))
                 {
                     echo "logboek toegevoegd";
                 }
                 else
                 {
                     echo "logboek niet toegevoegd";
                 }
            }




            header("location: OverzichtDoos.php");
        }
        else
        {
            echo "niet gelukt";
        }
    }
}
if(isset($_POST["btnPagToev"]))
{
    header("Location: items_toevoegen.php");
}
if(isset($_POST["btnNaarKlassen"]))
{
    header("location: overzichtKlas.php");
}
// Close connection
mysqli_close($link);
?>


    </body>

</form>

</html>
