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
        <input type="text" name="username" placeholder="Oud Wachtwoord" id="username" required><!-- input textbox voor de email -->
        <label for="password">
            <i class="fas fa-lock"></i>
        </label>
        <input type="password" name="password" placeholder="Nieuw Wachtwoord" id="password" required><!-- input textbox voor het wachtwoord -->
        <label for="password">
            <i class="fas fa-lock"></i>
        </label>
        <input type="password" name="password" placeholder="Herhaal Wachtwoord" id="password" required>
        <input type="submit" value="Login" Name="cmdSend">





</form>
</div>

</body>
</html>
<?php
echo "goeiemorgend";