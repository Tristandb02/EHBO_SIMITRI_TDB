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
<div class="container-fluid sticky-top bg-white shadow-sm">
    <div class="container">
        <nav class="navbar navbar-expand-lg bg-white navbar-light py-3 py-lg-0">
            <a href="index.html" class="navbar-brand">
                <h1 class="m-0 text-uppercase text-primary"><i class="fa fa-clinic-medical me-2"></i>Medinova</h1>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <a href="Home_Gebruiker.php" class="nav-item nav-link">Home</a>
                    <a href="OverzichtKlas.php" class="nav-item nav-link active">Klassen     overzicht</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Profiel</a>
                        <div class="dropdown-menu m-0">
                            <a href="blog.php" class="dropdown-item">Wachtwoord aanpassen</a>
                            <a href="detail.php" class="dropdown-item">Afmelden</a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</div>
<!-- Navbar End -->


<!-- Services Start -->


<!--
Author: Milan Van Wonterghem
-->
<html>
<form method="post">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Overzicht Doos</title>
    </head>
    <body>




<?php
include "Verbinding.php";
session_start();
echo "<h1>EHBO-doos van lokaal " . $_SESSION["klas"] . "</h1>";

$stmt = mysqli_stmt_init($link);
$data_query = "SELECT * FROM EHBO_dozen WHERE lokaal = ?";
if (mysqli_stmt_prepare($stmt, $data_query)) {
    mysqli_stmt_bind_param($stmt, 's', $_SESSION["klas"]);
    mysqli_stmt_execute($stmt);
    $data_res = mysqli_stmt_get_result($stmt);

    $fields = $data_res->fetch_fields();
    $legeKolom = array();

    while ($data_row = mysqli_fetch_assoc($data_res)) {
        $_SESSION["DoosID"]=$data_row["doosid"];
        foreach ($fields as $field) {
            if (is_null($data_row[$field->name])) {
                $legeKolom[] = $field->name;
            }
        }
    }

}




// Query to get column names from the table
$query = "SELECT COLUMN_NAME 
          FROM INFORMATION_SCHEMA.COLUMNS 
          WHERE TABLE_SCHEMA = 'gtiictbeokcommon' 
          AND TABLE_NAME = 'EHBO_dozen'
          LIMIT 2, 999"; // Skipping the first two columns


$columnNames = array(); // Initialize an array to store column names

if (mysqli_stmt_prepare($stmt, $query)) {
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);

    echo "<table border='1'>";
    echo "<tr>";
    // Fetch column names and display them as table headers
    while ($row = mysqli_fetch_assoc($res)) {


            if(!in_array($row['COLUMN_NAME'], $legeKolom))
            {
                echo "<th>" . $row['COLUMN_NAME'] . "</th>";
                $columnNames[] = $row['COLUMN_NAME']; // Append column name to the array
            }




    }
    echo "</tr>";


    // Now fetch data from the table and display it
    $data_query = "SELECT * FROM EHBO_dozen WHERE lokaal = ?";
    if (mysqli_stmt_prepare($stmt, $data_query)) {
        mysqli_stmt_bind_param($stmt, 's', $_SESSION["klas"]);
        mysqli_stmt_execute($stmt);
        $data_res = mysqli_stmt_get_result($stmt);

          while ($data_row = mysqli_fetch_row($data_res)) {
    // Check if the row contains any non-empty values
    if (array_filter($data_row)) {
        echo "<tr>";
        foreach ($data_row as $key => $value) {
            if ($key >= 2) { // Skipping the first two columns
                if($value!=null) {

                    echo "<td>" . $value . "</td>";
                }

            }
        }
        echo "</tr><tr>";
        foreach ($columnNames as $columnName) {
            // Here you can access each column name and perform actions as needed

                switch ($columnName) {
                    case "schaar":
                        echo "<td><input value='Niet aanwezig' type='radio' name='" . $columnName . "'>Niet aanwezig<br><input value='Aanwezig' type='radio' name='" . $columnName . "'>Aanwezig</td>";
                        break;
                    case "ontsmettingsmiddel":
                        echo "<td><input value='Niet aanwezig' type='radio' name='" . $columnName . "'>Niet aanwezig<br><input value='Aanwezig' type='radio' name='" . $columnName . "'>Aanwezig</td>";
                        break;
                    case "handschoenen":
                        echo "<td>Aantal:<input type='number' style='width: 40px' name='" . $columnName . "'></td>";
                        break;
                    default:
                        echo "<td><input value='Niet aanwezig' type='radio' name='" . $columnName . "'>Niet aanwezig<br><input value='Aanwezig' type='radio' name='" . $columnName . "'>Aanwezig</td>"; //de default is voor pleisters en documenten en als er een item wordt toegevoegd
                        break;
                }

        }
    }
}


        echo "</table>";

        echo "</tr><input type='submit' value='Aanpassen' name='btnAanpassen'><input type='submit' value='Item Toevoegen' name='btnPagToev'><input type='submit' value='Terug naar klassen overzicht' name='btnNaarKlassen'";










    } else {
        echo "Error fetching data: " . mysqli_error($link);
    }


} else {
    echo "Error fetching column names: " . mysqli_error($link);
}



