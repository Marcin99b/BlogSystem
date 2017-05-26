<?php require_once 'views/MenuElements/StartTemplate.php' ?>
          <li><a href="<?= $this -> path; ?>">Strona główna</a></li>
          <li><a href="<?= $this -> path; ?>/Index/AboutMe">O mnie</a></li>
          <li class="active"><a href="<?= $this -> path; ?>/Index/Contact">Kontakt</a></li>
          <?php
            if(isSet($_SESSION['logged']))
            {
              echo '<li><a href="'.$this -> path.'/Posts/List">Zarządzaj postami</a></li>';
            }
          ?>
        </ul>
<?php require_once 'views/MenuElements/EndTemplate.php' ?>

<!-- Contact -->

<?php
require_once 'views/contact.php';
