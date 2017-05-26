<?php require_once 'views/MenuElements/StartTemplate.php' ?>
          <li><a href="<?= $this -> path; ?>/Account">Zarządzaj kontem</a></li>
          <li class="disabled"><a href="<?= $this -> path; ?>/Account/ManageAccount">Zmień hasło</a></li>
          <li class="disabled"><a href="<?= $this -> path; ?>/Account/ManageAccount">Usuń konto</a></li>
          <?php
            if($this -> adminAccount)
              echo '<li class="active"><a href="'. $this -> path .'/Account/ChangePermission">Zarządzaj kontami</a></li>';
          ?>
          <li><a href="<?= $this -> path; ?>/Index">Przejdź do bloga</a></li>
<?php require_once 'views/MenuElements/EndTemplate.php' ?>


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
        title="Identyfikator uzytkownika w bazie danych">
        ID
        </button>
      </th>
      <th>
        <button type="button" class="btn btn-secondary" data-toggle="tooltip" data-placement="right"
        title="Nazwa użytkownika">
        Nazwa
        </button>
      </th>
      <th>
        <button type="button" class="btn btn-secondary" data-toggle="tooltip" data-placement="right"
        title="Uprawnienia użytkownika">
        Uprawnienia
        </button>
      </th>
      <th>
        <button type="button" class="btn btn-secondary" data-toggle="tooltip" data-placement="right"
        title="Kliknięcie sprawi zmianę uprawnień na wskazane przez ciebie.
        Jednocześnie możesz zmienić uprawnienia jedynie jednego użytkownika.">
        Ustaw uprawnienia
        </button>
      </th>
      <th>
        <button type="button" class="btn btn-secondary" data-toggle="tooltip" data-placement="right"
        title="Wykonaj wskazaną przez siebie akcję">
        Akcja
        </button>
      </th>
    </tr>
  </thead>
  <tbody>
    <?php

    $permissionName[1] = "Admin";
    $permissionName[2] = "Moderator";
    $permissionName[3] = "Pisarz";
    $permissionName[4] = "Użytkownik";

      foreach ($this -> users as $value)
      {
        echo '
        <tr>
          <td>'. $value['id'] .'</td>
          <td>'. $value['login'] .'</td>
          <td>'. $value['permission'] .'</td>
          <td>
          <form method="post">
                <select name="permission" style="width: 200px;" class="form-control">';

                for($i = 1; $i <= 4; $i++)
                {
                    if($value['permission'] == $i)
                        echo '<option value="'. $i .'" selected>'. $permissionName[$i] .'</option>';
                    else
                        echo '<option value="'. $i .'">' . $permissionName[$i] .'</option>';

                }

        echo '
                </select>
            </td>
            <td>
              <button type="submit" class="btn btn-secondary" data-toggle="tooltip" data-placement="right"
              title="Kliknięcie sprawi zmianę uprawnień na wskazane przez ciebie.">
              Zmień uprawnienia temu użytkownikowi
              </button>
            </td>
          </form>
            </td>
        </tr>';
      }
    ?>
  </tbody>

</table>
