<?php

class Posts extends Controller
{
  function __construct($params)
  {
    parent::__construct();

    require_once 'models/PostModel.php';
    $this -> model = new PostModel();

    $this -> view -> controller = "Posts";
    //Get params from url. If params == null, use default value
    $this -> view -> page = "List";
    if(isSet($params[1])) $this -> view -> page = $params[1];

    $this -> pageMethodParam = "1";
    if(isSet($params[3])) $this -> pageMethodParam = $params[3];

    $action = $this -> view -> page;
    $this -> $action($this -> pageMethodParam);
  }

  private function add($id)
  {
    //use this method only if user write 'title' of post
    if(isSet($_POST['title']))
    {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $footer = $_POST['footer'];

    $this -> model -> addPost($title, $content, $footer);
    }

    $this -> view -> pageTitle = $this -> blogName . " - Dodaj post";
    $this -> view -> render();
  }

  private function list($id)
  {
    //Get info about pages
    $pagesInfo = $this -> model -> pagination($id);
    //Use info about pages, and get correct posts from database
    $fromPage = $pagesInfo['from'];
    $numberPage = $pagesInfo['number'];

    $show = $this -> model -> selectPost('SELECT * from `posts` ORDER BY id DESC LIMIT '. $fromPage .', '. $numberPage .'  ');
    $this -> view -> pageId = $id;
    $this -> view -> maxPage = $pagesInfo['max'];

    $this -> view -> posts = $show;
    $this -> view -> pageTitle = $this -> blogName . " - Lista postów";
    $this -> view -> render();
  }

  private function edit($id)
  {
    //use this method only if user write 'id' of post
    if(isSet($_POST['postId']))
    {
    $id = $_POST['postId'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $footer = $_POST['footer'];

    $this -> model -> updatePost($id, $title, $content, $footer);
    }


    $this -> view -> pageTitle = $this -> blogName . " - Edytuj post";
    $this -> view -> render();
  }
  private function delete($id)
  {
    //Get info about pages
    $pagesInfo = $this -> model -> pagination($id);
    //Use info about pages, and get correct posts from database
    $fromPage = $pagesInfo['from'];
    $numberPage = $pagesInfo['number'];

    $show = $this -> model -> selectPost('SELECT * from `posts` ORDER BY id DESC LIMIT '. $fromPage .', '. $numberPage .'  ');
    $this -> view -> pageId = $id;
    $this -> view -> maxPage = $pagesInfo['max'];

    //use this method only if user write 'id' of post
    if(isSet($_POST['deleteId']))
    {
    $id = $_POST['deleteId'];

    $this -> model -> deletePost($id);
    header("Refresh:0");
    }
    $this -> view -> posts = $show;
    $this -> view -> pageTitle = $this -> blogName . " - Usuń post";
    $this -> view -> render();
  }

}
