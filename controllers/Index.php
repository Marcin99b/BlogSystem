<?php

class Index extends Controller
{
  function __construct($params)
  {
    parent::__construct();
    require_once 'models/PostModel.php';
    $this -> model = new PostModel();

    $this -> view -> controller = "Index";

    $this -> view -> page = "Blog";
    if(isSet($params[1])) $this -> view -> page = $params[1];

    $this -> pageMethod = "Page";
    if(isSet($params[2])) $this -> pageMethod = $params[2];

    $this -> pageMethodParam = "1";
    if(isSet($params[3])) $this -> pageMethodParam = $params[3];

    $this -> blogName = 'MyBlog';
    $this -> view -> blogTitle = $this -> blogName;

    $action = $this -> view -> page;
    $this -> $action($this -> pageMethod, $this -> pageMethodParam);
  }

  private function blog($method, $id)
  {
    $pagesInfo = $this -> model -> pagination($id);

    $fromPage = $pagesInfo['from'];
    $numberPage = $pagesInfo['number'];

    $show = $this -> model -> selectPost('SELECT * from `posts` ORDER BY id DESC LIMIT '. $fromPage .', '. $numberPage .'  ');
    $this -> view -> pageId = $id;
    $this -> view -> maxPage = $pagesInfo['max'];

    $this -> view -> posts = $show;
    $this -> view -> pageTitle = $this -> blogName . ' - Strona główna';
    $this -> view -> render();
  }
  private function contact()
  {
    $this -> view -> pageTitle = $this -> blogName . ' - Kontakt';
    $this -> view -> render();
  }

  private function aboutMe()
  {
    $this -> view -> pageTitle = $this -> blogName . ' - O mnie';
    $this -> view -> render();
  }


}
