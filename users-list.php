<?php
include 'session.php';
include 'require-session.php';
include 'header.php';
include 'db.php';

$sql = "SELECT name, password FROM User";
$result = $db_conn->query($sql);

while($row = $result->fetch_assoc()) {
  echo $row["name"]." : ".$row["password"]."<br>";
}

$db_conn->close();
?>