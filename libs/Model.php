<?php

class Model
{
  function __construct()
  {
    try
    {
      require_once 'config/config.php';

      $this -> pdo = new PDO( 'mysql:host='. $hostname .';dbname=' . $dbname . ';encoding='. $encoding .';',
        $login, $password,
        array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
      $this -> path = $path;
    }
    catch (exception $e)
    {
      $this -> pageTitle = 'Zła konfiguracja połączenia';
      require_once 'views/Header.php';
      require_once 'views/BadConfig.php';
      require_once 'views/Footer.php';
      exit ();
    }
  }

}
