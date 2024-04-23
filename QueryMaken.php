<!--
Author: Milan Van Wonterghem
-->
<?php
for($i=1; $i<=3; $i++) {
    echo "<tr>";
    for($i2=8; $i2<=23; $i2++) {
        $klas = "K$i";
        if($i2 < 10) {
            $klas .= "0";
        }
        $klas .= $i2;
        echo "INSERT INTO `db_ehbo`.`dozen` (`lokaal`, `pleisters`, `schaar`, `ontsmettingsmiddel`, `handschoenen`, `documenten`) VALUES ("."'$klas' ".", 'Niet aanwezig', 'Aanwezig', 'Aanwezig', '1', 'Aanwezig');<br>";
    }
    echo "</tr>";
}