<?php require_once 'views/MenuElements/StartTemplate.php' ?>
          <li class="active"><a href="<?= $this -> path; ?>">Strona główna</a></li>
          <li><a href="<?= $this -> path; ?>/Index/AboutMe">O mnie</a></li>
          <li><a href="<?= $this -> path; ?>/Index/Contact">Kontakt</a></li>
          <?php
            if(isSet($_SESSION['logged']))
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
              echo '<li class="active"><a href="Index/Blog/Page/'. $i .'">'. $i .'<span class="sr-only"></span></a></li>';
            else
              echo '<li class="default"><a href="Index/Blog/Page/'. $i .'">'. $i .'<span class="sr-only"></span></a></li>';
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
