<!--
Authors: Milan Van Wonterghem, Simon Marchand, Tristan De Ben
-->
<html>
<form method="post">
<h1>Welkom beheerder</h1>
<input type="submit" value="Ga naar klassen overzicht" name="btnGaKlassen">
<input type="submit" value="Wachtwoord aanpassen" name="btnWW">
<input type="submit" value="Gebruiker aanmaken" name="btnAccount">
    <input type="submit" value="Ga naar logboek" name="GoLogboek">
<input type="submit" value="Lijst gebruiker" name="btnLijst">
    <input type="submit" value="Wat ontbreekt er allemaal?" name="btnPagontbreek">
    <input type="submit" value="Afmelden" name="btnAfmelden">
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
if(isset($_POST["GoLogboek"]))
{
    header("Location: logboek.php");
}
if(isset($_POST["btnPagontbreek"]))
{
    header("location: OverzichtOnbreek.php");
}
if(isset($_POST["btnAfmelden"]))
{
    session_abort();
    header("Location: index.php");
}
?>