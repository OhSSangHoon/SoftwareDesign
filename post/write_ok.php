<?php
    include "../db.php";
  
    // 세션 시작
    session_start();

    $name = $_SESSION['name'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $date = date('Y-m-d');

    // 쿼리 실행
    $sql = mq("insert into board(name, title, content, date) values('".$name."','".$title."','".$content."','".$date."')");

    if ($sql) {
        echo "<script>
            alert('글쓰기가 완료되었습니다.');
            location.href='/post/post.php';</script>";
    } else {
        echo "<script>
            alert('글쓰기 실패: ' . $conn->error);
            location.href='/post/post.php';</script>";
    }
?>
