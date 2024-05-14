
<?php

session_start();
if(($_SESSION["Rol"]=="beheerder")or($_SESSION["Rol"]=="gebruiker"))//Dit betekent dat er al een sessie is dus dat de persoon niet moet opnieuw inloggen
{
    header("Location: OverzichtKlas.php");
}

else
{
    header("Location: index.php");
}



