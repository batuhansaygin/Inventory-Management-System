<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {
	$edituserName = $_POST['edituserName'];
	$editPassword = md5($_POST['editPassword']);
	$userid 	  = $_POST['userid'];

				
	$sql = "UPDATE users SET username = '$edituserName', password = '$editPassword' WHERE user_id = $userid ";

	if($connect->query($sql) === TRUE) {
		$valid['success'] = true;
		$valid['messages'] = "Başarıyla değiştirildi.";	
	} else {
		$valid['success'] = false;
		$valid['messages'] = "Değiştirilirken bir hata ile karşılaşıldı.";
	}

} // /$_POST
	 
$connect->close();

echo json_encode($valid);
 
