<?php

class Model
{
  function __construct()
  {
    $this -> path = 'http://' .$_SERVER['HTTP_HOST']. rtrim($_SERVER['PHP_SELF'], '/index.php');
    if(!(strstr(ucfirst(rtrim($_GET['url'], "/")), 'Configuration')))
    {
        try
        {
          require_once 'config/config.php';
          $this -> pdo = new PDO( 'mysql:host='. $hostname .';dbname=' . $dbname . ';encoding='. $encoding .';',
            $login, $password,
            array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
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
}
