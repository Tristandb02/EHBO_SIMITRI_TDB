<!DOCTYPE html>
<!--
Author: Milan Van Wonterghem
-->
<html lang="en">
<form method="post">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabbel met klassen</title>
</head>
<body>

<?php
session_start();

?>

<table border="1">
    <?php
    for($i=1; $i<=3; $i++) {
        echo "<tr>";
        for($i2=8; $i2<=23; $i2++) {
            $klas = "K$i";
            if($i2 < 10) {
                $klas .= "0";
            }
            $klas .= $i2;
            echo "<td><input type='submit' name='klaslink' value=$klas></td>";
        }
        echo "</tr>";
    }


    if(isset($_POST["klaslink"]))
    {
        $_SESSION["klas"]=$_POST["klaslink"];

        header("location: OverzichtDoos.php");
    }
    echo "<br><br><br><input type='submit' value='Terug naar home pagina' name='btnGaHomePag'>";
    if(isset($_POST["btnGaHomePag"]))
    {

        if($_SESSION["Rol"] == "beheerder")
        {
            header("location: Home_Beheerder.php");
        }else if($_SESSION["Rol"] == "gebruiker")
        {
            header("location: Home_Gebruiker.php");
        }



    }
    ?>
</table>

</body>
</form>
</html>


<?php

