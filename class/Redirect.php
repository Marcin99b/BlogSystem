<?php

class Redirect
{
  function __construct()
  {
    $this -> path = 'http://' .$_SERVER['HTTP_HOST']. rtrim($_SERVER['PHP_SELF'], '/index.php');
  }
  public function homePage()
  {
    Header('location:'. $this -> path);
  }
}
