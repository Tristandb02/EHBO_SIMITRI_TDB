<html>
<form method="post">
<h1>Welkom beheerder</h1>
<input type="submit" value="Ga naar klassen overzicht" name="btnGaKlassen">
</form>
</html>
<?php
if(isset($_POST["btnGaKlassen"]))
{
    header("location: overzichtKlas.php");
}

?>