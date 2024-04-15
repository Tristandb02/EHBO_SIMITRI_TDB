<html>
<form method="post">
<h1>Welkom beheerder</h1>
<input type="submit" value="Ga naar klassen overzicht" name="btnGaKlassen">
<input type="submit" value="Maak account aan" name="btnAccount">
</form>
</html>
<?php
if(isset($_POST["btnGaKlassen"]))
{
    header("location: overzichtKlas.php");
}
if(isset($_POST["btnAccount"]))
{
    header("location: Gebruiker_toevoegen.php");
}

?>