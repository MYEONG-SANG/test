<?php
  $conn= mysqli_connect(
    "Localhost",
    "root",
    "admin1002",
    "opentutorials");
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
    <p><a href ="index.php">topic</a></p>

  </ol>

    <div id ="article">
      <table border="1">
        <tr>
          <td>id</td><td>name</td><td>profile</td><td></td>
          <?php
            $sql = "SELECT * FROM author";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_array($result)){
              $filtered = array(
                'id' => htmlspecialchars($row['id']) ,
                'name' => htmlspecialchars($row['name']) ,
                'profile' => htmlspecialchars($row['profile']),
             );
              ?>
              <tr>
              <td><?=$filtered['id'] ?></td>
              <td><?=$filtered['name'] ?> </td>
              <td><?=$filtered['profile'] ?> </td>
              <td><a href="author.php?id=<?=$filtered['id']?>">update</a></td>
              <td>
                <form action="delete_process_author.php" method="post"
                onsubmit="if(!confirm('삭제 합니까?')){return false;}">
                  <input type="hidden" name="id" value="<?=$filtered['id']?>">
                  <input type="submit" value="delete">

                </form>

              </td>
            </tr>
              <?php
            }
           ?>

        </tr>
      </table>
      <?php
      $escaped = array(
        'name'=>'',
        'profile'=>''
      );
      $label_submit = 'Create author';
      $form_action = 'create_process_author.php';
      $form_id = '';
      if(isset($_GET['id'])){
        $filtered_id = mysqli_real_escape_string($conn, $_GET['id']);
        settype($filtered_id, 'integer');
        $sql = "SELECT * FROM author WHERE id = {$filtered_id}";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);
        $escaped['name'] = htmlspecialchars($row['name']);
        $escaped['profile'] = htmlspecialchars($row['profile']);
        $label_submit = 'Update author';
        $form_action = 'update_process_author.php';
        $form_id = '<input type="hidden" name="id" value="'.$_GET['id'].'">';
      }
      ?>
  <!-- <img src="in.jpg"width ="100"> -->
      <form action="<?=$form_action?>" method="post">
        <?=$form_id?>
        <p><input type="text" name="name" placeholder="name" value="<?=$escaped['name']?>"></p>
        <p><textarea name="profile" placeholder="profile"><?=$escaped['profile']?></textarea></p>
        <p><input type="submit" value="<?=$label_submit?>"></p>
      </form>


    </div>
  </div>

<?php
require_once('view/bottom.php');
 ?>
