<!--
Author: Simon Marchand, Milan Van Wonterghem, Tristan De Ben
-->
<html>
<body>
<form method="post">
    <label>Naam Item: </label>
    <input type="Text" name="Naam"/>
    <input type="submit" value="Toevoegen" name="cmdVerstuur"/>
</form>
<form method="post" action="OverzichtDoos.php">
    <input type="submit" value="Terugkeren" name="cmdTerug"/>
    <br/>
</form>
</body>


</html>


<?php
session_start();
/*include('Verbinding.php');
if($link) {


    $query2 = "SELECT COLUMN_NAME 
              FROM INFORMATION_SCHEMA.COLUMNS 
              WHERE TABLE_SCHEMA = 'db_ehbo' 
              AND TABLE_NAME = 'dozen'";


    $statement = mysqli_stmt_init($link);

    if (mysqli_stmt_prepare($statement, $query2)) {
        mysqli_stmt_execute($statement);
        if (mysqli_stmt_execute($statement)) {

            $Result = mysqli_stmt_get_result($statement);

            echo '<label>Kies een bestaande categorie:</label>';
            echo '<select name="BestaandeCategorie" id="BestaandeCategorie">';
            while ($row = mysqli_fetch_assoc($Result)) {

                echo "<option value='" . $row['COLUMN_NAME'] . "'>" . $row['COLUMN_NAME'] . "</option>";
            }
            echo '</select>';
        }
    }
}*/
include('Verbinding.php');

if($link) {
    $query2 = "SELECT COLUMN_NAME 
              FROM INFORMATION_SCHEMA.COLUMNS 
              WHERE TABLE_SCHEMA = 'db_ehbo' 
              AND TABLE_NAME = 'dozen'";

    $statement = mysqli_stmt_init($link);

    if (mysqli_stmt_prepare($statement, $query2)) {
        mysqli_stmt_execute($statement);
        $Result = mysqli_stmt_get_result($statement);

        echo '<form method="post" action="OverzichtDoos.php">';
        echo '<label>Kies een bestaande categorie:</label>';
        echo '<select name="BestaandeCategorie" id="BestaandeCategorie">';
        $skipCounter = 0;
        while ($row = mysqli_fetch_assoc($Result)) {
            if ($skipCounter >= 7) {
                // Skip the first two rows

                echo "<option value='" . $row['COLUMN_NAME'] . "'>" . $row['COLUMN_NAME'] . "</option>";
            }
            else
            {
                $skipCounter++;
            }

        }
        echo '</select>';
        echo '<input type="submit" value="Voeg toe" name="cmdVoegToe"/>';
        echo '</form>';
    }
    if(isset($_POST['cmdVoegToe']))
    {
        $query = "UPDATE `db_ehbo`.`dozen` SET `?` = 'Aanwezig' WHERE (`doosid` = '?')";

        //4b: prepared statement maken op basis van de query en het statement
        if (mysqli_stmt_prepare($statement, $query)) {
            //4c: parameter een waarde geven (= vraagteken vervangen)
            mysqli_stmt_bind_param($statement, 'si',  $_POST['BestaandeCategorie'], $Id );

            $Id = $_SESSION["DoosID"];
            mysqli_stmt_execute($statement);





        }

        else
        {
            echo mysqli_stmt_error($statement);
        }
    }
}








if(isset($_POST['cmdVerstuur'])) {


//1: verbinding maken met de database


//2: als de verbinding gelukt is
    if ($link) {
        //3: opbouw van de query
        //query met een parameters
        $Item = $_POST['Naam'];
        $query = 'ALTER TABLE db_ehbo.dozen ADD COLUMN '.$Item.' VARCHAR(255)';
        $query1= 'update db_ehbo.dozen  set '.$Item." = 'Aanwezig' WHERE (`doosid` = ?)";


        //4a: statement initialiseren op basis van de link
        $statement = mysqli_stmt_init($link);
        if (mysqli_stmt_prepare($statement, $query))
        {
            if (mysqli_stmt_execute($statement))
            {
                echo 'kolom toegoevoegd ';
                //echo '<form action="OverzichtDoos.php">';


            }
            else{
                echo 'kolom niet toegevoegd'.mysqli_stmt_error($statement);
            }
        }

        //4b: prepared statement maken op basis van de query en het statement
        if (mysqli_stmt_prepare($statement, $query1)) {
            //4c: parameter een waarde geven (= vraagteken vervangen)
            mysqli_stmt_bind_param($statement, 'i', $Id);

            $Id = $_SESSION["DoosID"];
            mysqli_stmt_execute($statement);





        }

        else
        {
            echo mysqli_stmt_error($statement);
        }


        //6: verbining sluiten
        mysqli_close($link);
    } else {
        echo '<br> verbining niet gelukt ' . mysqli_connect_error();
    }

}

?>
