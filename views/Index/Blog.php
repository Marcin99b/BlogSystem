<?php require_once 'views/MenuElements/StartTemplate.php' ?>
          <li class="active"><a href="<?= $this -> path; ?>">Strona główna</a></li>
          <li><a href="<?= $this -> path; ?>/Index/AboutMe">O mnie</a></li>
          <li><a href="<?= $this -> path; ?>/Index/Contact">Kontakt</a></li>
          <?php
            if(isset($_SESSION['logged']))
            {
              echo '<li><a href="'.$this -> path.'/Posts/List">Zarządzaj postami</a></li>';
            }
          ?>
<?php require_once 'views/MenuElements/EndTemplate.php' ?>

<!-- Posts -->
<div id="post-area">
  <?php
    foreach ($this -> posts as $value)
    {
      echo '
      <article>
        <div class="post">

          <header>
            <div class="post-title">'. $value['title'] .'</div>
          </header>

          <div class="post-date"><time>'. $value['date'] .'</time></div>
          <div class="post-content">'. $value['content'] .'</div>

          <footer>
            <div class="post-footer">'. $value['footer'] .'</div>
          </footer>

        </div>
      </article>';
    }
  ?>
</div>

<?php require_once 'views/MenuElements/Pagination.php' ?>
