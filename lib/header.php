<?php include_once "C://Xampp/htdocs/db.php"; ?>

<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<script language="JavaScript" type="text/javascript" src="../js/jquery-1.12.3.js"></script>
	<link rel="stylesheet" href="../css/css.css">
</head>
<header class="container" style="text-align:center;">
	<div class="goland">
		<a href="/"><img src="../image/LOGO.png" alt=""></a>
	</div>
	<input type="checkbox" name="bur" id="bur">
	<label for="bur">
		<div class="burger col-md-1 col-right" >
			<ul>
				<li></li>
				<li></li>
				<li></li>
			</ul>
		</div>
	</label>
	<div class="burgermenu container">
		<div class="bleft"></div>
		<div class="bright">
			<div style="height: 65px;">
				<label for="bur">
					<div class="closeBtn">
						<span class="line1"></span>
						<span class="line2"></span>
					</div>
				</label>
			</div>
			<div class="burBtn">
				<?php
					if(isset($_SESSION['id']) == null){
				?>
				<button onclick="location.href='/member/joinus.php'">회원가입 하러가기</button>
			<?php }else{ ?>
				<button onclick="location.href='/mypage/mypage.php'">내 명함 보러가기</button> 
				<!-- myPage -->
			<?php }?>
			</div>
			<div class="burlist">
				<ul>
					<li onclick="location.href='/'">&nbsp;메인 홈</li>
					<li>&nbsp;옷 구경하러가기</li>
					<li onclick="location.href='/post/post.php';">&nbsp;ootd (오늘 뭐 입지)</li>
					<li onclick="location.href='/style/category.php';">&nbsp;스타일 유형 설명</li>
				</ul>
			</div>
			<div class="log">
				<?php
					if(isset($_SESSION['id']) == null){
				?>
				<a href="../member/login.php" style="margin:0 10px; left: 50;">로그인</a>
				<a href="../member/joinus.php" style="margin:0 10px; right:50;">회원가입</a>
				<?php }else{
					echo $_SESSION['name'] .'님';
					echo "<a href='/member/logout.php' style='margin:0 10px;'>로그아웃</a>";
					}
				 ?>	
			</div>
		</div>
	</div>
</header>