if(isset($_POST["btnAanpassen"]))
{
    //UPDATE `db_ehbo`.`dozen` SET `schaar` = 'ja', `ontsmettingsmiddel` = 'weinig', `handschoenen` = '3', `documenten` = 'ja' WHERE (`doosid` = '1');

    $aangepast="";
    $query="UPDATE EHBO_dozen set ";
    foreach ($columnNames as $columnName)
    {
        if($_POST[$columnName])
        {

            $query.= $columnName." = '".$_POST[$columnName]."', ";
            if($aangepast=="")
            {
                $aangepast.=$columnName;
            }else{
                $aangepast.=", ".$columnName;
            }



        }
    }
    //echo $query;
    $query = substr($query, 0, -2);

    echo $_SESSION["klas"]."1";
    if (mysqli_stmt_prepare($stmt, "SELECT * FROM EHBO_dozen WHERE lokaal = ?")) {
        mysqli_stmt_bind_param($stmt, 's', $_SESSION["klas"]);
        echo $_SESSION["klas"];
        mysqli_stmt_execute($stmt);
        $res = mysqli_stmt_get_result($stmt);
        $id=mysqli_fetch_row($res);
    }

    $query.=" where (doosid = '".$id[0]."')";
    if(mysqli_stmt_prepare($stmt,$query))
    {
        if(mysqli_stmt_execute($stmt))
        {
            echo "gelukt";
//INSERT INTO `db_ehbo`.`logboek` (`idLeerkracht`, `datum`, `lokaal`, `status`) VALUES ('1', 'datum', 'K123', '2');
            if(mysqli_stmt_prepare($stmt,"INSERT INTO `gtiictbeokcommon`.`EHBO_logboek` (`idLeerkracht`, `datum`, `lokaal`, `status`) VALUES (?, ?, ?, ?);"))
            {
                $date = date("Y-m-d");
                $status= "Inhoud doos aangepast (".$aangepast.")";

                mysqli_stmt_bind_param($stmt, 'isss',$_SESSION["id"],$date,$_SESSION["klas"],$status);
                 if(mysqli_stmt_execute($stmt))
                 {
                     echo "logboek toegevoegd";
                 }
                 else
                 {
                     echo "logboek niet toegevoegd";
                 }
            }




            header("location: OverzichtDoos.php");
        }
        else
        {
            echo "niet gelukt";
        }
    }
}
if(isset($_POST["btnPagToev"]))
{
    header("Location: items_toevoegen.php");
}
if(isset($_POST["btnNaarKlassen"]))
{
    header("location: overzichtKlas.php");
}
// Close connection
mysqli_close($link);
?>


