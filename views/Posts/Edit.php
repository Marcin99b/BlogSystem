<!-- Menu -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="Index"><?= $this -> blogTitle ?></a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li><a href="Posts">Lista postów</a></li>
          <li><a href="Posts/Add">Dodaj post</a></li>
          <li class="active"><a href="Posts/Edit">Edytuj post</a></li>
          <li><a href="Posts/Delete">Usuń post</a></li>
          <li><a href="Index/Blog">Przejdź do bloga</a></li>
        </ul>
        <form class="navbar-form navbar-left">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Szukaj">
          </div>
          <button type="submit" class="btn btn-default">Szukaj posta</button>
        </form>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>
</header>

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
