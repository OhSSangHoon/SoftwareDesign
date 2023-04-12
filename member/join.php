<?php include "../db.php";
	$no;
	$id = $_POST['id'];
	$pw = $_POST['pw'];
	$name = $_POST['name'];

	$sql = mq("INSERT into mycard(id,pw) values('".$id."','".$pw."','".$name."')");
?>
<script>
	window.alert("가입이 완료되었습니다.");
	location.href="/";
</script>
