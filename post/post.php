<?php include_once "../lib/header.php" ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/css.css">
    <title>Document</title>
</head>
<body>
    <div class="container boards">
        <p>자유게시판</p>
        <button onclick="location.href='/post/write.php'">글 작성</button> 
        <?php 
            $sql = mq("select * from board order by no desc limit 0,5");
            while($board = $sql->fetch_array()){
                $title = $board["title"];
                if(strlen($title)>100){
                    $title = str_replace($board["title"],mb_substr($board["title"],0,30,"utf-8")."...",$board["title"]);
                }
        ?>
        <div class="post">
            <div class="post_no col-md-1"><?php echo $board['no']; ?></div>
            <div class="post_name col-md-2"><?php echo $board['name']; ?></div>
            <div class="post_title col-md-8"><a href=""><?php echo $title; ?></a></div>
            <div class="post_likes"><?php echo $board['likes']; ?></div> <!-- 좋아요의 경우 데이터베이스의 해당 컬럼 이름을 'likes'로 가정하였습니다. -->
        </div>
        <?php } ?>
            
    </div>
</body>
</html>

<?php include_once "../lib/footer.php" ?> 
