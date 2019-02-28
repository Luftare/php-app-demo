<?php
include $_SERVER['DOCUMENT_ROOT'] . '/../exports/session.php';
include $_SERVER['DOCUMENT_ROOT'] . '/../exports/db.php';

$post_name = mysqli_real_escape_string($db_conn, $_POST["name"]);
$post_password = mysqli_real_escape_string($db_conn, $_POST["password"]);
$hashed_password = password_hash($post_password, PASSWORD_DEFAULT);
$sql = "INSERT INTO User(name, password) VALUES('".$post_name."', '".$hashed_password."')";
$result = $db_conn->query($sql);

if($result > 0) {
  $_SESSION['name'] = $post_name;
  header("location:/");
} else {
  echo "<h4>Username: '$post_name' already taken!</h4>";
  echo '<a href="/login">Back</a>';
}
?>