<?php

class Model
{
  function __construct()
  {
    //Add info about path, to views
    $this -> path = 'http://' .$_SERVER['HTTP_HOST']. rtrim($_SERVER['PHP_SELF'], '/index.php');

    $configFilePath = 'config/config.php';

    $userTryChangeConfig = boolval((strstr(ucfirst(rtrim($_GET['url'], "/")), 'Configuration')));

    if((file_exists($configFilePath)) && !($userTryChangeConfig))
    {
      try
      {
        require_once $configFilePath;

        $this -> pdo = new PDO( 'mysql:host='. $hostname .';dbname=' . $dbname . ';encoding='. $encoding .';',
          $login, $password,
          array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

/*
          //Tables validation (Coming soon)
          $testUserTable = $this -> pdo -> query('');
          $testPostsTable = $this -> pdo -> query('');

          var_dump($testUserTable);
          var_dump($testPostsTable);
*/
          //For working (To change!!)
            $testUserTable = true;
            $testPostsTable = true;

          if($testUserTable && $testPostsTable)
            session_start();
          else
            $this -> badConfig();




      }
      catch (exception $e)
      {
        $showErrorConnection = false;
        if($showErrorConnection)
          echo '<pre>' . $e;
        else
        $this -> badConfig();
      }

    }
    else if (!($userTryChangeConfig))
      $this -> badConfig();
  }

  private function badConfig()
  {
    $this -> pageTitle = 'Zła konfiguracja połączenia';
    require_once 'views/Header.php';
    require_once 'views/BadConfig.php';
    require_once 'views/Footer.php';
    exit ();
  }

}
