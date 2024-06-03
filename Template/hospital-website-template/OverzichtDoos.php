<?php
session_start();
if(isset($_POST["btnPagToev"]))
{
    header("Location: item_toevoegen.php");
    exit();
}
if(isset($_POST["btnNaarKlassen"]))
{
    header("location: OverzichtKlas.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>MEDINOVA - Hospital Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700&family=Roboto:wght@400;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>



<!-- Navbar Start -->
<div class="container-fluid sticky-top bg-white shadow-sm">
    <div class="container">
        <nav class="navbar navbar-expand-lg bg-white navbar-light py-3 py-lg-0">
            <a href="https://www.beveren.be/nl/scholen/gti-beveren"  class="navbar-brand">
                <h1 class="m-0 text-uppercase text-primary">EHBO</h1>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <?php
                    session_start();
                    if ($_SESSION['Rol'] == 'beheerder'){
                        echo '<a href="Home_Beheerder.php" class="nav-item nav-link ">Home</a>';
                    }
                    else {
                        echo '<a href="Home_Gebruiker.php" class="nav-item nav-link ">Home</a>';
                    }

                    ?>
                    <a href="OverzichtKlas.php" class="nav-item nav-link active">Klassen     overzicht</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pagina's</a>
                        <div class="dropdown-menu m-0">
                            <?php
                            session_start();
                            if ($_SESSION['Rol'] == 'beheerder'){

                                echo'<a href="Gebruiker_toevoegen.php" class="dropdown-item">Gebruiker aanmaken</a>';
                                echo'<a href="logboek.php" class="dropdown-item">Logboek</a>';
                                echo'<a href="Gebruikers.php" class="dropdown-item">Lijst gebruiker</a>';
                                echo '<a href="OverzichtOntbreek.php" class="dropdown-item">Ontbrekende Items</a>';
                            }
                            echo '<a href="Wachtwoord_Aanpassen.php" class="dropdown-item">Wachtwoor Aanpassen</a>';
                            echo'<a href="index.php" class="dropdown-item">Afmelden</a>';
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</div>
<!-- Navbar End -->


<!-- Services Start -->


<!--
Author: Milan Van Wonterghem
-->
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

echo "<h1>EHBO-doos van lokaal " . $_SESSION["klas"] . "</h1>";

$stmt = mysqli_stmt_init($link);
$data_query = "SELECT * FROM EHBO_dozen WHERE lokaal = ?";
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
          WHERE TABLE_SCHEMA = 'gtiictbeokcommon' 
          AND TABLE_NAME = 'EHBO_dozen'
          LIMIT 2, 999"; // Skipping the first two columns


$columnNames = array(); // Initialize an array to store column names

if (mysqli_stmt_prepare($stmt, $query)) {
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);

    echo '<style>
        input[type="submit"] {
                width: 100%;
                padding: 10px;
                margin-top: 10px;
                background-color: #4CAF50;
                color: white;
                border: none;
                border-radius: 4px;
                cursor: pointer;
            }
            input[type="submit"]:hover {
                background-color: #45a049;
            }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            font-size: 18px;
            text-align: left;
        }
        th, td {
            padding: 12px;
            border: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
            color: black;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        input[type=radio], input[type=number] {
            margin-top: 5px;
        }
    </style>';

    echo "<table><tr>";
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
    $data_query = "SELECT * FROM EHBO_dozen WHERE lokaal = ?";
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
                        echo "<td>Aantal:<input type='number' min='0' style='width: 40px' name='" . $columnName . "'></td>";
                        break;
                    default:
                        echo "<td><input value='Niet aanwezig' type='radio' name='" . $columnName . "'>Niet aanwezig<br><input value='Aanwezig' type='radio' name='" . $columnName . "'>Aanwezig</td>"; //de default is voor pleisters en documenten en als er een item wordt toegevoegd
                        break;
                }

        }
    }
}


        echo "</table>";

        echo "</tr><input type='submit' value='Aanpassen' name='btnAanpassen'>";
        //echo "<input type='submit' value='Item Toevoegen' name='btnPagToev'>";
        echo "<input type='submit' value='Terug naar klassen overzicht' name='btnNaarKlassen'>";










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
    $query="UPDATE EHBO_dozen set ";
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


    if (mysqli_stmt_prepare($stmt, "SELECT * FROM EHBO_dozen WHERE lokaal = ?")) {
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
//INSERT INTO `db_ehbo`.`logboek` (`idLeerkracht`, `datum`, `lokaal`, `status`) VALUES ('1', 'datum', 'K123', '2');
            if(mysqli_stmt_prepare($stmt,"INSERT INTO `gtiictbeokcommon`.`EHBO_logboek` (`idLeerkracht`, `datum`, `lokaal`, `status`) VALUES (?, ?, ?, ?);"))
            {
                $date = date("Y-m-d");
                $status= "Inhoud doos aangepast (".$aangepast.")";

                mysqli_stmt_bind_param($stmt, 'isss',$_SESSION["id"],$date,$_SESSION["klas"],$status);

                 if(mysqli_stmt_execute($stmt))
                 {
                     //echo "logboek toegevoegd";
                 }
                 else
                 {
                     //echo "logboek niet toegevoegd";
                 }
            }

            echo("<meta http-equiv='refresh' content='0'>");
            $gelukt="ja";







        }
        else
        {
            echo "niet gelukt";
        }
    }
}

// Close connection
mysqli_close($link);
?>


</body>

</form>

</html>




<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="lib/easing/easing.min.js"></script>
<script src="lib/waypoints/waypoints.min.js"></script>
<script src="lib/owlcarousel/owl.carousel.min.js"></script>
<script src="lib/tempusdominus/js/moment.min.js"></script>
<script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
<script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

<!-- Template Javascript -->
<script src="js/main.js"></script>
</body>

</html>
