<?php

class Router
{
  function __construct()
  {
    $this -> request = $_GET['url'];
    $this -> request = rtrim($this -> request, "/");
    $this -> params =  explode("/", $this -> request);

    $this -> controller = $this -> params[0];
    if($this -> controller == "index.php") $this -> controller = "Index";
    $this -> controller = ucfirst($this -> controller);

    $file = 'controllers/' . $this -> controller . '.php';
    if(file_exists($file))
    {
    require_once $file;
    $this -> control = new $this -> controller($this -> params);
    }
    else
    {
      $this -> pageTitle = "Wystąpił błąd";
      require_once 'views/Header.php';
      require_once 'views/NotFound.php';
      require_once 'views/Footer.php';
    }
  }
}
