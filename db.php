
<?php
include 'env.php';

$db_host = 'localhost';
$db_port = '3306';
$db_username = $mysql_username;
$db_password = $mysql_password;
$db_primaryDatabase = 'App';
$db_conn = new mysqli($db_host, $db_username, $db_password, $db_primaryDatabase);

if (mysqli_connect_errno()) {
  printf("Could not connect to MySQL databse: %s\n", mysqli_connect_error());
  exit();
}

if($db_conn->connect_error)
    die('connection error: '.$db_conn->connect_error);

function validCredentials($username, $password) {
  $sql = "SELECT name, password FROM User WHERE '$username'=name";
  $result = $GLOBALS["db_conn"]->query($sql);
  $user = $result->fetch_assoc();
  $hashed_password = $user["password"];
  return password_verify($password, $hashed_password);
}
?>