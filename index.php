<?php
  $conn= mysqli_connect(
    "Localhost",
    "root",
    "admin1002",
    "opentutorials");
  $sql = "SELECT * FROM topic";
  $result = mysqli_query($conn, $sql);
  $list = '';
    while ($row = mysqli_fetch_array($result)) {
      // <li> <a href \"index.php?id=\">MySQL</a></li>
      // {$row['id']} 여기서 {} 를 쓰는이유는??
        $escaped_title = htmlspecialchars($row['title']);
        $list =$list."<li><a href = \"index.php?id={$row['id']}\">{$escaped_title}</a></li>";
    }

  $article = array (
    'title'=>'welcome',
    'description'=>'hello'
   );
  $update_link = '';
  $delete_link ='';
  $author ='';
   if(isset($_GET['id'])){
    $filtered_id = mysqli_real_escape_string($conn, $_GET['id']);
    $sql = " SELECT * FROM topic LEFT JOIN author ON topic.author_id = author.id
    WHERE topic.id = $filtered_id ";
    $result = mysqli_query($conn, $sql);
    // echo mysqli_error($conn);에러 확인할떄 쓴다
    $row = mysqli_fetch_array($result);
    // print_r($row);입력값 확인할떄 쓴다
    $article['title'] = htmlspecialchars($row['title']);
    $article['description'] = htmlspecialchars($row['description']);
    $article['name'] = htmlspecialchars($row['name']);


    $update_link = '<a href ="update.php?id='.$_GET['id'].'">update</a>';

    $delete_link ='
      <form action="delete_process.php" method="post"
      onsubmit="if(!confirm(\'삭제 합니까?\')){return false;}">
        <input type="hidden" name="id" value="'.$_GET['id'].'">
        <input type="submit" value="delete">
    </form>';
    //딜리트시 get방식을 쓰지 않는다 링크는 공유될수 있기 떄문이다
    $author = "<p> by {$article['name']}</p>";
  }

   // print_r ($article);
?>



<?php
require_once('view/head.php');
 ?>

  <h1><a href="index.php"title=home>new dictionary</a></h1>

  <input type ="button" value ="night" onclick="
  nightdayhandler(this);
  ">

  <div id="grid">

  <ol>

    <h3>preposition <br>   </h3>
    <a href ="author.php">author</a>
      <p><?= $list ?></p>
       <a href ="create.php">create</a>
       <?= $update_link ?>
       <?=$delete_link?>


  </ol>

    <div id ="article">

  <!-- <img src="in.jpg"width ="100"> -->

  <h2><?= $article['title'] ?></h2>
  <?= $article['description'] ?>
   <!-- <<?= 'by '.$article['name'] ?> -->
  <?=$author ?>


    </div>
  </div>

<?php
require_once('view/bottom.php');
 ?>
