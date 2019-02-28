<?php
include $_SERVER['DOCUMENT_ROOT'] . '/../exports/session.php';
include $_SERVER['DOCUMENT_ROOT'] . '/../exports/require-session.php';
include $_SERVER['DOCUMENT_ROOT'] . '/../exports/db.php';

$post_fileName = $_POST["fileName"];
$filePath = $_SERVER['DOCUMENT_ROOT'] . "/uploads/". $post_fileName;
unlink($filePath);
$delete_post_sql = "DELETE FROM Post WHERE fileName='".$post_fileName."'";
$db_conn->query($delete_post_sql);
header("location:/");
?>