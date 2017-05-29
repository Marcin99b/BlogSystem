<?php require_once 'views/MenuElements/StartTemplate.php' ?>
          <li class="active"><a href="Posts">Lista postów</a></li>
          <li><a href="<?= $this -> path; ?>/Posts/Add">Dodaj post</a></li>
          <li><a href="<?= $this -> path; ?>/Posts/Edit">Edytuj post</a></li>
          <li><a href="<?= $this -> path; ?>/Posts/Delete">Usuń post</a></li>
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
