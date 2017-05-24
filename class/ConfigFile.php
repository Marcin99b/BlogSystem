<?php

class ConfigFile
{
  function __construct()
  {

  }
  public function createNewConfigFile($configParams)
  {
    $configDirectory = 'config';
    $configFileName = 'config.php';
    $configFilePath = $configDirectory . '/' . $configFileName;

    //Create folder if not exist
    if(!file_exists($configDirectory))
      mkdir($configDirectory);

    //Create or update config file
    $newConfigFile = fopen($configFilePath, 'w');
    //Prepare text to write
    $textConfigFile =
      '<?php
      //Configuration

      //Login to database
      $hostname = "'. $configParams['hostname'] .'"; // - Nazwa hosta (np localhost)
      $dbname   = "'. $configParams['dbname'] .'"; // - NazwaBazyDanych
      $login    = "'. $configParams['login'] .'"; // - Nazwa użytkownika, np root
      $password = "'. $configParams['password'] .'"; // - Hasło użytkownika, jeśli nie posiada, zostaw puste
      $encoding = "'. $configParams['encoding'] .'"; // - system kodowania, domyślnie utf-8';
    //Write text to file, and close file
    fwrite($newConfigFile, $textConfigFile);
    fclose($newConfigFile);
  }
}
