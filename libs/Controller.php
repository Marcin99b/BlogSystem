<?php

class Controller
{
  function __construct()
  {
    $this -> view = new View();
    //Add info about path, to views
    $this -> view -> path = 'http://' .$_SERVER['HTTP_HOST']. rtrim($_SERVER['PHP_SELF'], '/index.php');

    $this -> blogName = 'MyBlog';
    $this -> view -> blogTitle = $this -> blogName;
  }
}
