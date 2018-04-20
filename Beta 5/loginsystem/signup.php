<?php
  include_once 'header.php';
?>
  <section>
    <h2>Signup</h2>
    <form action="includes/signup.inc.php" method="post">
      <input type="text" name="vor" placeholder="Vorname">
      <input type="text" name="nach" placeholder="Nachname">
      <input type="text" name="email" placeholder="E-Mail">
      <input type="password" name="pwt" placeholder="Passwort">
      <button type="submit" name="submit">Sign up</button>
    </form>
  </section>

<?php
  include_once 'footer.php';
?>
