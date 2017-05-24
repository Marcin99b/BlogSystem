<?php

class Redirect
{
  function __construct()
  {
    $this -> path = 'http://' .$_SERVER['HTTP_HOST']. rtrim($_SERVER['PHP_SELF'], '/index.php');
    echo $this -> path;
  }
  public function account()
  {
    Header('location:'. $this -> path . '/Account');
  }

  public function configuration()
  {
    Header('location:'. $this -> path . '/Configuration');
  }

  public function group()
  {
    Header('location:'. $this -> path . '/Group');
  }

  public function homePage()
  {
    Header('location:'. $this -> path . '/Index');
  }

  public function posts()
  {
    Header('location:'. $this -> path . '/Posts');
  }
}
