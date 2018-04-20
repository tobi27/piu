<?php

if (isset($_POST['submit'])) {
  include_once 'db_verbindung.inc.php';

//Schützen der Seite vor Hackern
  $vor = mysqli_real_escape_string($conn, $_POST['vor']);
  $nach = mysqli_real_escape_string($conn, $_POST['nach']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $pwt = mysqli_real_escape_string($conn, $_POST['pwt']);

  //Fehlerverwaltung
  //Überprüfen, ob Felder leer sind
  if (empty($vor) || empty($nach) || empty($email) || empty($pwt)) {
    header("Location: ../signup.php?signup=leer");
    exit();
  } else {
    //Überprüfen, ob die Zeichen richtig sind
    if (!preg_match("/^[a-zA-Z]*$/", $vor) || !preg_match("/^[a-zA-Z]*$/", $nach)) {
      header("Location: ../signup.php?signup=fehlerhaft");
      exit();
    } else {
      //Überprüfen der E-Mail-Adresse
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../signup.php?signup=fehlerhafteEmail");
        exit();
      } else {
        $sql = "SELECT * FROM kunden WHERE kunden_email='$email'";
        $ergebnis = mysqli_query($conn, $sql);
        $ergebnisCheck = mysqli_num_rows($ergebnis);

        //Überprüfen, ob es schon einen User mit der Email gibt
        if ($ergebnisCheck > 0) {
          header("Location: ../signup.php?signup=benutzteEmail");
          exit();
        } else {
          //Hashing des Passworts
          $hashedPwt = password_hash($pwt, PASSWORD_DEFAULT);
          //User wird in die DB eingefügt
          //Preparen der Daten
          $sql2 = "INSERT INTO kunden (kunden_vor, kunden_nach, kunden_email, kunden_pwt) VALUES (?, ?, ?, ?);";
          $stmt = mysqli_stmt_init($conn);
          if (!mysqli_stmt_prepare($stmt, $sql2)) {
            echo "Fehler beim SQL Statement";
          } else {
            mysqli_stmt_bind_param($stmt, "ssss", $vor, $nach, $email, $hashedPwt);
            mysqli_stmt_execute($stmt);
          }
          //include_once 'auto_mail.inc.php';
          header("Location: ../signup.php?signup=erfolgreich");
        }
      }
    }
  }

} else {
  header("Location: ../signup.php");
  exit();
}
?>
