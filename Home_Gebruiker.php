<html>
<form method="post">
    <h1>Welkom gebruiker</h1>
    <input type="submit" value="Ga naar klassen overzicht" name="btnGaKlassen">
    <input type="submit" value="Wachtwoord aanpassen" name="btnWW">
    <input type="submit" value="Afmelden" name="btnAfmelden">
</form>
</html>
<?php
session_start();
if(isset($_POST["btnGaKlassen"]))
{
    header("location: overzichtKlas.php");
}
if(isset($_POST["btnAfmelden"]))
{
    session_abort();
    header("Location: index.php");
}
if(isset($_POST["btnWW"]))
{
    header("location: Wachtwoord_Aanpassen.php");
}

?>