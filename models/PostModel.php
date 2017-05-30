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
    //Prepare data of date
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
    $postToAdd = $this -> pdo-> prepare('INSERT INTO `posts`(`title`, `date`, `content`, `footer`, `autorId`) VALUES (:title, :datetime, :content, :footer, :autorId)');
      $postToAdd->bindParam(':title', $title);
      $postToAdd->bindParam(':datetime', $dateToAdd);
      $postToAdd->bindParam(':content', $content);
      $postToAdd->bindParam(':footer', $footer);
      $postToAdd->bindParam(':autorId', $_SESSION['userId']);
      $postToAdd->execute();

    }
  }
  //Select post (write query in controller)
  public function selectPost($fromPage, $numberPage)
  {
    $postToSelect = $this -> pdo ->query('SELECT *
      from posts INNER JOIN users ON posts.autorId = users.id
      ORDER BY posts.id DESC
      LIMIT '. $fromPage .', '. $numberPage .'');

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

  public function pagination($idCurrentPage = 1)
  {
    /*$idCurrentPage==1 return posts 0-10;
      $idCurrentPage==2 return posts 10-20; etc.*/
    $fromNumberPostInDatabase = ($idCurrentPage -1) * 10;

    //Calc number of pages
    $countPostInDatabase = $this -> pdo ->query('SELECT COUNT(id) AS countPost FROM `posts`')->fetch()['countPost'];

    //Default numbers posts in one page
    $numberPostsToShow = 10;

    //If show last page, and can't show default number of posts, show all others
    if(($fromNumberPostInDatabase + $numberPostsToShow) > $countPostInDatabase)
      $numberPostsToShow = $countPostInDatabase - $fromNumberPostInDatabase;

    $highestNumberInPagination = round($countPostInDatabase/10);
    if($highestNumberInPagination * 10 < $countPostInDatabase)
      $highestNumberInPagination++;

    //Prepare info about pages, to return
    $infoToReturn =
    [
      'from' => $fromNumberPostInDatabase,
      'number' => $numberPostsToShow,
      'max' => $highestNumberInPagination
    ];

    return $infoToReturn;
  }
}
