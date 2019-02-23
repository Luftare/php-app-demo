<?php
  session_start();

  $user_logged_in = isset($_SESSION['name']);
  $logged_user_name = $user_logged_in ? $_SESSION['name'] : "";
?>