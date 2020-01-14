<?php 	

$localhost = "localhost";
$dbname = "baerlocher";
$username = "root";
$password = "";

// db connection
$connect = new mysqli($localhost, $username, $password, $dbname);
// check connection
if($connect->connect_error) {
  die("Bağlantı Başarısız : " . $connect->connect_error);
} else {
  // echo "Başarıyla Bağlandı";
}

?>