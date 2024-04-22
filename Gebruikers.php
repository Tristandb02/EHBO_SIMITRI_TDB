<html>
<form method="post">

<input type="submit" value="Terugkeren" name="btnTerug">

</form>
</body>
</html>

<?php
/*
if(isset($_POST["btnTerug"]))
{
    session_abort();
    header("Location: Home_Beheerder.php");
}


    //1: verbinding maken met de database
    include ('Verbinding.php');

//2: als de verbinding gelukt is
    if($link)
    {
        //3: opbouw van de query
        //query met een parameters
        $query = 'select gebruikerid, voornaam, achternaam, mail, rol from db_ehbo.gebruikers order by achternaam ASC';


        //4a: statement initialiseren op basis van de link
        $statement = mysqli_stmt_init($link);

        //4b: prepared statement maken op basis van de query en het statement
        if (mysqli_stmt_prepare($statement,$query))
        {
            //4c: parameter een waarde geven (= vraagteken vervangen)

            //5a: statement uitvoeren
            mysqli_stmt_execute($statement);
            //5b: resultaat ophalen
            $resultaat = mysqli_stmt_get_result($statement);
            //5c: record uit het resultaat halen
            echo '<table border=1>'; // bordercolor=#4299f5
            echo '<tr><th>Gebruikerid</th><th>Achternaam</th><th>Voornaam</th><th>Mail</th><th>Rol</th><th>Gebruikers verwijderen</th></tr>';
            while ($row = mysqli_fetch_assoc($resultaat) )
            {
                //5d: toon rij per rij
                echo '<tr>';
                echo "<td > {$row['gebruikerid']}</td>";
                echo "<td > {$row['achternaam']}</td>";
                echo "<td> {$row['voornaam']} </td>";
                echo "<td> {$row['mail']} </td>";
                echo "<td> {$row['rol']} </td>";
                echo '<td><input type="submit" value="Verwijderen" name="bntVerwijder"></td>';
                echo '</tr>';
            }
            echo '</table>';

        }
        else
        {
            echo mysqli_stmt_error($statement);
        }
        if(isset($_POST['bntVerwijder']))
        {



            //2: als de verbinding gelukt is
            if($link)
            {
                //3: opbouw van de query
                //query met een parameters
                $query = 'delete from db_ehbo.gebruikers where gebruikerid = ?';


                //4a: statement initialiseren op basis van de link
                $statement = mysqli_stmt_init($link);

                //4b: prepared statement maken op basis van de query en het statement
                if (mysqli_stmt_prepare($statement,$query))
                {
                    //4c: parameter een waarde geven (= vraagteken vervangen)
                    mysqli_stmt_bind_param($statement,'i', $gebruikerid);

                    $gebruikerid = $row['gebruikerid'];


                    //5a: statement uitvoeren

                    if (mysqli_stmt_execute($statement))
                    {
                        echo 'Gebruiker is verwijderd';
                    }
                    else{
                        echo 'delete niet gelukt'.mysqli_stmt_error($statement);
                    }

                }
                else
                {
                    echo mysqli_stmt_error($statement);
                }

                //6: verbining sluiten
                mysqli_close($link);
            }

        }
        //6: verbining sluiten
        mysqli_close($link);
    }
    else
{
    echo '<br> verbining niet gelukt '.mysqli_connect_error();
}



*/


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
    if (isset($_POST['gebruikerid'])) {
        // Voorbereiden en uitvoeren van de verwijderingsquery
        $query = "DELETE FROM db_ehbo.gebruikers WHERE gebruikerid = ?";
        $statement = mysqli_prepare($link, $query);
        mysqli_stmt_bind_param($statement, 'i', $_POST['gebruikerid']);
        if (mysqli_stmt_execute($statement)) {
            // Als verwijdering succesvol is, geef dan een succesbericht weer
            echo 'Gebruiker is verwijderd';
        } else {
            // Als er een fout optreedt, geef dan een foutmelding weer
            echo 'Verwijderen is mislukt: ' . mysqli_stmt_error($statement);
        }
    } else {
        // Gebruikerid niet ingesteld, geef een foutmelding weer
        echo 'Gebruikerid niet ontvangen';
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
        echo '<td><input type="submit" value="Verwijderen" name="btnVerwijder">';
        echo '<input type="hidden" name="gebruikerid" value="' . $row['gebruikerid'] . '"></td>';
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

