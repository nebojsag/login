<div>
  <?php if ( isset($_SESSION['username'])) { ?>
	Zdravo, <?= $_SESSION['username'] ?>.
  <?php } else { ?>
    <a href="login.php">Login</a>
  <?php } ?>
</div>