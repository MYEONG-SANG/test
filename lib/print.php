<?php
  function print_title(){
    if(isset( $_GET['id'])){
      echo htmlspecialchars ( $_GET['id']);
    }else{
      echo "<h2>Welcome to Dictionary</h2";

    }
  }

    function print_description(){
      if(isset($_GET['id'])){
        echo htmlspecialchars(file_get_contents("data/".$_GET['id']));
      } else {
        echo "Hello, PHP";

      }
    }
    function print_list(){
      $List = scandir('./data');

      $i = 0 ;
      while ($i < count($List)) {
          $title = htmlspecialchars($List[$i]);
        if($List[$i] != '.') {
          if($List[$i] !='..' ) {
            echo "<li><a href =\"index.php?id=$title\"> $title</a></li>\n";

          }
        }
      $i= $i +1;
      }
    }

?>
