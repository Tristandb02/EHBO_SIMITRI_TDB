//Encryptie van het wachtwoord voor in de database

<?php
$Paswoord = "test123";

$WWhash = password_hash($Paswoord, PASSWORD_DEFAULT);

echo $WWhash;
?>