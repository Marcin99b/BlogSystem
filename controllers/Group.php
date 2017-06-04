<?php

class Group extends Controller
{
  function __construct($params)
  {
    parent::__construct();
    require_once 'models/GroupModel.php';
    $this -> model = new GroupModel();

    $this -> view -> controller = "Group";
    //Get params from url. If params == null, use default value
    $this -> view -> page = "Index";
    if(isset($params[1])) $this -> view -> page = $params[1];

    $action = $this -> view -> page;
    $this -> $action();
  }

  private function index()
  {
	  $this -> view -> render();
  }

}
