<h4>Have an account? Login:</h4>
<form action="handlers/login" method="post">
  <input name="name" placeholder="name" required/>
  <input name="password" placeholder="password" type="password" required/>
  <input type="submit" />
</form>

<h4>Don't have account? Register:</h4>
<form action="handlers/register" method="post">
<input name="name" placeholder="name" required/>
<input name="password" placeholder="password" type="password" required/>
<input type="submit" />
</form>

<h4>Upload image!</h4>
<form action="handlers/upload-image" method="post" enctype="multipart/form-data">
  Select image to upload:
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="submit" value="Upload Image" name="submit">
</form>