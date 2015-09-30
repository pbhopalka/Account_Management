<?php
  //Destroying the current session
  session_start();
  session_destroy();
  unset($_SESSION['login_user']);
  echo 'You have been logged out';
  header('Location: index.php');
?>
