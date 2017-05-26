<?php

class Account extends Controller
{
  function __construct($params)
  {
    parent::__construct();
    require_once 'models/UserModel.php';
    $this -> model = new UserModel();

    $this -> view -> controller = "Account";
    //Get params from url. If params == null, use default value

    $this -> view -> page = "ManageAccount";
    if(isSet($params[1])) $this -> view -> page = $params[1];

    //Always if user isn't logged, page = login
    if(!isSet($_SESSION['userLogin']) && $this -> view -> page != 'Registration')
      $this -> view -> page = "Login";

    if(isSet($_SESSION['logged']))
    {
      $this -> view -> adminAccount = ($_SESSION['permission'] == 1);
      $this -> view -> moderAccount = ($_SESSION['permission'] <= 2);
      $this -> view -> writerAccount = ($_SESSION['permission'] <= 3);
    }

    $action = $this -> view -> page;
    $this -> $action();
  }
  private function login()
  {
    if(isSet($_POST['login']) && isSet($_POST['password']))
    {
      $login = $_POST['login'];
      $password = $_POST['password'];
      $this -> model -> loginUser($login, $password);
    }
    else
      $this -> view -> render();
  }

  private function logout()
  {
    $this -> model -> logoutUser();
  }

  private function registration()
  {
    if(isSet($_POST['login']) && isSet($_POST['password']) && isSet($_POST['passwordConfirm']))
    {
      if($_POST['password'] == $_POST['passwordConfirm'])
      {
        $login = $_POST['login'];
        $password = $_POST['password'];

        $this -> model -> addUser($login, $password);
        $this -> model -> loginUser($login, $password);
      }
    }
    else
      $this -> view -> render();
  }

  private function manageAccount()
  {
    $this -> view -> pageTitle = ucfirst($_SESSION['userLogin']) . ' - Zarządzaj kontem';
    $this -> view -> render();
  }
}
