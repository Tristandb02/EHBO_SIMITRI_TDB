<?php
session_start();
if(($_SESSION["rol"]=="beheerder")or($_SESSION["rol"]=="gebruiker"))//Dit betekent dat er al een sessie is dus dat de persoon niet moet inloggen
{
    header("Location: service.php");
}

else
{
    header("Location: index.php");
}

