<?php
$conn= mysqli_connect(
  "Localhost",
  "root",
  "admin1002",
  "opentutorials");

print_r($_POST);

$filtered = array(
    'name' =>mysqli_real_escape_string($conn, $_POST['name']) ,
    'profile'=>mysqli_real_escape_string($conn, $_POST['profile'])
   );

$sql = "
INSERT INTO author
  (name, profile)
  VALUES(
      '{$filtered ['name']}',
      '{$filtered ['profile']}'
  )
";

// die($sql); 기존 sql죽이고 post값 확인할떄 쓴다
$result = mysqli_query($conn, $sql);
if($result === false){
  echo '저장하는 과정에서 문제가 생겼습니다. 관리자에게 말해주세요';
  error_log(mysqli_error($conn));
}else{
  header( 'location: author.php');
 }



 ?>
