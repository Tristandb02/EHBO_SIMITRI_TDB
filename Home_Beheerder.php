<html>
<form method="post">
<h1>Welkom beheerder</h1>
<input type="submit" value="Ga naar klassen overzicht" name="btnGaKlassen">
<input type="submit" value="Wachtwoord aanpassen" name="btnWW">
<input type="submit" value="Gebruiker aanmaken" name="btnAccount">
<input type="submit" value="Lijst gebruiker" name="btnLijst">
</form>
</html>
<?php
if(isset($_POST["btnAccount"]))
{
    header("location: Gebruiker_toevoegen.php");
}
if(isset($_POST["btnWW"]))
{
    header("location: Wachtwoord_Aanpassen.php");
}
if(isset($_POST["btnGaKlassen"]))
{
    header("location: overzichtKlas.php");
}
if(isset($_POST["btnLijst"]))
{
    header("location: Gebruikers.php");
}

?>