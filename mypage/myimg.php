<?php include "../db.php";

$user = $_SESSION['no'];

$profile = $_FILES['profile']['name'];

$updir = "../image/";

$uploadFile = $updir . '/' . $profile;


move_uploaded_file($_FILES['profile']['tmp_name'], $uploadFile);
chmod($uploadFile, 0777);

$sql = "UPDATE mycard SET profile = '$profile' WHERE no = '".$user."'";
$result = $db->query($sql);

if(!$sql) error("다시 시도");

?>

<script>
	window.alert("프로필이 변경되었습니다.");
	location.href = "../mypage/mypage.php";
</script>