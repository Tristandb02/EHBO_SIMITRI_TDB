<!--
Author: Tristan De Ben
-->
<?php



$Paswoord = "Test123";

$WWhash = password_hash($Paswoord, PASSWORD_DEFAULT);

echo $WWhash;
?>