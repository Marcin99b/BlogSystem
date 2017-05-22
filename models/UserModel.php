<?php

class UserModel extends Model
{
  function __construct()
  {
    parent::__construct();

  }

  public function loginUser($login, $password)
  {
    if (isSet($login) && isSet($password))
    {
      //Select password (and permission) as login in form
      //Script get permission, because this isn't dangerous, and one query is faster than two
      $loginConnect = $this -> pdo->prepare( 'SELECT password, permission FROM `users` WHERE login = :login' );
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
        //Add permission
        $_SESSION['permission'] = $resultLogin['permission'];
      }
    }
    header("Location: " . $this -> path);
  }
  public function logoutUser()
  {
    unset($_SESSION['logged']);
    unset($_SESSION['userLogin']);
    unset($_SESSION['permission']);

    header("Location: " . $this -> path);
  }

  public function addUser()
  {

  }

  public function selectUser()
  {

  }

  public function editUser()
  {

  }

  public function deleteUser()
  {

  }

}
