//Encryptie van het wachtwoord voor in de database

<?php
$Paswoord = "test2";

$WWhash = password_hash($Paswoord, PASSWORD_DEFAULT);

echo $WWhash;
?>