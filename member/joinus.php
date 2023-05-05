<?php include_once "../lib/header.php"; ?>
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
					<input type="text" id="id" name="id" placeholder="ID를 입력해주세요.">
					<button type="button" id="idCheck">확인</button>
					<span id="idCheckResult"></span>
				</li>
				<li>
					<label for="pw"></label>
					<input type="password" id="pw" name="pw" placeholder="비밀번호를 입력해주세요.">
				</li>
				<li>
					<label for="name"></label>
					<input type="userName" id="name" name="name" placeholder="이름을 입력해주세요.">
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
					<button type="submit" class="tBtn">회원가입하기</button>
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
					}else{
						$("#idCheckReulst").text("이미 사용 중인 ID입니다.").css("color", "red");
					}
				},
				error: function(err){
					console.log(err);
				}

			});
		});
	});
</script>