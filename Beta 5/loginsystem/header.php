<?php

session_start();

?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
<header>
  <?php
    if (isset($_SESSION['k_email'])) {
      echo '<form action="includes/logout.inc.php" method="post">
            <button type="submit" name="submit">Ausloggen</button>
        </form>';
    } else {
      echo '<form action="includes/login.inc.php" method="post">
              <input type="text" name="email" placeholder="E-Mail">
              <input type="password" name="pwt" placeholder="Ihr Passwort">
              <button type="submit" name="submit">Login</button>
            </form>
            <a href="signup.php">Registrieren</a>';
    }
  ?>
</header>
