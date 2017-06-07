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

  protected function pagination($thisPageId)
  {
  	//Get info about pages
  	$pagesInfo = $this -> model -> pagination($thisPageId);
  	//Use info about pages, and get correct posts from database
  	$fromPage = $pagesInfo['from'];
  	$numberPage = $pagesInfo['number'];

  	$show = $this -> model -> select($fromPage, $numberPage);

  	$this -> view -> pageId = $thisPageId;
  	$this -> view -> maxPage = $pagesInfo['max'];

  	$this -> view -> posts = $show;
  }
}
