<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gebruiker toevoegen</title>
    <style>

        body {

            font-family: Arial, sans-serif;
            margin: 0 auto;

        }
        h2 {
            text-align: center;
        }
        form {
            margin: 0 auto;
            max-width: 500px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"],
        select {
            width: 40%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-left: 30%;

        }
        input[type="submit"] {
            width: 40%;
            padding: 10px;
            margin-top: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-left: 30%;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        p {
            margin-top: 20px;
            text-align: center;
        }
    </style>

    <meta charset="utf-8">
    <title>EHBO</title>
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
    <div class="container-fluid sticky-top bg-white shadow-sm mb-5">
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
                        session_start();
                        if ($_SESSION['Rol'] == 'beheerder'){
                            echo '<a href="Home_Beheerder.php" class="nav-item nav-link active">Home</a>';
                        }
                        else {
                            echo '<a href="Home_Gebruiker.php" class="nav-item nav-link active">Home</a>';
                        }

                        ?>

                        <a href="OverzichtKlas.php" class="nav-item nav-link">Klassen overzicht</a>

                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pagina's</a>
                            <div class="dropdown-menu m-0">

                                <?php
                                session_start();
                                if ($_SESSION['Rol'] == 'beheerder'){

                                    echo'<a href="Gebruiker_toevoegen.php" class="dropdown-item">Gebruiker aanmaken</a>';
                                    echo'<a href="logboek.php" class="dropdown-item">Logboek</a>';
                                    echo'<a href="Gebruikers.php" class="dropdown-item">Lijst gebruiker</a>';
                                    echo '<a href="OverzichtOntbreek.php" class="dropdown-item">Ontbrekende Items</a>';
                                }
                                echo '<a href="Wachtwoord_Aanpassen.php" class="dropdown-item">Wachtwoord Aanpassen</a>';
                                echo'<a href="index.php" class="dropdown-item">Afmelden</a>';
                                ?>
                            </div>
                        </div>


                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->


    <!-- Testimonial Start -->
    <!--<div class="container-fluid py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5" style="max-width: 500px;">
                <h5 class="d-inline-block text-primary text-uppercase border-bottom border-5">Testimonial</h5>
                <h1 class="display-4">Patients Say About Our Services</h1>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="owl-carousel testimonial-carousel">
                        <div class="testimonial-item text-center">
                            <div class="position-relative mb-5">
                                <img class="img-fluid rounded-circle mx-auto" src="img/testimonial-1.jpg" alt="">
                                <div class="position-absolute top-100 start-50 translate-middle d-flex align-items-center justify-content-center bg-white rounded-circle" style="width: 60px; height: 60px;">
                                    <i class="fa fa-quote-left fa-2x text-primary"></i>
                                </div>
                            </div>
                            <p class="fs-4 fw-normal">Dolores sed duo clita tempor justo dolor et stet lorem kasd labore dolore lorem ipsum. At lorem lorem magna ut et, nonumy et labore et tempor diam tempor erat. Erat dolor rebum sit ipsum.</p>
                            <hr class="w-25 mx-auto">
                            <h3>Patient Name</h3>
                            <h6 class="fw-normal text-primary mb-3">Profession</h6>
                        </div>
                        <div class="testimonial-item text-center">
                            <div class="position-relative mb-5">
                                <img class="img-fluid rounded-circle mx-auto" src="img/testimonial-2.jpg" alt="">
                                <div class="position-absolute top-100 start-50 translate-middle d-flex align-items-center justify-content-center bg-white rounded-circle" style="width: 60px; height: 60px;">
                                    <i class="fa fa-quote-left fa-2x text-primary"></i>
                                </div>
                            </div>
                            <p class="fs-4 fw-normal">Dolores sed duo clita tempor justo dolor et stet lorem kasd labore dolore lorem ipsum. At lorem lorem magna ut et, nonumy et labore et tempor diam tempor erat. Erat dolor rebum sit ipsum.</p>
                            <hr class="w-25 mx-auto">
                            <h3>Patient Name</h3>
                            <h6 class="fw-normal text-primary mb-3">Profession</h6>
                        </div>
                        <div class="testimonial-item text-center">
                            <div class="position-relative mb-5">
                                <img class="img-fluid rounded-circle mx-auto" src="img/testimonial-3.jpg" alt="">
                                <div class="position-absolute top-100 start-50 translate-middle d-flex align-items-center justify-content-center bg-white rounded-circle" style="width: 60px; height: 60px;">
                                    <i class="fa fa-quote-left fa-2x text-primary"></i>
                                </div>
                            </div>
                            <p class="fs-4 fw-normal"></p>
                            <hr class="w-25 mx-auto">
                            <h3>Patient Name</h3>
                            <h6 class="fw-normal text-primary mb-3">Profession</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>-->
    <?php
include 'Verbinding.php';
$query = "SELECT COLUMN_NAME 
          FROM INFORMATION_SCHEMA.COLUMNS 
          WHERE TABLE_SCHEMA = 'gtiictbeokcommon' 
          AND TABLE_NAME = 'EHBO_dozen'
          LIMIT 2, 999"; // Skip de eerste 2 kolommen

$stmt = mysqli_stmt_init($link);
$columnNames = array(); // Declareer de array columnNames

if (mysqli_stmt_prepare($stmt, $query)) {
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);

    echo "<table border='1'>"; //tabel aanmaken
    echo "<tr>";
    echo "<html>
<form method='post'>
<div class='select-container' >
    <select name='Item' >";
    while ($row = mysqli_fetch_assoc($res)) {

        echo "<option value='" . $row['COLUMN_NAME'] . "'>" . $row['COLUMN_NAME'] . "</option>";
    }
    echo "</select></div>";
}

echo "<br><input type='submit' name='btnZoek' value='Laat zien'><br><input type='submit' name='btnTerug' value='Ga terug'><br>";
echo "<input type='submit' name='btnSend' value='Verstuur op mail'>";



$LokalenOntbreek="";
$intLokalenOntbreek=0;


if(isset($_POST["Item"]))
{
    if($_POST["Item"]!="handschoenen") //Handschoenen zijn met waardes niet met aan of afwezig
    {
        if(mysqli_stmt_prepare($stmt,"select lokaal from EHBO_dozen where ".$_POST["Item"]." = 'Niet Aanwezig'")) //De lokalen van het item ophalen waar het niet aanwezig is
        {
            mysqli_stmt_execute($stmt);
            $res = mysqli_stmt_get_result($stmt);
            while ($row=mysqli_fetch_assoc($res))
            {
                $intLokalenOntbreek++;
                $LokalenOntbreek.=$row["lokaal"].", ";

            }

            $LokalenOntbreek = substr($LokalenOntbreek, 0, -2);
            if ($intLokalenOntbreek != 0)
            {
                $Ontbreek = "Er ontbreken ".$intLokalenOntbreek." ".$_POST["Item"]."  in de volgende lokalen: ".$LokalenOntbreek;
                $_SESSION['Ontbrekend'] = $Ontbreek;
                echo "$Ontbreek";

            }
            else //Als er geen items ontbreken schrijven we dit naar het scherm
            {
                echo "Er ontbreken geen ".$_POST["Item"];

            }

        }

    }
    else {
        if (mysqli_stmt_prepare($stmt, "select lokaal from EHBO_dozen where " . $_POST["Item"] . " = 1")) {
            mysqli_stmt_execute($stmt);
            $res = mysqli_stmt_get_result($stmt);
            while ($row = mysqli_fetch_assoc($res)) {
                $intLokalenOntbreek++;
                $LokalenOntbreek .= $row["lokaal"] . ", ";

            }

            $LokalenOntbreek = substr($LokalenOntbreek, 0, -2);
            if ($intLokalenOntbreek != 0) {
                $Ontbreek = "Er zijn  " . $intLokalenOntbreek . " lokalen waar er maar 1 paar " . $_POST["Item"] . "  ligt, en dat is in de volgende lokalen: " . $LokalenOntbreek;
                $_SESSION['Ontbrekend'] = $Ontbreek;
                echo "$Ontbreek";

            } else {
                echo "Er ontbreken geen " . $_POST["Item"];

            }

        }
    }

}

if(isset($_POST["btnTerug"]))
{
    header("Location: Home_Beheerder.php");
}

// ------------------------------------------------Mail versturen-------------------------------------------------------------------
    if(isset($_POST['btnSend'])){
        $query = "SELECT COLUMN_NAME 
          FROM INFORMATION_SCHEMA.COLUMNS 
          WHERE TABLE_SCHEMA = 'gtiictbeokcommon' 
          AND TABLE_NAME = 'EHBO_dozen'
          LIMIT 2, 999";

        if (mysqli_stmt_prepare($stmt, $query)) {
            mysqli_stmt_execute($stmt);
            $res = mysqli_stmt_get_result($stmt);

            while ($row = mysqli_fetch_assoc($res)) {
                $intLokalenOntbreek = 0;
                $LokalenOntbreek = "";


                if($row['COLUMN_NAME']!="handschoenen")
                {
                    if(mysqli_stmt_prepare($stmt,"select lokaal from EHBO_dozen where ".$row['COLUMN_NAME']." = 'Niet Aanwezig'"))
                    {
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);
                        while ($Row=mysqli_fetch_assoc($result))
                        {
                            $intLokalenOntbreek++;
                            $LokalenOntbreek.=$Row["lokaal"].", ";

                        }

                        $LokalenOntbreek = substr($LokalenOntbreek, 0, -2);
                        if ($intLokalenOntbreek != 0)
                        {
                            if ($intLokalenOntbreek > 1)
                            {
                                $Ontbreek = "Er ontbreken ".$intLokalenOntbreek." ";
                                switch ($row["COLUMN_NAME"])
                                {
                                    case "schaar":
                                        $Ontbreek .= "scharen in de volgende lokalen: ".$LokalenOntbreek;
                                        break;
                                    case "ontsmettingsmiddel":
                                        $Ontbreek .= "ontsmettingsmiddelen in de volgende lokalen: ".$LokalenOntbreek;
                                        break;
                                    default:
                                        $Ontbreek .= $row["COLUMN_NAME"]."in de volgende lokalen: ".$LokalenOntbreek;
                                        break;
                                }

                            } else
                            {
                                $Ontbreek = "Er ontbreekt ".$intLokalenOntbreek." ";
                                switch ($row["COLUMN_NAME"])
                                {
                                    case "pleisters":
                                        $Ontbreek .= "pleister in de het volgende lokaal: ".$LokalenOntbreek;
                                        break;
                                    case "documenten":
                                        $Ontbreek .= "document in het volgende lokaal: ".$LokalenOntbreek;
                                        break;
                                    default:
                                        $Ontbreek .= $row["COLUMN_NAME"]."in het volgende lokaal: ".$LokalenOntbreek;
                                        break;
                                }
                            }
                            $_SESSION['Ontbrekend'] = $Ontbreek;
                            echo "$Ontbreek";
                            $Message .= $Ontbreek."<br><br>";
                            $intLokalenOntbreek = 0;
                            $LokalenOntbreek = "";
                        }
                        else
                        {
                            echo "Er ontbreken geen ".$row['COLUMN_NAME'];
                            $Message .= "Er ontbreken geen ". $row['COLUMN_NAME'];
                        }

                    }

                }
                else {
                    if (mysqli_stmt_prepare($stmt, "select lokaal from EHBO_dozen where " . $row['COLUMN_NAME'] . " = 1")) {
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);
                        while ($Row = mysqli_fetch_assoc($result)) {
                            $intLokalenOntbreek++;
                            $LokalenOntbreek .= $Row["lokaal"] . ", ";

                        }

                        $LokalenOntbreek = substr($LokalenOntbreek, 0, -2);
                        if ($intLokalenOntbreek != 0) {
                            $Ontbreek = "Er zijn  " . $intLokalenOntbreek . " lokalen waar er maar 1 paar " . $row['COLUMN_NAME'] . "  ligt, en dat is in de volgende lokalen: " . $LokalenOntbreek;
                            $_SESSION['Ontbrekend'] = $Ontbreek;
                            echo "$Ontbreek";
                            $Message .= $Ontbreek."<br><br>";
                            $intLokalenOntbreek = 0;
                            $LokalenOntbreek = "";
                        } else {
                            echo "Er ontbreken geen " . $row['COLUMN_NAME'];
                            $Message .= "Er ontbreken geen ".$row['COLUMN_NAME'];
                        }

                    }
                }

            }
        }


        $to = $_SESSION['Mail']; //ontvanger
        $from = 'EHBO.gtibeveren.be'; //Verzender
        $fromName = 'GTI - EHBO'; //Naam verzender

        $subject = "Ontbrekende in EHBO doosjes";
        //Bericht
        $htmlContent = "
    <html> 
    <head> 
        <title>Ontbreken EHBO doosjes</title> 
    </head> 
    <body> 
        <p>Ontbrekingen:<br>$Message</p>
    </body>
    </html>";

        // Header voor de mail
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        $headers .= 'From: ' . $fromName . '<' . $from . '>' . "\r\n";

        // Verstuur mail
        if (mail($to, $subject, $htmlContent, $headers)) {
            echo 'ok';
        } else {
            echo 'Email sending failed.';
        }
    }


    if(isset($_POST["btnTerug"]))
    {
        header("Location: Home_Beheerder.php");
    }



    ?>

    <!-- Testimonial End -->


    <!-- Footer Start -->

    <!-- Footer End -->


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