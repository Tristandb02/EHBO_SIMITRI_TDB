<?php
session_start();

$con = mysqli_connect("localhost", "root", "", "db_materiaal");//connectie naar db
if ( mysqli_connect_errno() ) {//als er een error is displayen we deze
    exit('Verbinding met de databank is mislukt: ' . mysqli_connect_error());
}
if ( !isset($_POST['username'], $_POST['password']) ) {//als 1 van de velden 'username' en 'password' niet ingevuld is dan geven we een foutmelding.
    // Could not get the data that should have been sent.
    exit('vul aub je gebruikersnaam en je wachtwoord in!');
}
// Prepare our SQL, preparing the SQL statement will prevent SQL injection.
if ($stmt = $con->prepare('SELECT iduser, wachtwoord, voornaam,familienaam, klas FROM db_materiaal.users WHERE mail = ?')) {//we maken een statement klaar om alle info van de gebruiker op te vragen.

    $stmt->bind_param('s', $_POST['username']);//hier geven we de email die is ingegeven mee in de query
    $stmt->execute();//execute de query
    // Store the result so we can check if the account exists in the database.
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $password, $naam, $familienaam, $klas);//hier stek we al de uitgelezn waarde in variablen
        $stmt->fetch();//fetch

        if (password_verify($_POST['password'], $password)) {//het geincrypteerd wachtwoord vannuit de databank verifieren adhv het ingegeven wachtwoord.
            $_SESSION['loggedin'] = TRUE;//
            $_SESSION['name'] = $naam . " " . $familienaam;
            $_SESSION['id'] = $id;


            if ($stmt = $con->prepare('SELECT naam from klassen where idklas = ?')) {//is onze user tabel in de databank is de klas een nummer (1, 2, 3, ...) dus we gaan dit nummer omzetten naar een klas met deze queryy
                $stmt->bind_param('i', $klas);
                $stmt->execute();
                $stmt->bind_result($klasNaam);
                $stmt->fetch();


            }


            $_SESSION['klas'] = $klasNaam;
            include 'Onderscheid_LL_LK.php';
        } else {
            // Incorrect password
            echo 'foute gebruikersnaam en/of wachtwoord!';
        }
    } else {
        // Incorrect username
        echo 'Incorrect username and/or password!!';
    }
}

$stmt->close();//sluit de connectie af
?>