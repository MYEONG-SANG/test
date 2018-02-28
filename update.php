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
   if(isset($_GET['id'])){
    $sql = "SELECT * FROM topic WHERE id = {$_GET['id']}";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $article['title'] = htmlspecialchars($row['title']);
    $article['description'] = htmlspecialchars($row['description']);


    $update_link = '<a href ="update.php?id='.$_GET['id'].'">update</a>';
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
    <h3>preposition </h3>
    <?= $list?>
       <!-- 왜 이런식으로 php 두개로 나누느거지? -->
    <a href ="create.php">create</a>
    <?= $update_link ?>
  </ol>



  <div id ="article">
  <!-- <h2>Welcome to Dictionary</h2> -->
  <!-- <img src="in.jpg"width ="100"> -->
    <form action="update_process.php" method="post">
      <input type="hidden" name="id" value="<?=$_GET['id']?>">
      <p>
        <input type="text" name="title" placeholder="Title" value="<?=$article['title']?>">
      </p>
      <p>
        <textarea name="description" placeholder="Description"><?= $article['description']?>;
        </textarea>
      </p>
      <p>
        <input type="submit">
      </p>
    </form>
  </div>
</div>

<?php
require_once('view/bottom.php');
 ?>
