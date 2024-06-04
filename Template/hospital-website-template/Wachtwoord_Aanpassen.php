<?php
session_start();
ob_start(); // Start output buffering at the very beginning

error_reporting(E_ALL); // Report all PHP errors
ini_set('display_errors', 1); // Display all PHP errors

$mail = $_SESSION["Mail"];

if(isset($_POST['cmdSend']) && isset($_POST['OudWW']) && isset($_POST['NieuwWW']) && isset($_POST['HerhaalWW'])) {
    // Verbinding maken met de database
    include('Verbinding.php');

    // Als de verbinding gelukt is
    if ($link) {
        // Opbouwen van de query
        $query = 'SELECT * FROM EHBO_gebruikers WHERE mail=?';
        $statement = mysqli_stmt_init($link);

        // Prepared statement maken
        if (mysqli_stmt_prepare($statement, $query)) {
            mysqli_stmt_bind_param($statement, 's', $mailParam1);
            $mailParam1 = $mail;

            mysqli_stmt_execute($statement);
            $Result = mysqli_stmt_get_result($statement);
            $row = mysqli_fetch_assoc($Result);

            if ($row != null) {
                if ($_POST["OudWW"] != $_POST["NieuwWW"]) {
                    if ($_POST["NieuwWW"] == $_POST["HerhaalWW"]) {
                        $WWhash = password_hash($_POST["NieuwWW"], PASSWORD_DEFAULT);
                        $query1 = 'UPDATE EHBO_gebruikers SET wachtwoord = ? WHERE mail = ?';
                        $statement1 = mysqli_stmt_init($link);

                        if (mysqli_stmt_prepare($statement1, $query1)) {
                            mysqli_stmt_bind_param($statement1, 'ss', $WachtwoordParam, $MailParam);
                            $WachtwoordParam = $WWhash;
                            $MailParam = $mail;
                            mysqli_stmt_execute($statement1);
                            // Password successfully updated
                            // Redirect to index.php
                            header("Location: index.php");
                            exit();
                        }
                    } else {
                        echo "Het herhaalde wachtwoord is niet gelijk aan het nieuwe wachtwoord!";
                    }
                } else {
                    echo "Niet hetzelfde wachtwoord kiezen!";
                }
            }
        } else {
            echo '<br>' . mysqli_stmt_error($statement);
        }
        mysqli_close($link);
    } else {
        echo '<br>verbinding niet gelukt' . mysqli_connect_error();
    }
} else {
    echo "Vul alle velde in alstublieft";
}

ob_end_flush(); // End output buffering and flush output
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
    <!-- Topbar Start --><!--
    <div class="container-fluid py-2 border-bottom d-none d-lg-block">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-lg-start mb-2 mb-lg-0">
                    <div class="d-inline-flex align-items-center">
                        <a class="text-decoration-none text-body pe-3" href=""><i class="bi bi-telephone me-2"></i>+012 345 6789</a>
                        <span class="text-body">|</span>
                        <a class="text-decoration-none text-body px-3" href=""><i class="bi bi-envelope me-2"></i>info@example.com</a>
                    </div>
                </div>
                <div class="col-md-6 text-center text-lg-end">
                    <div class="d-inline-flex align-items-center">
                        <a class="text-body px-2" href="">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a class="text-body px-2" href="">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a class="text-body px-2" href="">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a class="text-body px-2" href="">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a class="text-body ps-2" href="">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    --><!-- Topbar End -->


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

                        if ($_SESSION['Rol'] == 'beheerder'){
                            echo '<a href="Home_Beheerder.php" class="nav-item nav-link ">Home</a>';
                        }
                        else {
                            echo '<a href="Home_Gebruiker.php" class="nav-item nav-link ">Home</a>';
                        }

                        ?>
                        <a href="OverzichtKlas.php" class="nav-item nav-link">Klassen overzicht</a>

                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pagina's</a>
                            <div class="dropdown-menu m-0">
                               <?php
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



    <!--hier door doet de navbar raar door (width: 80%; en padding: 20px;)dit stond bij de body -->
    <!DOCTYPE html>
    <html lang="nl">
    <head>
        <title>Login</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                margin: 0 auto;

            }
            h1 {
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
            input[type="password"] {
                width: 100%;
                padding: 8px;
                margin-bottom: 10px;
                border: 1px solid #ccc;
                border-radius: 4px;
                box-sizing: border-box;
            }
            input[type="submit"] {
                width: 100%;
                padding: 10px;
                margin-top: 10px;
                background-color: #4CAF50;
                color: white;
                border: none;
                border-radius: 4px;
                cursor: pointer;
            }
            input[type="submit"]:hover {
                background-color: #45a049;
            }
            .login {
                text-align: center;
                border: 2px solid #ccc;
                border-radius: 5px;
                padding: 20px;
                margin-top: 50px;
            }
            .login h1 {
                margin-bottom: 20px;
            }
            .login label {
                text-align: left;
            }
            .login h3 {
                margin-top: 20px;
            }
            p {
                margin-top: 20px;
                text-align: center;
            }
        </style>
    </head>
    <body>

    <table>
        <tr>
            <td>
               <!-- <a href="https://www.gtibeveren.be"><img src="assets/images/logoBV.png" alt="" align="left"/></a>-->
            </td>
            <td width="80%">
                <!--img src="images/cheese3.jpg" alt="" style="display: block; margin-left: auto; margin-right: auto;"/-->
            </td>

        </tr>
    </table>
    <form method="post">

            <h1>Wachtwoord aanpassen</h1>


            <input type="password" name="OudWW" placeholder="Oud Wachtwoord" id="username" ><!-- input textbox voor de email -->

            <input type="password" name="NieuwWW" placeholder="Nieuw Wachtwoord" id="password" ><!-- input textbox voor het wachtwoord -->

            <input type="password" name="HerhaalWW" placeholder="Herhaal Wachtwoord" id="password" >
            <input type="submit" value="Pas Aan" Name="cmdSend">

            <p>Het standaard wachtwoord is Test123</p>

    </form>

    </body>
    </html>



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