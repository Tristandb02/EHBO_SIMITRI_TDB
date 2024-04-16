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






$result = mysqli_query($link, "select achternaam, voornaam from db_ehbo.gebruikers");

if (mysqli_num_rows($result) > 0) {
    $namenLL=array("Lege plaats");

    while ($row = mysqli_fetch_assoc($result)) {
        array_push($namenLL,$row["achternaam"]." ".$row["voornaam"]);

    }
    }








// Query to fetch data from the table
$query = "SELECT logid, idLeerkracht, datum, lokaal, status FROM logboek";
$result = mysqli_query($link, $query);

if (mysqli_num_rows($result) > 0) {
    // Output data of each row
    echo "<table border='1'><tr><th>Log ID</th><th>ID Leerkracht</th><th>Datum</th><th>Lokaal</th><th>Status</th></tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        $idLL=$row["idLeerkracht"];
        echo "<tr><td>" . $row["logid"] . "</td><td>" . $namenLL[] . "</td><td>" . $row["datum"] . "</td><td>" . $row["lokaal"] . "</td><td>" . $row["status"] . "</td></tr>";
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


