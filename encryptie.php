//Encryptie van het wachtwoord voor in de database

<?php
$Paswoord = "Test123";

$WWhash = password_hash($Paswoord, PASSWORD_DEFAULT);

echo $WWhash;
?>