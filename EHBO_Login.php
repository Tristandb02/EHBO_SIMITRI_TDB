<html>
<head>
    <title>Login</title>
</head>
<body>
    <form method="post">
<div class="login">
    <h1>Login</h1>
        <label for="username">
        </label>
        <input type="text" name="username" placeholder="Username" id="username" required><!-- input textbox voor de email -->
        <label for="password">

        </label>
        <input type="password" name="password" placeholder="Password" id="password" required><!-- input textbox voor het wachtwoord -->
        <input type="submit" value="Login" Name="cmdSend">



    </form>
</div>
</body>
</html>

<?php
session_start();

if(isset($_POST['cmdSend'])) {
//verbinding maken met de database
    include('Verbinding.php');

//als de berbinding gelukt is
    if ($link) {
        //opbouwen van de query
        //query met een parameter
        $query = 'select wachtwoord, rol from db_ehbo.gebruikers where mail=?';
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
                    $WWfromDB = $row['wachtwoord'];
                    echo $WWfromDB.'<br>';
                    $WWInput = $_POST['password'];

                    if($WWfromDB == $WWInput){
                        echo "inlog geslaagd";

                        $Role = $row['rol'];


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

    if ($Role = "gebruiker")
    {
        $_SESSION["Rol"] = "gebruiker";
        header("location: Home_Gebruiker.php");
    }

    if ($Role = "beheerder")
    {
        $_SESSION["Rol"] = "beheerder";
        header("location: Home_Beheerder.php");
    }

}

?>