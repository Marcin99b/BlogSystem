<?php

class ConfigModel extends Model
{
  function __construct()
  {
    parent::__construct();
    require_once 'class/ConfigFile.php';
    $this -> ConfigFile = new ConfigFile();

    if($this -> configWorking && !isSet($_SESSION['logged']))
      header("Location: " . $this -> path);
  }

  public function create($configParams)
  {
    $this -> ConfigFile -> createNewConfigFile($configParams);
  }
}
