<?php

class Configuration extends Controller
{
  function __construct($params)
  {
    parent::__construct();
    require_once 'models/ConfigModel.php';
    $this -> model = new ConfigModel();

    $this -> view -> controller = "Configuration";
    $this -> view -> page = "Create";

    if(isSet($params[1])) $this -> view -> page = $params[1];
    $action = $this -> view -> page;
    $this -> $action();
  }
  private function create()
  {
    if(isSet($_POST['hostname']))
    {
      $configParams = [
        'hostname' => $_POST['hostname'],
        'dbname' => $_POST['dbname'],
        'login' => $_POST['login'],
        'password' => $_POST['password'],
        'encoding' => $_POST['encoding'],
      ];
      $this -> model -> createNewConfigFile($configParams);

    }

    $this -> view -> render();
  }
}
