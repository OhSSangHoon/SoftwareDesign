<?php
	include "../db.php";
    
	$uid = $_POST["id"];
	$sql = "SELECT * FROM member WHERE id='$uid'";
	$result = mysqli_query($db, $sql);
	
	if (mysqli_num_rows($result) > 0) {
		$isAvailable = false;
	} else {
		$isAvailable = true;
	}
	
	echo json_encode(array("isAvailable" => $isAvailable));
?>
