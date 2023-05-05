<?php include "../db.php";
	$no;
	$id = $_POST['id'];
	$pw = $_POST['pw'];
	$name = $_POST['name'];
	$style = $_POST['style'];

	$sql = mq("INSERT into member(id,pw,name,style) values('".$id."','".$pw."','".$name."','".$style."')");
?>
<script>
	window.alert("가입이 완료되었습니다.");
	location.href="/";
</script>
