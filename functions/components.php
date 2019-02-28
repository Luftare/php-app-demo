<?php
function renderPostPreview($logged_user_name, $username, $description, $imageName, $timestamp) {
  $time =  date('d.m.y H:s', strtotime($timestamp));
  return '
    <div class="post">
      ' .($username == $logged_user_name
        ? '<form method="post" action="/handlers/delete-post">
            <input name="fileName" value="'.$imageName.'" hidden/>
            <input value="delete" type="submit" onclick="return confirm('."'Haluatko varmasti poistaa kuvan?'".')"/>
            </form>'
        : null). '
      <div class="post__description">'.$username.'('.$time.'): '.$description .'</div>
      <img src="/uploads/' .$imageName. '" class="post__image"/>
    </div>
    ';
}
?>