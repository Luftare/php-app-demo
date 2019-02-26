<?php
include $_SERVER['DOCUMENT_ROOT'] . '/exports/session.php';
include $_SERVER['DOCUMENT_ROOT'] . '/exports/require-session.php';
include $_SERVER['DOCUMENT_ROOT'] . '/exports/db.php';
include $_SERVER['DOCUMENT_ROOT'] . '/header.php';

echo "<h4>Hello, $logged_user_name";
?>
<h4>Upload image!</h4>
<form action="handlers/upload-image" method="post" enctype="multipart/form-data">
  Select image to upload:
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="submit" value="Upload Image" name="submit">
</form>

<?php
  $all_images_sql = "SELECT fileName, username FROM Image";
  $result = $db_conn->query($all_images_sql);
  while($row = $result->fetch_assoc()) {
    echo '
      <div>
        ' .($row["username"] == $logged_user_name
          ? '<form method="post" action="/handlers/delete-image">
              <input name="fileName" value="'.$row["fileName"].'" hidden/>
              <input value="delete" type="submit"/>
             </form>'
          : null). '
        <img src="/uploads/' .$row["fileName"]. '"/>
      </div>
      ';
  }
?>