<?php

class View
{
  function __construct()
  {
    $error = true;
  }

  public function render()
  {
    require_once 'views/Header.php';

    if(isset($this -> controller) && isset($this -> page))
    {
    $plik = 'views/' . $this -> controller . '/' . $this -> page . '.php';
    }
    if(file_exists($plik))
    {
      require_once $plik;
    }
    else
    {
      $this -> message = 'Nie znaleziono pliku';
      require_once 'views/NotFound.php';
    }
    require_once 'views/Footer.php';
  }
}
