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
    if(isset($params[1])) $this -> view -> page = $params[1];

    //Always if user isn't logged, page = login
    if(!isset($_SESSION['userLogin']) && $this -> view -> page != 'Registration')
      $this -> view -> page = "Login";

    if(isset($_SESSION['logged']))
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
    if(isset($_POST['login']) && isset($_POST['password']))
    {
      $login = $_POST['login'];
      $password = $_POST['password'];
      $this -> model -> login($login, $password);
    }
    else
      $this -> view -> render();
  }

  private function logout()
  {
    $this -> model -> logout();
  }

  private function registration()
  {
    if(isset($_POST['login']) && isset($_POST['password']) && isset($_POST['passwordConfirm']))
    {
      if($_POST['password'] == $_POST['passwordConfirm'])
      {
        $login = $_POST['login'];
        $password = $_POST['password'];

        $this -> model -> add($login, $password);
        $this -> model -> login($login, $password);
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

  private function changePermission()
  {
    $show = $this -> model -> select('SELECT id, login, permission FROM `users` ORDER BY permission');
    $this -> view -> users = $show;
    $this -> view -> render();
  }

}
