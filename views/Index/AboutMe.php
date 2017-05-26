<?php require_once 'views/MenuElements/StartTemplate.php' ?>
          <li><a href="<?= $this -> path; ?>">Strona główna</a></li>
          <li class="active"><a href="<?= $this -> path; ?>/Index/AboutMe">O mnie</a></li>
          <li><a href="<?= $this -> path; ?>/Index/Contact">Kontakt</a></li>
          <?php
            if(isSet($_SESSION['logged']))
            {
              echo '<li><a href="'.$this -> path.'/Posts/List">Zarządzaj postami</a></li>';
            }
          ?>
        </ul>
<?php require_once 'views/MenuElements/EndTemplate.php' ?>


<article>
  <div class="post">

    <header>
      <div class="post-title"> Witaj</div>
    </header>
    <div class="post-content">
      Nazywam się Marcin i jestem autorem tej strony.
      <br />Od grudnia 2015 zajmuje się tworzeniem stron internetowych oraz programowaniem.
      <br />Specjalizuję się w pisaniu Back-End do stron, w wolnych chwilach tworzę również aplikacje desktopowe.
      <br />Mimo że większość mojej pracy polega na pisaniu skryptów PHP, znam również inne języki.
      <br />Dość dobrze radzę sobie między innymi z C# albo JavaScriptem.
      <br />Poza tym projektuję również wygląd stron internetowych, co jest na razie konieczne, ponieważ na razie wszystko od podstaw tworzę sam.
      <br /><h4>Moje umiejętności</h4>
      <div class="progress">
       <div class="progress-bar progress-bar-success" role="progressbar" style="width:50%">
         PHP
       </div>
       <div class="progress-bar progress-bar-danger" role="progressbar" style="width:28%">
         C#
       </div>
       <div class="progress-bar progress-bar-info" role="progressbar" style="width:22%">
         HTML/CSS
       </div>
      </div>

      Jednak sporą część swojej pracy w części związanej z efektami wizualnymi,
      <br />skracam sobie, korzystając z frameworka Bootstrap, a czasami również gotowego kodu.
      <br />Dzieje się tak, ponieważ staram się skupiać na części mechanicznej, tak zwanym Back-Endzie, w którym się specjalizuję.
      <br />W przyszłości chciałbym pracować jako programista jedynie Back-Endowy, ponieważ tworzenie wyglądu stron już nie sprawia mi przyjemności.

    </div>

    <footer>
      <div class="post-footer">Jeśli uważasz, że moglibyśmy sobie nawzajem pomóc — kontakt ze mną znajdziesz w zakładce <a href="Index/Contact">Kontakt</a>.</div>
    </footer>

  </div>
</article>
