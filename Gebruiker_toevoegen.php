<html>
<body>
<form method="post">

        <h1>Gebruiker toevoegen</h1>

        <label for="Voornaam"></label>
        <input type="text" name="Voornaam" placeholder="Voornaam" id="Voornaam" ><!-- input textbox voor de email -->

        <label for="Achternaam"></label>
        <input type="text" name="Achternaam" placeholder="Achternaam" id="Achternaam" ><!-- input textbox voor het wachtwoord -->

        <label for="Mail"></label>
        <input type="text" name="Mail" placeholder="Mail" id="Mail" ><!-- input textbox voor het wachtwoord -->

        <label for="Rol"></label>
        <select name="Rol" ><!-- input textbox voor het wachtwoord -->
            <option value="gebruiker">gebruiker</option>
            <option value="beheerder">beheerder</option>
        </select>

        <input type="submit" value="Toevoegen" Name="cmdSend">

    <input type="submit" value="Terugkeren" name="btnTerug">
    <p>Het standaard wachtwoord is Test123</p>

</form>
</body>
</html>


<?php

if(isset($_POST["btnTerug"]))
{
    session_abort();
    header("Location: Home_Beheerder.php");
}

if(isset($_POST['cmdSend']))
{
    //1: verbinding maken met de database
    include ('Verbinding.php');

//2: als de verbinding gelukt is
    if($link)
    {
        $BasisWW = "Test123";
        //3: opbouw van de query
        //query met een parameters
        $query = 'INSERT INTO `db_ehbo`.`gebruikers` (`voornaam`, `achternaam`, `wachtwoord`, `mail`, `rol`) VALUES (?, ?, ?, ?, ?);
';
        //echo $query.'<br>';

        //4a: statement initialiseren op basis van de link
        $statement = mysqli_stmt_init($link);

        //4b: prepared statement maken op basis van de query en het statement
        if (mysqli_stmt_prepare($statement,$query))
        {
            //4c: parameter een waarde geven (= vraagteken vervangen)
            mysqli_stmt_bind_param($statement,'sssss', $Voornaam, $Achternaam, $Wachtwoord, $Mail, $Rol);
            $Voornaam = $_POST['Voornaam'];
            $Achternaam = $_POST['Achternaam'];
            $Wachtwoord = password_hash($BasisWW, PASSWORD_DEFAULT);
            $Mail = $_POST['Mail'];
            $Rol = $_POST['Rol'];

            //5a: statement uitvoeren

            if (mysqli_stmt_execute($statement))
            {
                echo 'Gebruiker toegevoegd';
            }
            else{
                echo 'insert niet gelukt'.mysqli_stmt_error($statement);
            }

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

}


?>

