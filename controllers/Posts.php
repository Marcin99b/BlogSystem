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
    if(isset($params[1])) $this -> view -> page = $params[1];

    $this -> pageMethodParam = "1";
    if(isset($params[3])) $this -> pageMethodParam = $params[3];

    $action = $this -> view -> page;
    $this -> $action($this -> pageMethodParam);
  }

  private function add()
  {
    //use this method only if user write 'title' of post
    if(isset($_POST['title']))
    {
	    $title = $_POST['title'];
	    $content = $_POST['content'];
	    $footer = $_POST['footer'];

	    $this -> model -> create($title, $content, $footer);
    }
    $this -> view -> pageTitle = $this -> blogName . " - Dodaj post";
    $this -> view -> render();
  }

  private function list($thisPageId)
  {
    $this -> pagination($thisPageId);

    $this -> view -> pageTitle = $this -> blogName . " - Lista postów";
    $this -> view -> render();
  }

  private function edit($showDataOfPostId)
  {
    //use this method only if user write 'id' of post
    if(isset($_POST['postId']))
    {
	    $id = $_POST['postId'];
	    $title = $_POST['title'];
	    $content = $_POST['content'];
	    $footer = $_POST['footer'];

	    $this -> model -> update($id, $title, $content, $footer);
    }
    $this -> view -> pageTitle = $this -> blogName . " - Edytuj post";
    $this -> view -> render();
  }

  private function delete($thisPageId)
  {
	if(isset($_POST['deleteId']))
	{
		$postToDeleteId = $_POST['deleteId'];
		$this -> model -> delete($postToDeleteId);
	}

	$this -> pagination($thisPageId);

    $this -> view -> pageTitle = $this -> blogName . " - Usuń post";
    $this -> view -> render();
  }

}
