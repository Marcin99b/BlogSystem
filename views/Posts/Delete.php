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

<?php require_once 'views/MenuElements/Pagination.php' ?>
