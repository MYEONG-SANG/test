<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

<!-- 밖에 따음표와 안에 따음표에 차이는?? \"index.php?id=$List[$i]\" -->
<?php
    function print_list(){
      $List = scandir('./data');
      $i = 0 ;
      while ($i < count($List)) {
        if($List[$i] != '.') {
          if($List[$i] !='..' ) {
            echo "<li><a href =\"index.php?id=$List[$i]\"> $List[$i]</a></li>\n";

          }
        }
      $i= $i +1;
      }
    }
 ?>
 <?php print_list()
?>

<!-- 왜 이런식으로 php 두개로 나누느거지? -->
<a href ="create.php">create</a>
<?php if(isset($_GET['id'])) {?>
<a href ="update.php?id=<?php echo $_GET['id']; ?>">update</a>
<?php     }?>

<!-- 왜 데이터랑 get사이에 .이 필요한가??"data/".$_GET['id' -->

<?php
function print_description(){
  if(isset($_GET['id'])){
    echo file_get_contents("data/".$_GET['id']);
  } else {
    echo "Hello, PHP";

  }
}
  ?>
  </body>
</html>
