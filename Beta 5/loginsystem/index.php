<?php
  include_once 'header.php';
?>
  <section>
    <h2>Home</h2>
    <?php
      if (isset($_SESSION['k_email'])) {
        echo "Hallo " . $_SESSION['k_vor']. ". Du bist eingeloggt!";
      }
    ?>
  </section>
<?php
  include_once 'footer.php';
?>
