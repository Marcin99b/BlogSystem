<?php

class Index extends Controller
{
  function __construct($params)
  {
    parent::__construct();
    require_once 'models/PostModel.php';
    $this -> model = new PostModel();

    $this -> view -> controller = "Index";
    //Get params from url. If params == null, use default value
    $this -> view -> page = "Blog";
    if(isset($params[1])) $this -> view -> page = $params[1];

    $this -> pageMethodParam = "1";
    if(isSet($params[2])) $this -> pageMethodParam = $params[3];

    $action = $this -> view -> page;
    $this -> $action($this -> pageMethodParam);
  }

  private function blog($id)
  {
    //Get info about pages
    $pagesInfo = $this -> model -> pagination($id);
    //Use info about pages, and get correct posts from database
    $fromPage = $pagesInfo['from'];
    $numberPage = $pagesInfo['number'];

    $show = $this -> model -> select($fromPage, $numberPage);
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
