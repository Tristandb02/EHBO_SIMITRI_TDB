<?php
include "Verbinding.php";
session_start();
echo"<h1>EHBO-doos van lokaal ".$_SESSION["klas"]. "</h1>";
$query='SELECT * FROM db_ehbo.dozen where lokaal = ?';
$stmt=mysqli_stmt_init($link);
if(mysqli_stmt_prepare($stmt,$query))
{
    mysqli_stmt_bind_param($stmt,'s',$_SESSION["klas"]);
    mysqli_stmt_execute($stmt);
    $res=mysqli_stmt_get_result($stmt);
    echo"<table>";
    while($rij=mysqli_fetch_row($res))
    {
        echo "<td>".$rij[2];


    }

}

