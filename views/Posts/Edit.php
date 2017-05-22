<?php require_once 'views/MenuElements/StartTemplate.php' ?>
          <li><a href="Posts">Lista postów</a></li>
          <li><a href="Posts/Add">Dodaj post</a></li>
          <li class="active"><a href="Posts/Edit">Edytuj post</a></li>
          <li><a href="Posts/Delete">Usuń post</a></li>
          <li><a href="Index/Blog">Przejdź do bloga</a></li>
<?php require_once 'views/MenuElements/EndTemplate.php' ?>

<style>
    .add-post-input
    {
        clear: both;
        width: 90%;
        resize: none;
        margin-left: 5%;
        margin-right: 5%;
    }
</style>

<form method="post" style="width: 100vw; margin-top: 60px;">
  <input class="btn btn-default add-post-input" type="text" name="postId" placeholder="ID posta"/>
  <input class="btn btn-default add-post-input" type="text" name="title" placeholder="Tytuł"/>
  <textarea class="form-control add-post-input" style="height: 70vh;"  name="content" placeholder="Zawartość posta" contenteditable="true"></textarea>
  <input class="btn btn-default add-post-input" type="text" name="footer" placeholder="Stopka"/>
  <input class="btn btn-default add-post-input" type="submit" value="Dodaj post"/>
</form>
