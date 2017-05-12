<?php
/*
class Group extends Controller
{
  function __construct($params)
  {
    parent::__construct();
    require_once 'models/AccountModel.php';
    $this -> model = new AccountModel();

    $this -> view -> controller = "Group";
    $this -> view -> page = "Group";

    if($params[1] != null) $this -> view -> page = $params[1];
    $action = $this -> view -> page;
    $this -> $action();
  }
}
