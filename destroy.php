<?php
  session_start();
  session_destroy();
  header('location:../gbgv2/pages/login.php');
  exit;
?>