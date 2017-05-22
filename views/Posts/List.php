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
          <li class="active"><a href="Posts">Lista postów</a></li>
          <li><a href="Posts/Add">Dodaj post</a></li>
          <li><a href="Posts/Edit">Edytuj post</a></li>
          <li><a href="Posts/Delete">Usuń post</a></li>
          <li><a href="Index/Blog">Przejdź do bloga</a></li>
        </ul>
        <form class="navbar-form navbar-left">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Szukaj">
          </div>
          <button type="submit" class="btn btn-default">Szukaj posta</button>
        </form>
        <form class="navbar-form navbar-right">
          <ul class="nav navbar-nav">
          <?php
            if(isSet($_SESSION['logged']))
              echo '<li><a href="'.$this -> path.'/Account/ManageAccount">Zarządzaj kontem: <big><b>'.
              ucfirst($_SESSION['userLogin']).'</b></big></a></li>';
              ?>
          </ul>
        </form>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>
</header>

<style>
table
{
  font-size: 15px;
}
</style>

<script>
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>

<table class="table table-hover" style="cursor: pointer; top: 50px; position: absolute;">
  <tr class="success">
    <th>
      <button type="button" class="btn btn-secondary" data-toggle="tooltip" data-placement="right"
      title="Identyfikator posta w bazie danych">
      ID
      </button>
    </th>
    <th>
      <button type="button" class="btn btn-secondary" data-toggle="tooltip" data-placement="right"
      title="Tytuł posta">
      Tytuł
      </button>
    </th>
    <th>
      <button type="button" class="btn btn-secondary" data-toggle="tooltip" data-placement="right"
      title="Data utworzenia posta">
      Data
      </button>
    </th>
    <th>
      <button type="button" class="btn btn-secondary" data-toggle="tooltip" data-placement="right"
      title="Zdanie według którego post jest wyszukiwany">
      Zdanie kluczowe
      </button>
    </th>
    <th>
      <button type="button" class="btn btn-secondary" data-toggle="tooltip" data-placement="right"
      title="Osoba która ostatnio edytowała post">
      Autor
      </button>
    </th>
  </tr>

  <?php
    foreach ($this -> posts as $value)
    {
      echo '
      <tr>
      <td>'. $value['id'] .'</td>
      <td>'. $value['title'] .'</td>
      <td>'. $value['date'] .'</td>
      <td>'. $value['keySentence'] .'</td>
      <td>'. $value['autorId'] .'</td>
      </tr>';
    }

  ?>

</table>


<!-- Posts navigation -->
<nav aria-label="Page navigation" style="position: fixed; bottom: 0px; right: 0px; width: 34px;">
  <ul class="pagination">
    <?php
    if($this -> pageId > 3)
      $i = $this -> pageId - 3;
    else
      $i = 1;

    $maxPage = $this -> maxPage;
    if($maxPage >= 7) $highPage = $i + 6;
    else $highPage = $maxPage;

        for($i; $i <= $highPage; $i++)
        {
          if($highPage <= $maxPage)
          {
            if ($this -> pageId == $i)
              echo '<li class="active"><a href="Posts/List/Page/'. $i .'">'. $i .'<span class="sr-only"></span></a></li>';
            else
              echo '<li class="default"><a href="Posts/List/Page/'. $i .'">'. $i .'<span class="sr-only"></span></a></li>';
          }
          else
          {
            $highPage = $maxPage;
            $i = $highPage - 7;
          }

        }
      ?>
  </ul>
</nav>
