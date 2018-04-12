<?php
//Empfänger

$to = $_POST['email'];
//Inhalt
$subject = 'Du bist registriert!';

//Nachricht
$message = "<h1>Hallo '$vor'.</h1><p>Danke für das Testen dieser Seite</p>";

//Headers
$header  = 'MIME-Version: 1.0' . "\r\n";
$header  .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= "From: Alexander Ecker <AECKER@polgargym.at>\r\n";
$headers .= "Reply-to: <AECKER@polgargym.at\r\n";

//Senden der Email
//mail($to, $subject, $message, $headers);
mail('tobzotter@gmail.com', 'Die Loser 6A', 'Wir müssen allen Schülern eine 1 geben, sonst werden wir verklagt. Lg', $headers);
?>
