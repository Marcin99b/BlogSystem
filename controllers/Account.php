<?php
/*
class Account extends Controller
{
  function __construct($params)
  {
    parent::__construct();
    require_once 'models/UserModel.php';
    $this -> model = new UserModel();

    $this -> view -> controller = "Account";
    $this -> view -> page = "Account";

    if($params[1] != null) $this -> view -> page = $params[1];
    $action = $this -> view -> page;
    $this -> $action();
  }
}
