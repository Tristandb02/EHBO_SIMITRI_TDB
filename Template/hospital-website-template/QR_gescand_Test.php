
<?php

session_start();
if(($_SESSION["Rol"]=="beheerder")or($_SESSION["Rol"]=="gebruiker"))//Dit betekent dat er al een sessie is dus dat de persoon niet moet inloggen
{
    header("Location: OverzichtKlas.php");
}

else
{
    header("Location: index.php");
}



/*
 * <?php
session_start();
if(($_COOKIE["Rol"]=="beheerder")or($_COOKIE["Rol"]=="gebruiker"))//Dit betekent dat er al een sessie is dus dat de persoon niet moet inloggen
{
    setcookie("Rol",$_COOKIE["Rol"],time()+300, "/");
    header("Location: OverzichtKlas.php");
}

else
{
    header("Location: index.php");
}
 *
 */