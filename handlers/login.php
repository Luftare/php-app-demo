<?php
include '../session.php';
include '../db.php';

$post_name = $_POST['name'];
$post_password = $_POST['password'];
$valid_credentials = validCredentials($post_name, $post_password);

if($valid_credentials) {
  $_SESSION['name'] = $post_name;
  header("location:/index.php");
} else {
  echo '
    <h4>Wrong username or password</h4>
    <a href="/login.php">Back to login</a>
  ';
}
?>

