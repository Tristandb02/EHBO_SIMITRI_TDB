<html>
<form method="post">
<h1>Welkom beheerder</h1>
<input type="submit" value="Ga naar klassen overzicht" name="btnGaKlassen">
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
?>