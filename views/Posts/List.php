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
      <td>'. $value['authorName'] .'</td>
      </tr>';
    }
  ?>

</table>

<?php require_once 'views/MenuElements/Pagination.php' ?>
