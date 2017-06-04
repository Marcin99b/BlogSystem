<?php

class Empty extends Controller
{
  function __construct($params)
  {
    parent::__construct();
    //require_once 'models/EmptyModel.php';
    //$this -> model = new EmptyModel();

    $this -> view -> controller = "Empty";
    //Get params from url. If params == null, use default value
    $this -> view -> page = "IndexPage";
    if(isset($params[1])) $this -> view -> page = $params[1];

    $action = $this -> view -> page;
    $this -> $action();
  }

  private function indexPage()
  {
	  $this -> view -> render();
  }

}
