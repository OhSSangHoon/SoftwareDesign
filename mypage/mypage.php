<?php include_once "../lib/header.php"?>
<?php include_once "../mypage/mypageloading.php"; ?>

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

<?php
	if(isset($row['name']) == null){
?>
	<div class="container">
		<div class="warning">
			<ul>
				<li>이런!<br>회원정보를&nbsp;찾을&nbsp;수&nbsp;없어요.</li>
				<li><button type="button" onclick="location.href='../archive.php'">아이디&nbsp;만들기</button></li>
			</ul>
		</div>
	</div>
<?php }else{ ?>
	<div class="container">
		<div class="bg">
			<div class="myphoto">
				<form action="/mypage/myimg.php" enctype="multipart/form-data" method="post" name="profile">
					<?php
						if($row['profile'] == ""){
					?>
					<img src="../image/boy.png" alt="profile" value="변경" onclick="chgProfile();">
					<?php } else{ ?>
					<img src="../image/<?=$row['profile']; ?>" alt="profile" value="변경" onclick="chgProfile(); ">
					<?php } ?>
					<input type="file" style="display:none; " id="profile" name="profile">
				</form>
				<ul>
					<li class="myname">
						<?php
							echo $row['name'];
						?>
					</li>
					<li>
						<?php
						
							echo $row['id'];
						?>
					</li>
				</ul>
			</div>
			<div class="introduce">
				<ul class="mail">
					<li><button>Mail</button></li>
				</ul>
				<ul class="like">
					<li><button>Like</button></li>
				</ul>
			</div>
			<div class="insta">
				<button>Like&nbsp;</button>
			</div>
		</div>
		<div class="menu boxshadow">
			<input type="radio" id="homep" name="menus">
			<input type="radio" id="share" name="menus">
			<input type="radio" id="friend" name="menus">
			<ul class="menu1 bold">
				<li><label for="homep">HOMEPAGE</label></li>
			</ul>
			<ul class="menu2">
				<li><label for="share">SHARE</label></li>
			</ul>
			<ul class="menu3">
				<li><label for="friend">FRIENDS</label></li>
			</ul>
			<div class="line"></div>
		</div>
	</div>
</body>
</html>



<script>
	var menuBtn1 = document.querySelector(".menu1"),
		menuBtn2 = document.querySelector(".menu2"),
		menuBtn3 = document.querySelector(".menu3");

	function boldclick(){
		menuBtn1.classList.add("bold");
		menuBtn2.classList.remove("bold");
		menuBtn3.classList.remove("bold");
	}

	function boldclick2(){
		menuBtn2.classList.add("bold");
		menuBtn1.classList.remove("bold");
		menuBtn3.classList.remove("bold");
	}

		function boldclick3(){
		menuBtn1.classList.remove("bold");
		menuBtn2.classList.remove("bold");
		menuBtn3.classList.add("bold");
	}

	menuBtn1.addEventListener("click", boldclick);
	menuBtn2.addEventListener("click", boldclick2);
	menuBtn3.addEventListener("click", boldclick3);


	// myImg

	function chgProfile() {
		document.getElementById("profile").click();
	}

		document.getElementById("profile").addEventListener("change", function() {
	const file = this.files[0];
	if (file) {
		const reader = new FileReader();
		reader.onload = function(e) {
		const img = document.querySelector(".myphoto img");
		img.src = e.target.result;
		};
		reader.readAsDataURL(file);
	}

	});

	document.getElementById("profile").addEventListener("change", function() {
    const file = this.files[0];
	const allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i; // 허용되는 확장자를 정규식으로 설정

    	if (file) {
			if(!allowedExtensions.exec(file.name)){
           	 alert('올바르지 않은 파일 확장자입니다. 이미지 파일(jpg, jpeg, png, gif)만 사용해 주세요.');
           	 return;
			}

        	const reader = new FileReader();
        	reader.onload = function(e) {
        	const img = document.querySelector(".myphoto img");
        	img.src = e.target.result;
        };
        
			reader.readAsDataURL(file);
        
        // 여기서 이미지 선택 후 폼을 자동으로 제출합니다.
        	document.forms['profile'].submit();
  		}
	});


</script>

<?php  } ?>