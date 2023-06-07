<?php
	include "../db.php";


	//login에서 입력 받은 id와 pw;
	$userid = $_POST['id'];
	$userpass = $_POST['pw'];

	//SELECT * FROM DB명 WHERE id pw
	$sql = "SELECT * FROM member WHERE id = '$userid' AND pw='$userpass'";

	$result = $db->query($sql); //결과
	$row = mysqli_fetch_array($result );

	$g_id = !empty($row['id'])?$row['id']:'';
	$g_pw = !empty($row['pw'])?$row['pw']:'';
	

	if($userid != $g_id || $userpass != $g_pw){
		echo	"<script>
			alert('아이디가 혹은 비밀번호가 일치하지 않습니다.');
			history.back();
		</script>";
		exit;
	}else{
		$_SESSION['no'] = $row['no'];
		$_SESSION['id'] = $row['id'];
		$_SESSION['pw'] = $row['pw'];
		$_SESSION['name'] = $row['name'];

		mysqli_close($db);

		echo "<script>
			alert('".$_SESSION['name']."님 환영합니다.');
			location.href='/';
		</script>";
	}