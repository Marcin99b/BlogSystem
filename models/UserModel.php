<?php

class UserModel extends Model
{
  function __construct()
  {
    parent::__construct();

  }

  public function login($login, $password)
  {
      //Select password (and permission) as login in form
      //Script get permission, because this isn't dangerous, and one query is faster than two
      $loginConnect = $this -> pdo->prepare( 'SELECT id, password, permission FROM `users` WHERE login = :login' );
        $loginConnect->bindParam(':login', $login);
        $loginConnect->execute();

      //Prepare password from database, to verification in next step
      $resultLogin = $loginConnect->fetch();
      $hash = $resultLogin['password'];

      //Check if password in input is the same as in database
      if(password_verify($password , $hash))
      {
        $_SESSION['logged'] = true;
        $_SESSION['userLogin'] = $login;
        $_SESSION['userId'] = $resultLogin['id'];
        $_SESSION['permission'] = $resultLogin['permission'];
      }
    header("Location: " . $this -> path);
  }
  public function logout()
  {
    unset($_SESSION['logged']);
    unset($_SESSION['userLogin']);
    unset($_SESSION['permission']);
    unset($_SESSION['userId']);

    header("Location: " . $this -> path);
  }

  public function create($login, $password)
  {
    $hashPassword = password_hash($password, PASSWORD_BCRYPT);

    $userToAdd = $this -> pdo->prepare('INSERT INTO `users`(`login`, `password`) VALUES (:login,:password)');
      $userToAdd->bindParam(':login', $login);
      $userToAdd->bindParam(':password', $hashPassword);
      $userToAdd->execute();
  }

  public function select($query)
  {
    $userToSelect = $this -> pdo ->query($query);
    return $userToSelect;
  }

  public function update()
  {

  }

  public function delete($login, $password)
  {

  }

}
