<?php include 'session.php'; ?>
<?php include 'require-session.php'; ?>
<?php include 'header.php'; ?>
<?php include 'db.php'; ?>
<?php

$sql = "SELECT name, password FROM User";
$result = $db_conn->query($sql);

while($row = $result->fetch_assoc()) {
  echo "name: " . $row["name"]. "<br>";
}

$db_conn->close();
?>