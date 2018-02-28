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

  $sql = "SELECT * FROM author";
  $result = mysqli_query($conn, $sql);
  $select_form = '<select name="author_id">';
  while ($row = mysqli_fetch_array($result)) {
    $select_form .= '<option value ="'.$row['id'].'">'.$row['name'].'</option>';
  }

 // $select_form = $select_form.'</select>'  아래것과 똑같음
 $select_form .= '</select>';


   // 잘됫는지 확인하는 함수
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

  </ol>


  <div id ="article">
  <!-- <img src="in.jpg"width ="100"> -->
  <p><h1 class ="saw">사용자 사전</h1></P>

  <form action="create_process.php" method="post">
    <p>
      <input type="text" name="title" placeholder="Title">
    </p>
    <p>
      <textarea name="description" placeholder="Description" ></textarea>
    </p>
      <?= $select_form?>
    <p>
      <input type="submit">
    </p>

  </form>

  </div>
</div>
<?php
require_once('view/bottom.php');
 ?>
