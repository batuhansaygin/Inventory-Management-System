<?php 	

$localhost = "localhost";
$username = "bakim";
$password = "baer1234";
$dbname = "baerlocher";

// db connection
$connect = new mysqli($localhost, $username, $password, $dbname);
// check connection
if($connect->connect_error) {
  die("Bağlantı Başarısız : " . $connect->connect_error);
} else {
  // echo "Başarıyla Bağlandı";
}

?>