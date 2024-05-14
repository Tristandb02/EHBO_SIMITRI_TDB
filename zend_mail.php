<?php 
	//verbinding met database
    include('Verbinding.php');

    // mail sturen
	//$to = $_POST['mail']; 
	//echo 'mail';
    $testName = 'tristand101006@student.gtibeveren.be';
	$to = $testName; //extra ontvanger toevoegen $_POST['mail'].','.
	$from = 'tristand101006@student.gtibeveren.be';
	$fromName = 'GTI - EHBO';
 
	$subject = "Inschrijving kaas- en wijnavond GTI"; 
 
	$htmlContent = 
    '<html> 
    <head> 
        <title>Ontbreken EHBO doosjes</title> 
    </head> 
    <body> 
        
        <p>inschrijving van '.$_SESSION["Ontbrekend"].'</p>
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

?>