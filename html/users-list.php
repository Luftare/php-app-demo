<?php
include $_SERVER['DOCUMENT_ROOT'] . '/../exports/session.php';
include $_SERVER['DOCUMENT_ROOT'] . '/../exports/require-session.php';
include $_SERVER['DOCUMENT_ROOT'] . '/../exports/db.php';
include $_SERVER['DOCUMENT_ROOT'] . '/../sections/header.php';

$sql = "SELECT name, password FROM User";
$result = $db_conn->query($sql);

while($row = $result->fetch_assoc()) {
  echo $row["name"]." : ".$row["password"]."<br>";
}

$db_conn->close();
?>