<?php
include $_SERVER['DOCUMENT_ROOT'] . '/exports/session.php';
include $_SERVER['DOCUMENT_ROOT'] . '/exports/require-session.php';
include $_SERVER['DOCUMENT_ROOT'] . '/exports/db.php';
include $_SERVER['DOCUMENT_ROOT'] . '/functions/resize.php';

$target_dir = $_SERVER['DOCUMENT_ROOT'] . "/uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 10000000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
      $imgData = resizeImage( $target_file, 600, 600);
      $fileName = rand(0, 9999999999999) . ".png";
      $resizedFilename = $_SERVER['DOCUMENT_ROOT'] . "/uploads/". $fileName;
      imagepng($imgData,  $resizedFilename);
      unlink($target_file);
      $insert_image_sql = "INSERT INTO Image(fileName, username) VALUES('".$fileName."', '".$logged_user_name."')";
      $db_conn->query($insert_image_sql);
      echo "The file ". basename($_FILES["fileToUpload"]["name"]). " has been uploaded as: " .$fileName;
      header("location:/");
    } else {
      echo "Sorry, there was an error uploading your file.";
    }
}
?>