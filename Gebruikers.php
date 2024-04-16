<html>
<form method="post">

<input type="submit" value="Terugkeren" name="btnTerug">

</form>
</body>
</html>

<?php

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
        $query = 'select voornaam, achternaam, mail, rol from db_ehbo.gebruikers order by achternaam ASC';


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
            echo '<tr><th>Achternaam</th><th>Voornaam</th><th>Mail</th><th>Rol</th></tr>';
            while ($row = mysqli_fetch_assoc($resultaat) )
            {
                //5d: toon rij per rij
                echo '<tr>';
                echo "<td> {$row['achternaam']}</td>";
                echo "<td> {$row['voornaam']} </td>";
                echo "<td> {$row['mail']} </td>";
                echo "<td> {$row['rol']} </td>";
                echo '</tr>';
            }
            echo '</table>';

        }
        else
        {
            echo mysqli_stmt_error($statement);
        }

        //6: verbining sluiten
        mysqli_close($link);
    }
    else
{
    echo '<br> verbining niet gelukt '.mysqli_connect_error();
}



    ?>

