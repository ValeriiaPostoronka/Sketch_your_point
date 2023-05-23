<?php
    session_start();
    $targetUser = $_POST['user'];
    $taskID = $_POST['taskID']; // get from post
    $user = $_SESSION['user'];

    require_once $_SERVER['DOCUMENT_ROOT'].'/templates/blocks/script/database.php';

    $sql = "SELECT * FROM Marks WHERE user = '$user' AND taskID = $taskID AND targetUser = '$targetUser'";
    $result = mysqli_query($conn, $sql);
    $rowCount = mysqli_num_rows($result);

    if ($rowCount == 0) {
        $sql = "INSERT INTO Marks (user, taskID, targetUser) VALUES (?,?,?)";
        $stmt = mysqli_stmt_init($conn);
        $prepareStmt = mysqli_stmt_prepare($stmt, $sql);
    
        if ($prepareStmt) {
            mysqli_stmt_bind_param($stmt, "sis", $user, $taskID, $targetUser);
            mysqli_stmt_execute($stmt);
        }
    }
    else {
        $sql = "DELETE FROM Marks WHERE user = '$user' AND taskID = $taskID AND targetUser = '$targetUser'";
        mysqli_query($conn, $sql);
    }
?>