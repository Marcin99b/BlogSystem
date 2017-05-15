Jeżeli skrypt nie działa
<ol>
<li>Stwórz w głownym katalogu folder o nazwie 'config'</li>
<li>W nim stwórz plik config.php</li>
<li>Wklej podaną niżej zawartość, a następnie ją uzupełnij</li>
</ol>
<pre>
&lt;?php
//Configuration

//Login to database
$hostname = 'localhost'; // - Nazwa hosta (np localhost)
$dbname = 'MyDatabase'; // - NazwaBazyDanych
$login = 'root'; // - Nazwa użytkownika, np root
$password = ''; // - Hasło użytkownika, jeśli nie posiada, zostaw puste
$encoding = 'utf-8'; // - system kodowania, domyślnie utf-8
</pre>

<form class="form-horizontal" method="post">
  <div class="form-group">
    <label class="control-label col-xs-2">Nazwa hosta</label>
    <div class="col-xs-5">
      <input type="text" class="form-control" id="inputEmail" placeholder="Localhost" name="hostname">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-xs-2">Nazwa bazy danych</label>
    <div class="col-xs-5">
      <input type="text" class="form-control" id="inputPassword" placeholder="MyDatabase" name="dbname">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-xs-2">Login</label>
    <div class="col-xs-5">
      <input type="text" class="form-control" id="inputPassword" placeholder="Root" name="login">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-xs-2">Hasło</label>
    <div class="col-xs-5">
      <input type="password" class="form-control" id="inputPassword" name="password">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-xs-2">Kodowanie</label>
    <div class="col-xs-5">
      <input type="text" class="form-control" id="inputPassword" value="utf-8" name="encoding">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-xs-2"></label>
    <div class="col-xs-5">
      <input type="submit" class="form-control btn-success" id="inputPassword" value="Stwórz/zaktualizuj plik konfiguracyjny">
    </div>
  </div>
</form>
