<!--
Author: Simon Marchand
-->
<html>
<body>
<form method="post">
    <label>Naam Item: </label>
    <input type="Text" name="Naam"/>
    <input type="submit" value="Toevoegen" name="cmdVerstuur"/>
</form>
<form ethod="post" action="OverzichtDoos.php">
    <input type="submit" value="Terugkeren" name="cmdTerug"/>
</form>
</body>

</html>



<?php

if(isset($_POST['cmdVerstuur'])) {


//1: verbinding maken met de database
    include('Verbinding.php');

//2: als de verbinding gelukt is
    if ($link) {
        //3: opbouw van de query
        //query met een parameters
        $Item = $_POST['Naam'];
        $query = 'ALTER TABLE db_ehbo.dozen ADD COLUMN '.$Item.' VARCHAR(255)';
        $query1= 'update db_ehbo.dozen  set '.$Item.' = Aanwezig WHERE (`doosid` = ?)';


        //4a: statement initialiseren op basis van de link
        $statement = mysqli_stmt_init($link);

        //4b: prepared statement maken op basis van de query en het statement
        if (mysqli_stmt_prepare($statement, $query)) {
            //4c: parameter een waarde geven (= vraagteken vervangen)
            mysqli_stmt_bind_param($statement, 'i', $Id);
            $Item = $_POST['Naam'];
            $Id = $_SESSION["DoosID"];



            if (mysqli_stmt_execute($statement))
            {
                echo 'kolom toegoevoegd ';
                //echo '<form action="OverzichtDoos.php">';


            }
            else{
                echo 'kolom niet toegevoegd'.mysqli_stmt_error($statement);
            }

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
