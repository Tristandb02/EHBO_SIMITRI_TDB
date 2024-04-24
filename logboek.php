<!--
Author: Milan Van Wonterghem
-->
<html>
<form method="post">
    <input type="submit" name="btnGoHome" value="ga naar home">

</form>
</html>
<?php
session_start();
include "Verbinding.php";




// Check connection
if (mysqli_connect_errno()) {
    die("Connection failed: " . mysqli_connect_error());
}






$result = mysqli_query($link, "select gebruikerid, achternaam, voornaam from db_ehbo.gebruikers");

if (mysqli_num_rows($result) > 0) {
    $namenLL=array();

    while ($row = mysqli_fetch_assoc($result)) {
        array_push($namenLL,$row["gebruikerid"].$row["achternaam"]." ".$row["voornaam"]);//ik voeg als eerste karakter de id mee (bv. 1Simon Marchand) Zodat ik veel makelijker de juiste naam van de persoon kan laten zien

    }
    }
//fout met naam leerkrachten







// Query to fetch data from the table
$query = "SELECT logid, idLeerkracht, datum, lokaal, status FROM logboek";
$result = mysqli_query($link, $query);





if (mysqli_num_rows($result) > 0) {
    // Output data of each row
    echo "<table border='1'><tr><th>Log ID</th><th>Leerkracht</th><th>Datum</th><th>Lokaal</th><th>Status</th></tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        $idLL=$row["idLeerkracht"];

        echo "<tr><td>" . $row["logid"] . "</td><td>" ;
            for($i=0;$i<sizeof($namenLL);$i++)
            {
                if(substr($namenLL[$i],0,1)==$row["idLeerkracht"])
                {
                    echo substr($namenLL[$i],1);
                }
            }

        echo "</td><td>" . $row["datum"] . "</td><td>" . $row["lokaal"] . "</td><td>" . $row["status"] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "leeg logboek";
}
mysqli_close($link);
if(isset($_POST["btnGoHome"]))
{
    echo "hey";
    if ($_SESSION["Rol"] == "gebruiker")
    {

        header("location: Home_Gebruiker.php");
    }

    if ($_SESSION["Rol"] == "beheerder")
    {
        header("location: Home_Beheerder.php");
    }
}


