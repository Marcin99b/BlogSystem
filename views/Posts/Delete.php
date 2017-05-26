<?php require_once 'views/MenuElements/StartTemplate.php' ?>
          <li><a href="<?= $this -> path; ?>/Posts">Lista postów</a></li>
          <li><a href="<?= $this -> path; ?>/Posts/Add">Dodaj post</a></li>
          <li><a href="<?= $this -> path; ?>/Posts/Edit">Edytuj post</a></li>
          <li class="active"><a href="<?= $this -> path; ?>/Posts/Delete">Usuń post</a></li>
          <li><a href="<?= $this -> path; ?>/Index/Blog">Przejdź do bloga</a></li>
<?php require_once 'views/MenuElements/EndTemplate.php' ?>

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

<table class="table table-hover " style="cursor: pointer; top: 50px; position: absolute;">
  <thead>
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
        title="Kliknij na przycisk aby wykonać wybraną przez ciebie czynność">
        Akcja
        </button>
      </th>
    </tr>
  </thead>
  <tbody>
    <?php
      foreach ($this -> posts as $value)
      {
        echo '
        <tr>
          <td>'. $value['id'] .'</td>
          <td>'. $value['title'] .'</td>
          <td>
              <form method="post">
                <button type="submit" class="btn btn-default" data-toggle="tooltip" data-placement="right"
                name="deleteId"
                value="'. $value['id'] .'"
                title="Usunięcie sprawi, że że twój post zniknie z bazy danych. Nie będzie można go przywrócić.">
                  Usuń
                </button>
              </form>
          </td>
        </tr>';
      }
    ?>
  </tbody>

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
              echo '<li class="active"><a href="Posts/Delete/Page/'. $i .'">'. $i .'<span class="sr-only"></span></a></li>';
            else
              echo '<li class="default"><a href="Posts/Delete/Page/'. $i .'">'. $i .'<span class="sr-only"></span></a></li>';
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
