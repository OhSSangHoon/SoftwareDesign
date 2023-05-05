<?php
    header('Content-type: application/json');
    include_once "../db.php";

    $id = $_POST['id'];
    $isVailable = false;

    $sql = "SELECT COUNT(*) as cnt FROM users WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli.fetch_array($result);

    if($row['cnt'] == 0){
        $isAvailable = true;
    }

    echo json.encode(['isAvailable'] => $isAvailables);
?>