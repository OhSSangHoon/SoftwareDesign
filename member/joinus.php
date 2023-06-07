<?php 
	include_once "../lib/header.php";

	// Check if form is submitted
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	  $id = $_POST["id"];
	  $pw = $_POST["pw"];
	  $name = $_POST["name"];
	  $style = $_POST["style"];
	
	  // ID 중복확인
	  $sql = "SELECT * FROM member WHERE id='$id'";
	  $result = mysqli_query($db, $sql);
	  
	  if (mysqli_num_rows($result) > 0) {
		echo "이미 존재하는 아이디입니다.";
	  } else {
		// 이름에 숫자가 포함되는지 확인
		if (preg_match('/\d/', $name)) {
			echo "이름에는 숫자가 포함될 수 없습니다.";
		} else {
			// 회원가입 처리 로직 추가
			$sql = "INSERT INTO member (id, pw, name, style) VALUES ('$id', '$pw', '$name', '$style')";
			if (mysqli_query($db, $sql)) {
				echo "회원가입이 완료되었습니다.";
			} else {
				echo "회원가입 중 오류가 발생했습니다.";
			}
		}
	  }
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script language="JavaScript" type="text/javascript" src="../js/jquery-1.12.3.js"></script>
	<link rel="stylesheet" href="../css/css.css">
	<title>Document</title>
</head>
<body>
	<div class="container">
		<form name="join" action="../member/join.php" method="post" style="text-align:cnnter;">
			<ul class="sec1">
				<li><span>여러분을 알려주세요!</span></li>
				<li style="margin-top:50px;">
					<label for="id"></label>
					<input type="text" id="id" name="id" placeholder="ID를 입력해주세요." required>
					<button type="button" id="idCheck">ID Check</button>
					<span id="idCheckResult"></span>
				</li>
				<li>
					<label for="pw"></label>
					<input type="password" id="pw" name="pw" placeholder="비밀번호를 입력해주세요." required>
				</li>
				<li>
					<label for="name"></label>
					<input type="userName" id="name" name="name" placeholder="이름을 입력해주세요." required>
				</li>
				<li>
					<label for="style">
						<select name="style" id="style">
							<option value="style1">Style1</option>
							<option value="style2">Style2</option>
							<option value="style3">Style3</option>
						</select>
					</label>
				</li>
				<li class="info">해당 정보는 패션 명함을 구분하기 위해 필요합니다</li>
				<li style="margin-top:150px;">
					<button type="submit" class="tBtn" id="submitBtn" disabled>회원가입하기</button>
				</li>
			</ul>
		</form>
	</div>
</body>
</html>

<script>
	$(document).ready(function() {
		$("#idCheck").on("click", function(){
			var userId = $("#id").val();
			if(userId.length == 0){
				alert("ID를 입력해주세요.");
				return;
			}

			$.ajax({
				url: '../member/id_check.php',
				type: 'POST',
				data: { "id": userId },
				dataType: 'json',
				success: function(result){
					if(result.isAvailable){
						$("#idCheckResult").text("사용 가능한 ID입니다.").css("color", "green");
						$("#submitBtn").prop("disabled", false);
					}else{
						$("#idCheckResult").text("이미 사용 중인 ID입니다.").css("color", "red");
						$("#submitBtn").prop("disabled", true);
					}
				},
				error: function(err){
					console.log(err);
				}

			});
		});

		$("form[name='join']").on("submit", function(event) {
			var name = $("#name").val();
			if (/\d/.test(name)) {
				alert("이름에는 숫자가 포함될 수 없습니다.");
				event.preventDefault();
			}
		});
	});
</script>
