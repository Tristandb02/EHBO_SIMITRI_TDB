<!--
Author: Tristan De Ben
-->
<?php



$Paswoord = "x";

$WWhash = password_hash($Paswoord, PASSWORD_DEFAULT);

echo $WWhash;
?>