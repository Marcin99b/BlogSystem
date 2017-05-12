<?php

class Posts extends Controller
{
  function __construct($params)
  {
    parent::__construct();
    require_once 'models/PostModel.php';
    $this -> model = new PostModel();

    $this -> view -> controller = "Posts";

    $this -> view -> page = "List";
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

  private function add($method, $id)
  {
    if(isSet($_POST['title']))
    {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $footer = $_POST['footer'];

    $this -> model -> addPost($title, $content, $footer);
    }

    $this -> view -> pageTitle = $this -> blogName . " - Add posts";
    $this -> view -> render();
  }

  private function list($method, $id)
  {
    $pagesInfo = $this -> model -> pagination($id);

    $fromPage = $pagesInfo['from'];
    $numberPage = $pagesInfo['number'];

    $show = $this -> model -> selectPost('SELECT * from `posts` ORDER BY id DESC LIMIT '. $fromPage .', '. $numberPage .'  ');
    $this -> view -> pageId = $id;
    $this -> view -> maxPage = $pagesInfo['max'];

    $this -> view -> posts = $show;
    $this -> view -> pageTitle = $this -> blogName . " - List posts";
    $this -> view -> render();
  }

  private function edit($method, $id)
  {
    if(isSet($_POST['postId']))
    {
    $id = $_POST['postId'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $footer = $_POST['footer'];

    $this -> model -> updatePost($id, $title, $content, $footer);
    }


    $this -> view -> pageTitle = $this -> blogName . " - Edit posts";
    $this -> view -> render();
  }
  private function delete($method, $id)
  {
    $pagesInfo = $this -> model -> pagination($id);

    $fromPage = $pagesInfo['from'];
    $numberPage = $pagesInfo['number'];

    $show = $this -> model -> selectPost('SELECT * from `posts` ORDER BY id DESC LIMIT '. $fromPage .', '. $numberPage .'  ');
    $this -> view -> pageId = $id;
    $this -> view -> maxPage = $pagesInfo['max'];



    if(isSet($_POST['deleteId']))
    {
    $id = $_POST['deleteId'];

    $this -> model -> deletePost($id);
    header("Refresh:0");
    }
    $this -> view -> posts = $show;
    $this -> view -> pageTitle = $this -> blogName . " - Delete posts";
    $this -> view -> render();
  }

}
