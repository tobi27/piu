<?php

session_start();

if (isset($_POST['submit'])) {
  include 'db_verbindung.inc.php';

  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $pwt = mysqli_real_escape_string($conn, $_POST['pwt']);

  //Fehlersuche
  //Überprüfen, ob Felder leer sind
  if (empty($email) || empty($pwt)) {
    header("Location: ../index.php?login=leer");
    exit();
  } else {
    $sql = "SELECT * FROM kunden WHERE kunden_email='$email'";
    $ergebnis = mysqli_query($conn, $sql);
    $ergebnisCheck = mysqli_num_rows($ergebnis);

    //Den User muss es geben. Sonst kann es keinen Login geben
    if ($ergebnisCheck < 1) {
      header("Location: ../index.php?login=fehler");
      exit();
    } else {
      if ($zeile = mysqli_fetch_assoc($ergebnis)) {
        //Dehashen des Passworts
        $hashedPwtCheck = password_verify($pwt, $zeile['kunden_pwt']);
        if ($hashedPwtCheck == false) {
          header("Location: ../index.php?login=fehler");
          exit();
        } elseif ($hashedPwtCheck == true) {
          //Einloggen des Users
          //$_SESSION, damit der User seine Daten weiter verwenden kann
          $_SESSION['k_id'] = $zeile['kunden_ID'];
          $_SESSION['k_vor'] = $zeile['kunden_vor'];
          $_SESSION['k_nach'] = $zeile['kunden_nach'];
          $_SESSION['k_email'] = $zeile['kunden_email'];
          header("Location: ../index.php?login=erfolreich");
          exit();
        }
      }
    }
  }
} else {
  header("Location: ../index.php?login=fehler");
  exit();
}

?>
