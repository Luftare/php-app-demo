<?php
include $_SERVER['DOCUMENT_ROOT'] . '/exports/session.php';
include $_SERVER['DOCUMENT_ROOT'] . '/exports/require-session.php';
include $_SERVER['DOCUMENT_ROOT'] . '/header.php';

echo "<h4>Hello, $logged_user_name";
?>
