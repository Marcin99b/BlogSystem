<?php

class ConfigModel extends Model
{
  function __construct()
  {
    parent::__construct();

    if($this -> configWorking && !isset($_SESSION['logged']))
      header("Location: " . $this -> path);
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

  public function createTablesInDatabase()
  {

    $createTables = $this -> pdo -> query('
      CREATE TABLE '. $this -> dbname .'.`posts` (
      `id` INT NOT NULL AUTO_INCREMENT ,
      `title` VARCHAR(300) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL ,
      `date` VARCHAR(10) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL ,
      `content` VARCHAR(3000) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL ,
      `footer` VARCHAR(300) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL ,
      `keySentence` VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL DEFAULT "Brak",
      `autorId` INT NOT NULL ,
      PRIMARY KEY (`id`)) ENGINE = InnoDB;



      CREATE TABLE '. $this -> dbname .'.`users` (
      `id` INT NOT NULL AUTO_INCREMENT , `login` VARCHAR(100) NOT NULL ,
      `password` VARCHAR(255) NOT NULL ,
      `permission` INT NOT NULL DEFAULT "4" ,
      PRIMARY KEY (`id`)) ENGINE = InnoDB;');

    header('location: '. $this -> path);
  }
  public function createTestData()
  {
    $hashPassword = password_hash('admin', PASSWORD_BCRYPT);

    $createTestData = $this -> pdo -> prepare('
      INSERT INTO `posts` (`title`, `date`, `content`, `footer`, `keySentence`, `autorId`)
      VALUES ("test", "00.00.00", "test", "test", "Test", "0");

      INSERT INTO `users` (`login`, `password`, `permission`)
      VALUES ("admin", :password, "1");
      ');
      $createTestData -> bindParam(':password', $hashPassword);
      $createTestData -> execute();

    header('location: '. $this -> path);
  }
}
