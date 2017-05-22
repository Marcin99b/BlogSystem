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
        <a class="navbar-brand" href="#"><?= $this -> blogTitle ?></a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li><a href="<?= $this -> path; ?>">Strona główna</a></li>
          <li><a href="<?= $this -> path; ?>/Index/AboutMe">O mnie</a></li>
          <li class="active"><a href="<?= $this -> path; ?>/Index/Contact">Kontakt</a></li>
          <?php
            if(isSet($_SESSION['logged']))
            {
              echo '<li><a href="'.$this -> path.'/Posts/List">Zarządzaj postami</a></li>';
              echo '<li><a href="'.$this -> path.'/Account/logout">Wyloguj się</a></li>';
            }
            else
              echo '<li><a href="'.$this -> path.'/Account/login">Zaloguj się</a></li>';
          ?>
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

<!-- Contact -->

<?php
require_once 'views/contact.php';
