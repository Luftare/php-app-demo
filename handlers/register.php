<?php
include '../session.php';
include '../db.php';

$post_name = $_POST["name"];
$post_password = $_POST["password"];
$sql = "INSERT INTO User(name, password) VALUES('".$post_name."', '".$post_password."')";

$result = $db_conn->query($sql);

if($result > 0) {
  $_SESSION['name'] = $post_name;
  header("location:/");
} else {
  echo "<h4>Username: '$post_name' already taken!</h4>";
  echo '<a href="/login">Back</a>';
}
?>