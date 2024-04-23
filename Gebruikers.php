<!--
Authors: Milan Van Wonterghem, Simon Marchand
-->
<html>


<form method="post">

<input type="submit" value="Terugkeren" name="btnTerug">

</form>
</body>
</html>

<?php



// Start de sessie
session_start();

// Inclusie van de verbinding
include('Verbinding.php');

// Controleer of de 'btnTerug' is ingediend om terug te keren
if (isset($_POST["btnTerug"])) {
    // Redirect naar Home_Beheerder.php
    header("Location: Home_Beheerder.php");
    exit; // Stop de verdere uitvoering van de script
}

// Controleren op indiening van het verwijderingsformulier
if (isset($_POST['btnVerwijder'])) {
    // Controleer of de gebruikerid is ingesteld
        // Voorbereiden en uitvoeren van de verwijderingsquery
        $query = "DELETE FROM db_ehbo.gebruikers WHERE gebruikerid = ?";
        $statement = mysqli_prepare($link, $query);
        mysqli_stmt_bind_param($statement, 'i', $_POST['btnVerwijder']);
        if (mysqli_stmt_execute($statement)) {
            // Als verwijdering succesvol is, geef dan een succesbericht weer
            echo 'Gebruiker is verwijderd';
        } else {
            // Als er een fout optreedt, geef dan een foutmelding weer
            echo 'Verwijderen is mislukt: ' . mysqli_stmt_error($statement);
        }


}

// Query om alle gebruikers op te halen
$query = 'SELECT gebruikerid, voornaam, achternaam, mail, rol FROM db_ehbo.gebruikers ORDER BY achternaam ASC';
$resultaat = mysqli_query($link, $query);

// Controleren of er resultaten zijn
if ($resultaat) {
    echo '<form method="post">';
    echo '<table border="1">';
    echo '<tr><th>Gebruikerid</th><th>Achternaam</th><th>Voornaam</th><th>Mail</th><th>Rol</th><th>Gebruiker verwijderen</th></tr>';
    while ($row = mysqli_fetch_assoc($resultaat)) {
        echo '<tr>';
        echo "<td>{$row['gebruikerid']}</td>";
        echo "<td>{$row['achternaam']}</td>";
        echo "<td>{$row['voornaam']}</td>";
        echo "<td>{$row['mail']}</td>";
        echo "<td>{$row['rol']}</td>";
        echo '<td><button type="submit" value='.$row["gebruikerid"].' name="btnVerwijder" >Verwijder</button></td>';
        //echo '<td><input type="submit" value='.$row["gebruikerid"].' name="btnVerwijder" ></td>';
        echo '</tr>';
    }
    echo '</table>';
    echo '</form>';
} else {
    // Geen resultaten gevonden, geef een foutmelding weer
    echo 'Geen gebruikers gevonden: ' . mysqli_error($link);
}

// Sluit de verbinding
mysqli_close($link);


?>

