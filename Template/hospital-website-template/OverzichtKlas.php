<?php
session_start(); // Start de sessie
ob_start(); // Start output buffering

// Behandel formulier indien verstuurd
if (isset($_POST["klaslink"])) { // Controleer of een knop is ingedrukt
    $_SESSION["klas"] = $_POST["klaslink"]; // Sla de waarde van de knop op in de sessie
    header("Location: OverzichtDoos.php"); // Stuur de gebruiker naar OverzichtDoos.php
    exit(); // Stop verdere uitvoering van de code
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>MEDINOVA - Hospital Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700&family=Roboto:wght@400;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
<!-- Navbar Start -->
<div class="container-fluid sticky-top bg-white shadow-sm">
    <div class="container">
        <nav class="navbar navbar-expand-lg bg-white navbar-light py-3 py-lg-0">
            <a href="https://www.beveren.be/nl/scholen/gti-beveren"  class="navbar-brand">
                <h1 class="m-0 text-uppercase text-primary">EHBO</h1>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <?php
                    session_start(); // Start de sessie
                    if ($_SESSION['Rol'] == 'beheerder'){ // Controleer of de gebruiker een beheerder is
                        echo '<a href="Home_Beheerder.php" class="nav-item nav-link">Home</a>'; // Toon de beheerder homepagina
                    }
                    else {
                        echo '<a href="Home_Gebruiker.php" class="nav-item nav-link">Home</a>'; // Toon de gebruiker homepagina
                    }
                    ?>
                    <a href="OverzichtKlas.php" class="nav-item nav-link active">Klassen overzicht</a> <!-- Link naar het klassenoverzicht -->
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pagina's</a> <!-- Dropdown voor profielopties -->
                        <div class="dropdown-menu m-0">
                            <?php
                            session_start(); // Start de sessie
                            if ($_SESSION['Rol'] == 'beheerder'){ // Controleer of de gebruiker een beheerder is
                                echo '<a href="Gebruiker_toevoegen.php" class="dropdown-item">Gebruiker aanmaken</a>'; // Link om gebruiker toe te voegen
                                echo '<a href="logboek.php" class="dropdown-item">Logboek</a>'; // Link naar logboek
                                echo '<a href="Gebruikers.php" class="dropdown-item">Lijst gebruiker</a>'; // Link naar gebruikerslijst
                                echo '<a href="OverzichtOntbreek.php" class="dropdown-item">Ontbrekende Items</a>'; // Link naar ontbrekende items overzicht
                            }
                            echo '<a href="Wachtwoord_Aanpassen.php" class="dropdown-item">Wachtwoord Aanpassen</a>'; // Link om wachtwoord aan te passen
                            echo '<a href="index.php" class="dropdown-item">Afmelden</a>'; // Link om af te melden
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</div>

<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>

<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="lib/easing/easing.min.js"></script>
<script src="lib/waypoints/waypoints.min.js"></script>
<script src="lib/owlcarousel/owl.carousel.min.js"></script>
<script src="lib/tempusdominus/js/moment.min.js"></script>
<script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
<script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

<!-- Template Javascript -->
<script src="js/main.js"></script>
</body>

</html>
<?php
echo "<form method='post'><table style='width: 40%; height: 40%' border='1'>"; // Begin van het formulier
echo "<style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            font-size: 18px;
            text-align: left;
        }
        th, td {
            padding: 12px;
            border: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
            color: black;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        input[type=radio], input[type=number] {
            margin-top: 5px;
        }
    </style>"; // CSS-stijlen voor de tabel
for($i=1; $i<=3; $i++) { // Loop om rijen te genereren (Verdiep 1,2,3)
    echo "<tr>";
    for($i2=8; $i2<=23; $i2++) { // Loop om kolommen te genereren (lokalen 8->23)
        $klas = "K$i"; // Bouw de klasnaam
        if($i2 < 10) {
            $klas .= "0"; // Voeg een 0 toe voor enkelcijferige getallen
        }
        $klas .= $i2; // Voeg het getal toe aan de klasnaam
        echo "<td><input type='submit' name='klaslink' value=$klas></td>"; // Maak een submit-knop met de klasnaam
    }
    echo "</tr>";
}
echo "</form>"; // Einde van het formulier
?>
