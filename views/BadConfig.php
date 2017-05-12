<div class="alert alert-danger">
<strong>Uwaga!</strong> Wykryto błąd w połączeniu z bazą danych. Sprawdż czy twoja konfiguracja jest poprawna. <br />
</div>

<div class="list-group">
  <a href="#" class="list-group-item active">
    <h4 class="list-group-item-heading">Wejdź w config/config.php i upewnij się czy wszystkie ustawienia są poprawne. <br />
    Zwróć szczególną uwagę na:</h4>
    <p class="list-group-item-text">Nazwę hosta (domyślnie 'localhost')</p>
    <p class="list-group-item-text">Nazwę użytkownika (domyślnie 'root')</p>
    <p class="list-group-item-text">Hasło użytkownika (domyślnie bez hasła)</p>
  </a>
</div>

<div class="list-group">
  <a href="#" class="list-group-item active">
    <h4 class="list-group-item-heading">Sprawdź czy twoja baza danych jest poprawnie skonfigurowana,  <br />
      powinna zawierać poniżej podane tabele, z wskazanymi do nich kolumnami. <br />
      Nazwy kolumn są umieszczone w ' '.</h4>
    <p class="list-group-item-text">posts (komumny: 'id', 'title', 'date', 'content', 'footer', 'keySentence', 'autorID')</p>
    <p class="list-group-item-text">users (komumny: 'id', 'login', 'password', 'permission')</p>
    <p class="list-group-item-text">Kolumny 'id', 'date', 'autorID', 'permission' są liczbowe (INT)</p>
    <p class="list-group-item-text">Kolumny 'title', 'content', 'keySentence', 'login', 'password' są tekstowe (text lub varchar)</p>
    <p class="list-group-item-text">Pamiętaj o nadaniu metody porównywania napisów 'utf-8_polish_ci'</p>
  </a>
</div>

<div class="list-group">
  <a href="#" class="list-group-item active">
    <h4 class="list-group-item-heading">W przypadku nie rozwiązania problemu, mimo poprawnie skonfigurowanego połączenia oraz bazy danych:</h4>
    <p class="list-group-item-text">Skontaktuj się z autorem. (Zalecane)</p>
    <p class="list-group-item-text">Spróbuj samodzielnie zmienić nie działające elementy w kodzie. (Niezalecane, może spowodować trwałe uszkodzenie działania programu)</p>
  </a>
</div>

<?php
require_once 'views/contact.php';
