<!--
Authors: Tristan De Ben, Milan Van Wonterghem
-->
<html>
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
        input[type="text"] {
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
    <link href="style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
</head>
<body>
<table>
    <tr>
        <td>
            <a href="https://www.gtibeveren.be"><img src="assets/images/logoBV.png" alt="" align="left"/></a>
        </td>
        <td width="80%">
            <!--img src="images/cheese3.jpg" alt="" style="display: block; margin-left: auto; margin-right: auto;"/-->
        </td>

    </tr>
</table>
    <form method="post">
<div class="login">
    <h1>Login</h1>

    <label for="username">
        <i class="fas fa-user"></i>
    </label>
        <input type="text" name="username" placeholder="Username" id="username" required><!-- input textbox voor de email -->
    <label for="password">
        <i class="fas fa-lock"></i>
    </label>
        <input type="password" name="password" placeholder="Password" id="password" required><!-- input textbox voor het wachtwoord -->
        <input type="submit" value="Login" Name="cmdSend">





    </form>
</div>

</body>
</html>

<?php
session_destroy();
session_start();


if(isset($_POST['cmdSend'])) {
//verbinding maken met de database
    include('Verbinding.php');
    $BasisWachtwoord = "Test123";

//als de verbinding gelukt is
    if ($link) {
        //opbouwen van de query
        //query met een parameter
        $query = 'select * from EHBO_gebruikers where mail=?';
        echo $query . '<br>';

        //tatement initialiseren op basis van de query
        $statement = mysqli_stmt_init($link);

        //prepared statement maken op basis van de query en het statement
        if (mysqli_stmt_prepare($statement, $query)) {

            mysqli_stmt_bind_param($statement, 's', $mail);
            $mail = $_POST['username'];
            echo $mail.'<br>';

            //5a: statement uitvoeren
            mysqli_stmt_execute($statement);
            if (mysqli_stmt_execute($statement))
            {
                $Result = mysqli_stmt_get_result($statement);


                $row = mysqli_fetch_assoc($Result);
                if ($row != null)
                {
                    $_SESSION["id"]=$row["gebruikerid"];
                    $_SESSION["naam"]=$row["voornaam"]." ".$row["achternaam"];


                    if (password_verify($_POST['password'], $row['wachtwoord'])){

                        $Role = $row['rol'];
                        echo $Role;
                        if (password_verify($BasisWachtwoord, $row['wachtwoord']))
                        {
                            $_SESSION["Mail"] = $_POST["username"];
                            header("location: Wachtwoord_Aanpassen.php");
                        }

                        echo "inlog geslaagd"."<br>";


                    }
                    else{
                        echo "fout wachtwoord";
                    }

                }
                else
                {
                    echo "Foutieve mail";
                }


            }
            else
            {
                echo mysqli_stmt_error($statement);
            }



        } else {
            echo '<br>' . mysqli_stmt_error($statement);
        }

        //6: de verbinding sluiten
        mysqli_close($link);
    } else {
        echo '<br>verbinding niet gelukt' . mysqli_connect_error();
    }
    if (!password_verify($BasisWachtwoord, $row['wachtwoord'])) {

        if ($Role == "gebruiker") {
            $_SESSION["Rol"] = "gebruiker";
            if($_SESSION["QRgescand"]=="ja")
            {
                header("location: overzichtklas.php");
            }
            else {
                header("location: Home_Gebruiker.php");
            }
        }

        if ($Role == "beheerder") {
            $_SESSION["Rol"] = "beheerder";
            if($_SESSION["QRGescand"]=="ja")
            {
                header("location: overzichtklas.php");
            }
            else {
                header("location: Home_Beheerder.php");
            }
        }
    }

}

?>