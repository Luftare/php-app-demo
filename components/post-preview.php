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
      <div class="post__header">
        <div class="post__avatar" title="'.$username.'">'.substr($username, 0, 1).'</div>
        <div class="post__text-container">
          <div class="post__description">'.$description .'</div>
          <div class="post__date">'.$time.'</div>
        </div>
      </div>
      <img src="/uploads/' .$imageName. '" class="post__image"/>
    </div>
    ';
}

function renderPostPreviewStyles() {
  return '
    .posts-container {
      display: flex;
      flex-wrap: wrap;
      margin: -16px;
    }

    .post {
      display: block;
      position: relative;
      background-color: white;
      margin: 16px;
      padding: 10px;
    }

    .post__image {
      width: 100%;
      max-width: 600px;
    }

    .post__header {
      display: flex;
      margin-bottom: 8px;
    }

    .post__avatar {
      display: flex;
      justify-content: center;
      align-items: center;
      font-size: 24px;
      width: 40px;
      height: 40px;
      background-color: green;
      color: white;
      flex-shrink: 0;
      cursor: pointer;
    }

    .post__text-container {
      display: flex;
      flex-direction: column;
      margin-left: 8px;
      height: auto;
    }

    .post__description {
      font-weight: 700;
    }

    .post__date {
      font-size: 14px;
      color: grey;
      margin-top: auto;
    }

    .post form {
      margin: 0;
      position: absolute;
      right: 0;
      bottom: 0;
      opacity: 0.3;
    }

    .post form:hover {
      opacity: 1;
    }
  ';
}
?>