</body>

</form>

</html>


?>


<!-- Services End -->


<!-- Appointment Start -->
<!--
<div class="container-fluid bg-primary my-5 py-5">
    <div class="container py-5">
        <div class="row gx-5">
            <div class="col-lg-6 mb-5 mb-lg-0">
                <div class="mb-4">
                    <h5 class="d-inline-block text-white text-uppercase border-bottom border-5">Appointment</h5>
                    <h1 class="display-4">Make An Appointment For Your Family</h1>
                </div>
                <p class="text-white mb-5">Eirmod sed tempor lorem ut dolores. Aliquyam sit sadipscing kasd ipsum. Dolor ea et dolore et at sea ea at dolor, justo ipsum duo rebum sea invidunt voluptua. Eos vero eos vero ea et dolore eirmod et. Dolores diam duo invidunt lorem. Elitr ut dolores magna sit. Sea dolore sanctus sed et. Takimata takimata sanctus sed.</p>
                <a class="btn btn-dark rounded-pill py-3 px-5 me-3" href="">Find Doctor</a>
                <a class="btn btn-outline-dark rounded-pill py-3 px-5" href="">Read More</a>
            </div>
            <div class="col-lg-6">
                <div class="bg-white text-center rounded p-5">
                    <h1 class="mb-4">Book An Appointment</h1>
                    <form>
                        <div class="row g-3">
                            <div class="col-12 col-sm-6">
                                <select class="form-select bg-light border-0" style="height: 55px;">
                                    <option selected>Choose Department</option>
                                    <option value="1">Department 1</option>
                                    <option value="2">Department 2</option>
                                    <option value="3">Department 3</option>
                                </select>
                            </div>
                            <div class="col-12 col-sm-6">
                                <select class="form-select bg-light border-0" style="height: 55px;">
                                    <option selected>Select Doctor</option>
                                    <option value="1">Doctor 1</option>
                                    <option value="2">Doctor 2</option>
                                    <option value="3">Doctor 3</option>
                                </select>
                            </div>
                            <div class="col-12 col-sm-6">
                                <input type="text" class="form-control bg-light border-0" placeholder="Your Name" style="height: 55px;">
                            </div>
                            <div class="col-12 col-sm-6">
                                <input type="email" class="form-control bg-light border-0" placeholder="Your Email" style="height: 55px;">
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="date" id="date" data-target-input="nearest">
                                    <input type="text"
                                        class="form-control bg-light border-0 datetimepicker-input"
                                        placeholder="Date" data-target="#date" data-toggle="datetimepicker" style="height: 55px;">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="time" id="time" data-target-input="nearest">
                                    <input type="text"
                                        class="form-control bg-light border-0 datetimepicker-input"
                                        placeholder="Time" data-target="#time" data-toggle="datetimepicker" style="height: 55px;">
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" type="submit">Make An Appointment</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
-->
<!-- Appointment End -->


<!-- Testimonial Start -->
<!--
<div class="container-fluid py-5">
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
                        <p class="fs-4 fw-normal">Dolores sed duo clita tempor justo dolor et stet lorem kasd labore dolore lorem ipsum. At lorem lorem magna ut et, nonumy et labore et tempor diam tempor erat. Erat dolor rebum sit ipsum.</p>
                        <hr class="w-25 mx-auto">
                        <h3>Patient Name</h3>
                        <h6 class="fw-normal text-primary mb-3">Profession</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
-->
<!-- Testimonial End -->


<!-- Footer Start -->
<!--
<div class="container-fluid bg-dark text-light mt-5 py-5">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-3 col-md-6">
                <h4 class="d-inline-block text-primary text-uppercase border-bottom border-5 border-secondary mb-4">Get In Touch</h4>
                <p class="mb-4">No dolore ipsum accusam no lorem. Invidunt sed clita kasd clita et et dolor sed dolor</p>
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
-->
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

</html><?php
