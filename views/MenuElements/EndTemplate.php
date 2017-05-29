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
    if(isset($_SESSION['logged']))
    {
      echo '<li><a href="'.$this -> path.'/Account/ManageAccount">Zarządzaj kontem: <big><b>'.
      ucfirst($_SESSION['userLogin']).'</b></big></a></li>';
      echo '<li><a href="'.$this -> path.'/Account/logout">Wyloguj się</a></li>';
    }
    else
      echo '<li><a href="'.$this -> path.'/Account/login">Zaloguj się</a></li>';
    ?>
  </ul>
</form>
</div><!-- /.navbar-collapse -->
</div><!-- /.container-fluid -->
</nav>
</header>
