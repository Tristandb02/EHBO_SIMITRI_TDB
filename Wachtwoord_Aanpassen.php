<!--
Author: Tristan De Ben
-->
<html>
<head>
    <title>Login</title>
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

        <label for="password">
            <i class="fas fa-lock"></i>
        </label>
        <input type="password" name="OudWW" placeholder="Oud Wachtwoord" id="username" required><!-- input textbox voor de email -->
        <label for="password">
            <i class="fas fa-lock"></i>
        </label>
        <input type="password" name="NieuwWW" placeholder="Nieuw Wachtwoord" id="password" required><!-- input textbox voor het wachtwoord -->
        <label for="password">
            <i class="fas fa-lock"></i>
        </label>
        <input type="password" name="HerhaalWW" placeholder="Herhaal Wachtwoord" id="password" required>
        <input type="submit" value="Pas Aan" Name="cmdSend">

        <h3>(Zorg dat je als nieuw wachtwoord nooit Test123 kiest!)</h3>





</form>
</div>

</body>
</html>
<?php
session_start();

$mail = $_SESSION["Mail"];
echo $_SESSION["Mail"];

if(isset($_POST['cmdSend'])) {
//verbinding maken met de database
    include('Verbinding.php');
    echo "button pushed";

//als de berbinding gelukt is
    if ($link) {
        echo "link gelegd";
        //opbouwen van de query
        //query met een parameter
        $query = 'select * from db_ehbo.gebruikers where mail=?';
        echo $query . '<br>';

        //tatement initialiseren op basis van de query
        $statement = mysqli_stmt_init($link);

        //prepared statement maken op basis van de query en het statement
        if (mysqli_stmt_prepare($statement, $query)) {

            mysqli_stmt_bind_param($statement, 's', $mailParam1);
            $mailParam1 = $mail;
            echo $mailParam1;
            echo "parameter 1";


            mysqli_stmt_execute($statement);

            if (mysqli_stmt_execute($statement))
            {
                $Result = mysqli_stmt_get_result($statement);

                $row = mysqli_fetch_assoc($Result);

                if ($row != null)
                {


                    if ($_POST["OudWW"] != $_POST["NieuwWW"])
                    {
                        if ($_POST["NieuwWW"] == $_POST["HerhaalWW"])
                        {
                            $WWhash = password_hash($_POST["NieuwWW"], PASSWORD_DEFAULT);
                            $query1 = 'update gebruikers set wachtwoord = ? where mail = ?';

                            $statement1 = mysqli_stmt_init($link);

                            if (mysqli_stmt_prepare($statement1, $query1))
                            {
                                mysqli_stmt_bind_param($statement1, 'ss', $WachtwoordParam, $MailParam);
                                $WachtwoordParam = $WWhash;
                                $MailParam = $mail;

                            }
                            mysqli_stmt_execute($statement1);

                            header("location: index.php");

                        } else
                        {
                            echo "Het herhaalde wachtwoord is niet gelijk aan het nieuwe wachtwoord!";
                        }

                    } else
                    {
                        echo "Niet hetzelfde wachtwoord kiezen!";
                    }
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

}

?>