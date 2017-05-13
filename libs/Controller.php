<?php

class Controller
{
  function __construct()
  {
    $this -> view = new View();
    $this -> view -> path = 'http://' .$_SERVER['HTTP_HOST']. rtrim($_SERVER['PHP_SELF'], '/index.php');
  }
}
