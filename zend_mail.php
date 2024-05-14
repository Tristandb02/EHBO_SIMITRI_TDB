<?php 
	//verbinding met database
    include('verbinding.php');



	//totaal bedrag bepalen
	$totaal=0;
	//if (isset($_POST['checkbox1']))
    //{
    	//echo 'kaas vol';
		$Kvol=$_POST['KaasVol'];
		//echo $Kvol.' ';
		$KvolBedrag = $Kvol*20;
	//}
	//if (isset($_POST['checkbox2']))
   // {
    	//echo 'vlees vol';
		$Vvol=$_POST['VleesVol'];
		//echo $Vvol.' ';
		$VvolBedrag = $Vvol*20;
	//}
	//if (isset($_POST['checkbox3']))
    //{
    	//echo 'kaas kind';
		$Kkind=$_POST['KaasKind'];
		//echo $Kkind.' ';
		$KkindBedrag = $Kkind*11;

		//echo 'rijst';
		$rijst=$_POST['rijst'];
		//echo $Kkind.' ';
		$rijstBedrag = $rijst*2;

		//echo 'choco';
		$choco=$_POST['choco'];
		//echo $Kkind.' ';
		$chocoBedrag = $choco*2;

	$totaal = $KvolBedrag + $VvolBedrag +$KkindBedrag + $rijstBedrag + $chocoBedrag;
	//echo $totaal.'  ';

	if (isset($_POST['naam']))
    {$naam= $_POST['naam'];}

	$aanpassen="insert into tblGegevens(naam, mail, categorie, tafel, opmerking,leerling, klas, andere, totaal,Kvol, Kkind, Vvol, rijst, choco) values('".$naam."','".$_POST['mail']."','".$cat."','".$_POST['txtsamen']."','".$_POST['txtopm']."','".$llnaam."','".$klas."','".$andere."','".$totaal."','".$Kvol."','".$Kkind."','".$Vvol."','".$rijst."','".$choco."')";

	//echo $aanpassen;
    if ($result = $link->query($aanpassen))
    	{
			echo '<img src="images/Ouder_klein.jpg" width=15%>';

    	 echo '<h1>Inschrijving kaas- en wijnavond</h1>';

    	 echo 'De inschrijving voor de kaas- en wijnavond is gelukt!';
    	 echo '<p></p> ';
		 echo 'U ontvangt <b>GEEN mail</b> voor de betaling, het totale bedrag is € '. $totaal;
		 echo '<p></p> ';
		 echo '<p>Alvast bedankt voor uw inschrijving voor de kaas- en wijnavond op zaterdag 25/11 om 19u.</p>';
		 echo '<p>Gelieve het bedrag van '. $totaal;
		 echo  ' euro te storten op rekeningnummer BExxx op naam van xxxx GTI met vermelding van de naam van de inschrijving.</p>';
		echo '<br>';
		echo 'Voor vragen: mail naar patrick.heyrman@proximus.be ';
		echo 'of neem telefonisch contact: 0477 20 35 54';
		echo '<p>Met vriendelijke groeten</p>';
		echo '<p>Oudercomité GTI Beveren</p>';
    	}
    else
        {
           echo 'fout in insert query';
        }


	// mail sturen
	//$to = $_POST['mail']; 
	//echo 'mail';
    $testName = 'aaa.bbb@test.be';
	$to = $testName; //extra ontvanger toevoegen $_POST['mail'].','.
	$from = 'xxx.xxx@gmail.com';
	$fromName = 'GTI - xxxxxxxxxxxxx';
 
	$subject = "Inschrijving kaas- en wijnavond GTI"; 
 
	$htmlContent = 
    '<html> 
    <head> 
        <title>Inschrijving kaas- en wijnavond</title> 
    </head> 
    <body> 
        
        <p>inschrijving van '.$_POST['mail'].'</p>
        <p>totaal:'. $totaal . ' </p>
		<p>kaas:'. $Kvol . ' </p>
		<p>vlees:'. $Vvol . ' </p>
		<p>kind:'. $Kkind . ' </p>
		<p>choco:'. $choco . ' </p>
		<p>rijst:'. $rijst . ' </p>
        <p>van '.$_POST['mail'].'</p>
    </body> 
    </html>'; 
 
	// Set content-type header for sending HTML email 
	$headers = "MIME-Version: 1.0" . "\r\n"; 
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 
 
	// Additional headers 
	$headers .= 'From: '.$fromName.'<'.$from.'>' . "\r\n";
	$testName = 'ann.colpaert@gtibeveren.be'; //werkt om mail in cc te krijgen
    $headers .= 'Cc:'.$testName. "\r\n";
 
	// Send email 
	if(mail($to, $subject, $htmlContent, $headers)){ 
    	echo 'ok';
	}else{ 
   	echo 'Email sending failed.'; 
	}
	
	
    

	$result->close();
	
	mysqli_close($link);
?>