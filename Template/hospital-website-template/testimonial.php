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
    <!-- Topbar Start -->
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
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid sticky-top bg-white shadow-sm mb-5">
        <div class="container">
            <nav class="navbar navbar-expand-lg bg-white navbar-light py-3 py-lg-0">
                <a href="Home_Beheerder.php" class="navbar-brand">
                    <h1 class="m-0 text-uppercase text-primary"><i class="fa fa-clinic-medical me-2"></i>Medinova</h1>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0">
                        <a href="Home_Beheerder.php" class="nav-item nav-link">Home</a>
                        <a href="Gebruiker_toevoegen.php" class="nav-item nav-link">About</a>
                        <a href="service.php" class="nav-item nav-link">Service</a>
                        <a href="logboek.php" class="nav-item nav-link">Pricing</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle active" data-bs-toggle="dropdown">Pages</a>
                            <div class="dropdown-menu m-0">
                                <a href="Wachtwoor_Aanpassen.php" class="dropdown-item">Blog Grid</a>
                                <a href="detail.php" class="dropdown-item">Blog Detail</a>
                                <a href="Gebruikers.php" class="dropdown-item">The Team</a>
                                <a href="testimonial.html" class="dropdown-item active">Testimonial</a>
                                <a href="appointment.php" class="dropdown-item">Appointment</a>
                                <a href="search.php" class="dropdown-item">Search</a>
                            </div>
                        </div>
                        <a href="contact.php" class="nav-item nav-link">Contact</a>
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
    //verbinding met database
    session_start();
    include 'Verbinding.php';
    $Total = "";
    $query = "SELECT COLUMN_NAME 
          FROM INFORMATION_SCHEMA.COLUMNS 
          WHERE TABLE_SCHEMA = 'gtiictbeokcommon' 
          AND TABLE_NAME = 'EHBO_dozen'
          LIMIT 2, 999"; // Skipping the first two columns

    $stmt = mysqli_stmt_init($link);
    $T = 0;
    $columnNames = array(); // Initialize an array to store column names

    if (mysqli_stmt_prepare($stmt, $query)) {
        mysqli_stmt_execute($stmt);
        $res = mysqli_stmt_get_result($stmt);

        echo "<table border='1'>";
        echo "<tr>";
        echo "<html>
<form method='post'>
    <select name='Item' >";
        while ($row = mysqli_fetch_assoc($res)) {

            echo "<option value='" . $row['COLUMN_NAME'] . "'>" . $row['COLUMN_NAME'] . "</option>";
            $columnNames[$T] = $row['COLUMN_NAME'];
            $T++;
        }
    }
    echo "<br><input type='submit' name='btnZoek' value='Laat zien'><br><input type='submit' name='btnTerug' value='Ga terug'><br>";
    echo "<input type='submit' name='btnSend' value='Verstuur op mail'><br><input type='submit' name='btnAlles' value='Laat alles zien'><br>";



    $LokalenOntbreek="";
    $intLokalenOntbreek=0;
    if(isset($_POST['btnAlles']))
    {
        $_SESSION['Ontbrekend'] = "";
        echo "Leeggehaald 1";
        foreach($columnNames as $Item)
        {
                $intLokalenOntbreek = 0;
                $LokalenOntbreek = "";

                if($Item!="handschoenen")
                {
                    if(mysqli_stmt_prepare($stmt,"select lokaal from EHBO_dozen where ".$Item." = 'Niet Aanwezig'"))
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
                            $Ontbreek = "Er ontbreken ".$intLokalenOntbreek." ".$Item."  in de volgende lokalen: ".$LokalenOntbreek;
                            $_SESSION['Ontbrekend'] .= $Ontbreek;
                            echo "$Ontbreek <br><br>";
                        }



                    }
                    $Total .= $Ontbreek;
                }
                else {
                    if (mysqli_stmt_prepare($stmt, "select lokaal from EHBO_dozen where " . $Item . " = 1")) {
                        mysqli_stmt_execute($stmt);
                        $res = mysqli_stmt_get_result($stmt);
                        while ($row = mysqli_fetch_assoc($res)) {
                            $intLokalenOntbreek++;
                            $LokalenOntbreek .= $row["lokaal"] . ", ";

                        }

                        $LokalenOntbreek = substr($LokalenOntbreek, 0, -2);
                        if ($intLokalenOntbreek != 0) {
                            $Ontbreek = "Er zijn  " . $intLokalenOntbreek . " lokalen waar er maar 1 paar " . $Item . "  ligt, en dat is in de volgende lokalen: " . $LokalenOntbreek;
                            $Total .= "<br>".$Ontbreek;
                            $_SESSION['Ontbrekend'] .= $Ontbreek;
                            echo "$Ontbreek <br><br>";
                        }

                    }
                }

            }

    }

    if(isset($_POST['btnZoek'])) {
        $_SESSION['Ontbrekend'] = "";
        echo "Leeggehaald 2";
        if (isset($_POST["Item"])) {
            if ($_POST["Item"] != "handschoenen") {
                if (mysqli_stmt_prepare($stmt, "select lokaal from EHBO_dozen where " . $_POST["Item"] . " = 'Niet Aanwezig'")) {
                    mysqli_stmt_execute($stmt);
                    $res = mysqli_stmt_get_result($stmt);
                    while ($row = mysqli_fetch_assoc($res)) {
                        $intLokalenOntbreek++;
                        $LokalenOntbreek .= $row["lokaal"] . ", ";

                    }

                    $LokalenOntbreek = substr($LokalenOntbreek, 0, -2);
                    if ($intLokalenOntbreek != 0) {
                        $Ontbreek = "Er ontbreken " . $intLokalenOntbreek . " " . $_POST["Item"] . "  in de volgende lokalen: " . $LokalenOntbreek;
                        $_SESSION['Ontbrekend'] = $Ontbreek;
                        echo "$Ontbreek";
                    } else {
                        echo "Er ontbreken geen " . $_POST["Item"];
                    }

                }

            } else {
                if (mysqli_stmt_prepare($stmt, "select lokaal from EHBO_dozen where " . $_POST["Item"] . " = 1")) {
                    mysqli_stmt_execute($stmt);
                    $res = mysqli_stmt_get_result($stmt);
                    while ($row = mysqli_fetch_assoc($res)) {
                        $intLokalenOntbreek++;
                        $LokalenOntbreek = $row["lokaal"] . ", ";

                    }

                    $LokalenOntbreek = substr($LokalenOntbreek, 0, -2);
                    if ($intLokalenOntbreek != 0) {
                        $Ontbreek = "Er zijn  " . $intLokalenOntbreek . " lokalen waar er maar 1 paar " . $_POST["Item"] . "  ligt, en dat is in de volgende lokalen: " . $LokalenOntbreek;
                        $_SESSION['Ontbrekend'] .= $Ontbreek;
                        echo "$Ontbreek";
                    } else {
                        echo "Er ontbreken geen " . $_POST["Item"];
                    }

                }
            }

        }
    }
    if(isset($_POST['btnSend']))
    {
        echo $_SESSION['Ontbrekend'];
        // mail sturen
        //$to = $_POST['mail'];
        //echo 'mail';
        $testName = 'tristand101006@student.gtibeveren.be';
        $to = $testName; //extra ontvanger toevoegen $_POST['mail'].','.
        $from = 'tristand101006@student.gtibeveren.be';
        $fromName = 'GTI - EHBO';

        $subject = "Ontbrekende in EHBO doosjes";

        $htmlContent =
            '<html> 
    <head> 
        <title>Ontbreken EHBO doosjes</title> 
    </head> 
    <body> 
        
        <p>'.$_SESSION["Ontbrekend"].'</p>
    </body> 
    </html>';

        // Set content-type header for sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        // Additional headers
        $headers .= 'From: '.$fromName.'<'.$from.'>' . "\r\n";
        $testName = 'tristand101006@student.gtibeveren.be'; //werkt om mail in cc te krijgen
        $headers .= 'Cc:'.$testName. "\r\n";

        // Send email
        if(mail($to, $subject, $htmlContent, $headers)){
            echo 'ok';
        }else{
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
    <div class="container-fluid bg-dark text-light mt-5 py-5">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h4 class="d-inline-block text-primary text-uppercase border-bottom border-5 border-secondary mb-4">Get In Touch</h4>

                    <p class="mb-2"><i class="fa fa-map-marker-alt text-primary me-3"></i>123 Street, New York, USA</p>
                    <p class="mb-2"><i class="fa fa-envelope text-primary me-3"></i>info@example.com</p>
                    <p class="mb-0"><i class="fa fa-phone-alt text-primary me-3"></i>+012 345 67890</p>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="d-inline-block text-primary text-uppercase border-bottom border-5 border-secondary mb-4">Quick Links</h4>
                    <div class="d-flex flex-column justify-content-start">
                        <a class="text-light mb-2" href="#"><i class="fa fa-angle-right me-2"></i>Home</a>
                        <a class="text-light mb-2" href="#"><i class="fa fa-angle-right me-2"></i>About Us</a>
                        <a class="text-light mb-2" href="#"><i class="fa fa-angle-right me-2"></i>Our Services</a>
                        <a class="text-light mb-2" href="#"><i class="fa fa-angle-right me-2"></i>Meet The Team</a>
                        <a class="text-light mb-2" href="#"><i class="fa fa-angle-right me-2"></i>Latest Blog</a>
                        <a class="text-light" href="#"><i class="fa fa-angle-right me-2"></i>Contact Us</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="d-inline-block text-primary text-uppercase border-bottom border-5 border-secondary mb-4">Popular Links</h4>
                    <div class="d-flex flex-column justify-content-start">
                        <a class="text-light mb-2" href="#"><i class="fa fa-angle-right me-2"></i>Home</a>
                        <a class="text-light mb-2" href="#"><i class="fa fa-angle-right me-2"></i>About Us</a>
                        <a class="text-light mb-2" href="#"><i class="fa fa-angle-right me-2"></i>Our Services</a>
                        <a class="text-light mb-2" href="#"><i class="fa fa-angle-right me-2"></i>Meet The Team</a>
                        <a class="text-light mb-2" href="#"><i class="fa fa-angle-right me-2"></i>Latest Blog</a>
                        <a class="text-light" href="#"><i class="fa fa-angle-right me-2"></i>Contact Us</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="d-inline-block text-primary text-uppercase border-bottom border-5 border-secondary mb-4">Newsletter</h4>
                    <form action="">
                        <div class="input-group">
                            <input type="text" class="form-control p-3 border-0" placeholder="Your Email Address">
                            <button class="btn btn-primary">Sign Up</button>
                        </div>
                    </form>
                    <h6 class="text-primary text-uppercase mt-4 mb-3">Follow Us</h6>
                    <div class="d-flex">
                        <a class="btn btn-lg btn-primary btn-lg-square rounded-circle me-2" href="#"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-lg btn-primary btn-lg-square rounded-circle me-2" href="#"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-lg btn-primary btn-lg-square rounded-circle me-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a class="btn btn-lg btn-primary btn-lg-square rounded-circle" href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-dark text-light border-top border-secondary py-4">
        <div class="container">
            <div class="row g-5">
                <div class="col-md-6 text-center text-md-start">
                    <p class="mb-md-0">&copy; <a class="text-primary" href="#">Your Site Name</a>. All Rights Reserved.</p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <p class="mb-0">Designed by <a class="text-primary" href="https://htmlcodex.com">HTML Codex</a></p>
                </div>
            </div>
        </div>
    </div>
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