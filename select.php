<?php
$conn= mysqli_connect(
  "Localhost",
  "root",
  "admin1002",
  "opentutorials");
// 1row
$sql = "SELECT * FROM topic  WHERE id = 3 LIMIT 1000";
$result = mysqli_query($conn, $sql);
var_dump($result);
$row= mysqli_fetch_array($result);
echo $row[3];
print_r($row);

print_r($row);
echo $row[0];

//multi row
$sql = "SELECT * FROM topic LIMIT 1000";
$result = mysqli_query($conn, $sql);
$row= mysqli_fetch_array($result);
echo '<h2>'.$row[1].'</h2>';
echo $row[2];

// $row= mysqli_fetch_array($result);
// echo '<h2>'.$row[1].'</h2>';
// echo $row[2];
//
// $row= mysqli_fetch_array($result);
// echo '<h2>'.$row[1].'</h2>';
// echo $row[2];
//
// $row= mysqli_fetch_array($result);
// echo '<h2>'.$row[1].'</h2>';
// echo $row[2];
//
// $row= mysqli_fetch_array($result);
// echo '<h2>'.$row[1].'</h2>';
// echo $row[2];
//
// $row= mysqli_fetch_array($result);
// echo '<h2>'.$row[1].'</h2>';
// echo $row[2];
//
// $row= mysqli_fetch_array($result);
// var_dump($row);


while ($row= mysqli_fetch_array($result)) {
  echo '<h2>'.$row[1].'</h2>';
  echo $row[2];
}
// var_dump(NULL == false)

?>
