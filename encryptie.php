//Encryptie van het wachtwoord voor in de database

<?php
$Paswoord = "x";

$WWhash = password_hash($Paswoord, PASSWORD_DEFAULT);

echo $WWhash;
?>