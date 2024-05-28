
<!DOCTYPE html>
<html lang="en">

<head>
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
                            echo '<a href="Home_Beheerder.php" class="nav-item nav-link ">Home</a>';
                        }
                        else {
                            echo '<a href="Home_Gebruiker.php" class="nav-item nav-link ">Home</a>';
                        }

                        ?>

                        <a href="OverzichtKlas.php" class="nav-item nav-link">Klassen overzicht</a>

                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                            <div class="dropdown-menu m-0">

                                <?php
                                session_start();
                                if ($_SESSION['Rol'] == 'beheerder'){

                                    echo'<a href="Gebruiker_toevoegen.php" class="dropdown-item">Gebruiker aanmaken</a>';
                                    echo'<a href="logboek.php" class="dropdown-item">Logboek</a>';
                                    echo'<a href="Gebruikers.php" class="dropdown-item">Lijst gebruiker</a>';
                                    echo '<a href="OverzichtOntbreek.php" class="dropdown-item">Ontbrekende Items</a>';
                                }
                                echo '<a href="Wachtwoord_Aanpassen.php" class="dropdown-item">Wachtwoor Aanpassen</a>';
                                echo'<a href="index.php" class="dropdown-item">Afmelden</a>';
                                ?>
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

        <h1>Item toevoegen</h1>


        <input type="text" name="item" placeholder="Naam item" id="username" required><!-- input textbox voor de email -->

        <input type="submit" value="Toevoegen" Name="cmdSend">

        <form method="post" action="OverzichtDoos.php">
        <label>Kies een bestaande categorie:</label>
        <select name="BestaandeCategorie" id="BestaandeCategorie">

        <input type="submit" value="Voeg toe" Name="cmdToe">



    </form>

    </body>
    </html>

    <?php
    session_start();


    include('Verbinding.php');

    if($link) {
        $query2 = "SELECT COLUMN_NAME 
              FROM INFORMATION_SCHEMA.COLUMNS 
              WHERE TABLE_SCHEMA = 'gtiictbeokcommen' 
              AND TABLE_NAME = 'EHBO_dozen'";

        $statement = mysqli_stmt_init($link);

        if (mysqli_stmt_prepare($statement, $query2)) {
            mysqli_stmt_execute($statement);
            $Result = mysqli_stmt_get_result($statement);


            $skipCounter = 0;
            while ($row = mysqli_fetch_assoc($Result)) {
                if ($skipCounter >= 7) {
                    // Skip the first two rows

                    echo "<option value='" . $row['COLUMN_NAME'] . "'>" . $row['COLUMN_NAME'] . "</option>";
                }
                else
                {
                    $skipCounter++;
                }

            }
            echo '</select>';

            echo '</form>';
        }
        if(isset($_POST['cmdSend']))
        {
            $query = "UPDATE `gtiictbeokcommen`.`EHBO_dozen` SET `?` = 'Aanwezig' WHERE (`doosid` = '?')";

            //4b: prepared statement maken op basis van de query en het statement
            if (mysqli_stmt_prepare($statement, $query)) {
                //4c: parameter een waarde geven (= vraagteken vervangen)
                mysqli_stmt_bind_param($statement, 'si',  $_POST['BestaandeCategorie'], $Id );

                $Id = $_SESSION["DoosID"];
                mysqli_stmt_execute($statement);





            }

            else
            {
                echo mysqli_stmt_error($statement);
            }
        }
    }








    if(isset($_POST['cmdToe'])) {


//1: verbinding maken met de database


//2: als de verbinding gelukt is
        if ($link) {
            //3: opbouw van de query
            //query met een parameters
            $Item = $_POST['Naam'];
            $query = 'ALTER TABLE `gtiictbeokcommen`.`EHBO_dozen` ADD COLUMN '.$Item.' VARCHAR(255)';
            $query1= 'update `gtiictbeokcommen`.`EHBO_dozen`  set '.$Item." = 'Aanwezig' WHERE (`doosid` = ?)";


            //4a: statement initialiseren op basis van de link
            $statement = mysqli_stmt_init($link);
            if (mysqli_stmt_prepare($statement, $query))
            {
                if (mysqli_stmt_execute($statement))
                {
                    echo 'kolom toegoevoegd ';
                    //echo '<form action="OverzichtDoos.php">';


                }
                else{
                    echo 'kolom niet toegevoegd'.mysqli_stmt_error($statement);
                }
            }

            //4b: prepared statement maken op basis van de query en het statement
            if (mysqli_stmt_prepare($statement, $query1)) {
                //4c: parameter een waarde geven (= vraagteken vervangen)
                mysqli_stmt_bind_param($statement, 'i', $Id);

                $Id = $_SESSION["DoosID"];
                mysqli_stmt_execute($statement);





            }

            else
            {
                echo mysqli_stmt_error($statement);
            }


            //6: verbining sluiten
            mysqli_close($link);
        } else {
            echo '<br> verbining niet gelukt ' . mysqli_connect_error();
        }

    }
    ?>




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