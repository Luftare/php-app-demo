<?php
include $_SERVER['DOCUMENT_ROOT'] . '/../exports/session.php';
include $_SERVER['DOCUMENT_ROOT'] . '/../exports/require-session.php';
include $_SERVER['DOCUMENT_ROOT'] . '/../exports/db.php';
include $_SERVER['DOCUMENT_ROOT'] . '/../sections/header.php';
include $_SERVER['DOCUMENT_ROOT'] . '/../components/post-preview.php';
?>
<h4>What's going on?</h4>
<form action="handlers/create-post" method="post" enctype="multipart/form-data" id="new-image-form">
  <textarea form="new-image-form" name="description" placeholder="What's up?" required></textarea>
  Select image to upload:
  <input type="file" name="fileToUpload" id="fileToUpload" required>
  <input type="submit" value="Upload Image" name="submit">
</form>
<div class="posts-container">
<?php
  $all_posts_sql = 'SELECT imageName, username, description, ts FROM Post ORDER BY ts DESC LIMIT 10';
  $result = $db_conn->query($all_posts_sql);
  while($row = $result->fetch_assoc()) {
    echo renderPostPreview($logged_user_name, $row['username'], $row['description'], $row['imageName'], $row['ts']);
  }
?>
</div>
<style>
#new-image-form > textarea {
  display: block;
  width: 100%;
  margin-bottom: 16px;
}
<?php  echo renderPostPreviewStyles(); ?>
</style>