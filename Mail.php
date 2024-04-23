<!--
Author: Tristan De Ben
-->
<?php
session_start();
echo "<html>
<form method='post'>";
echo "<input type='submit' name='btnMail' value='Verstuur mail'>";
if(isset($_POST['btnMail'])) {
    $Email = $_SESSION['Mail'];
    $Onderwerp = "Afwezige items";
    $Bericht = $_SESSION['Ontbrekend'];

    mail($Email, $Onderwerp, $Bericht);
}

?>
