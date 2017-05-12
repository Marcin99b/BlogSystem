<?php

class PostModel extends Model
{
  function __construct()
  {
    parent::__construct();
  }

  public function addPost($title = null, $content = null, $footer = null)
  {
    if ($title != null && $content != null)
    {
    $date = getdate(date("U"));
      $day = $date['mday'];
      $month = $date['mon'];
      $year = $date['year'];
      if ($day < 10) $day = '0' .  (string)$day;
      if ($month < 10) $month = '0' . (string)$month;
      $dateToAdd = $day . "." . $month . "." . $year;

    //Edit textarea value
    $text = trim($content);
      $textAr = explode("\n", $text);
      $textAr = array_filter($textAr, 'trim');
      $content = '';
      foreach ($textAr as $line)
      {
      $content .= $line . '<br>';
      }

    // Add to database
    $postToAdd = $this -> pdo-> prepare('INSERT INTO `posts`(`title`, `date`, `content`, `footer`) VALUES (:title, :datetime, :content, :footer)');
      $postToAdd->bindParam(':title', $title );
      $postToAdd->bindParam(':datetime', $dateToAdd );
      $postToAdd->bindParam(':content', $content );
      $postToAdd->bindParam(':footer', $footer );
      $postToAdd->execute();

    }
  }

  public function selectPost($query)
  {
    $postToSelect = $this -> pdo ->query($query);
    return $postToSelect;
  }


  public function updatePost($id = null, $title = null, $content = null, $footer = null)
  {
    if ($id != null)
    {
      //Edit textarea value
      $text = trim($_POST['content']);
        $textAr = explode("\n", $text);
        $textAr = array_filter($textAr, 'trim');
        $content = '';
        foreach ($textAr as $line)
        {
          $content .= $line . '<br>';
        }
      // Add to database
      $postToUpdate = $this -> pdo -> prepare( ' UPDATE `posts` SET `title` = :title,`content` = :content,`footer` = :footer WHERE id = :postid ' );
        $postToUpdate->bindParam( ':postid', $id );
        $postToUpdate->bindParam( ':title', $title );
        $postToUpdate->bindParam( ':content', $content );
        $postToUpdate->bindParam( ':footer', $footer );
        $postToUpdate->execute();
    }
  }

  public function deletePost($id = null)
  {
    if($id != null)
    {
    //Delete from database
    $postToDelete = $this -> pdo -> prepare(' DELETE FROM `posts` WHERE id = :postid ');
        $postToDelete->bindParam( ':postid', $id);
        $postToDelete->execute();
    }
  }

  public function pagination($id = 1)
  {
    if($id == 1) $fromPage = 0;
    else $fromPage = ($id -1) * 10;

    $countPost = $this -> pdo ->query('SELECT COUNT(id) AS countPost FROM `posts`')->fetch()['countPost'];

    $numberPage = 10;

    if(($fromPage + $numberPage) > $countPost) $numberPage = $countPost - $numberPage;

    $maxPage = round($countPost/10);
    if($maxPage < $countPost) $maxPage++;

    $pageInfo =
    [
      'from' => $fromPage,
      'number' => $numberPage,
      'max' => $maxPage
    ];

    return $pageInfo;
  }

}
