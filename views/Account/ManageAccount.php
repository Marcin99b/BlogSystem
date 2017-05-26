<?php require_once 'views/MenuElements/StartTemplate.php' ?>
          <li class="active"><a href="<?= $this -> path; ?>/Account">Zarządzaj kontem</a></li>
          <li class="disabled"><a href="<?= $this -> path; ?>/Account/ManageAccount">Zmień hasło</a></li>
          <li class="disabled"><a href="<?= $this -> path; ?>/Account/ManageAccount">Usuń konto</a></li>
          <?php
            if($this -> adminAccount)
              echo '<li><a href="'. $this -> path .'/Account/ChangePermission">Zarządzaj kontami</a></li>';
          ?>
          <li><a href="<?= $this -> path; ?>/Index">Przejdź do bloga</a></li>
<?php require_once 'views/MenuElements/EndTemplate.php' ?>

<!--Manage form -->
<form class="form-horizontal" method="post" style="margin-top: 60px;">
  <div class="form-group">
    <label class="control-label col-xs-2">Nazwa użytkownika</label>
    <div class="col-xs-5">
      <input type="text" class="form-control" placeholder="Unikatowa nazwa użytkownika" value="<?= $_SESSION['userLogin'] ?>" name="username">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-xs-2">Imię</label>
    <div class="col-xs-5">
      <input type="text" class="form-control" placeholder="Imię" name="name">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-xs-2">Nazwisko</label>
    <div class="col-xs-5">
      <input type="text" class="form-control" placeholder="Nazwisko" name="surname">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-xs-2">Wiek</label>
    <div class="col-xs-5">
      <input type="text" class="form-control" placeholder="Numer od 0 do 99" name="age">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-xs-2">Zainteresowania</label>
    <div class="col-xs-5">
      <input type="text" class="form-control" placeholder="Programowanie, Technologia, Rozwój osobisty" name="hobby">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-xs-2"></label>
    <div class="col-xs-5">
      <input type="submit" class="form-control btn-success" value="Dodaj/zaktualizuj dane swojego konta">
    </div>
  </div>
</form>
