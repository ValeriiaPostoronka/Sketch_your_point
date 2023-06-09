<?php
    session_start();
    $user = $_SESSION['user'];
    $taskID = $_POST['taskID']; // get from post

    require_once $_SERVER['DOCUMENT_ROOT'].'/templates/blocks/script/database.php';

    $sql = "SELECT * FROM TaskMarks WHERE user = '$user' AND taskID = '$taskID'";
    $result = mysqli_query($conn, $sql);
    $rowCount = mysqli_num_rows($result);

    if ($rowCount == 0) {
        $sql = "INSERT INTO TaskMarks (user, taskID) VALUES (?,?)";
        $stmt = mysqli_stmt_init($conn);
        $prepareStmt = mysqli_stmt_prepare($stmt, $sql);
    
        if ($prepareStmt) {
            mysqli_stmt_bind_param($stmt, "ss", $user, $taskID);
            mysqli_stmt_execute($stmt);
        }

        $sql = "DELETE FROM TaskMarksMin WHERE user = '$user' AND taskID = '$taskID'";
        mysqli_query($conn, $sql);
    }
    else {
        $sql = "DELETE FROM TaskMarks WHERE user = '$user' AND taskID = '$taskID'";
        mysqli_query($conn, $sql);
    }

    $sql = "SELECT * FROM TaskMarks WHERE taskID = '$taskID'";
    $result = mysqli_query($conn, $sql);
    $rowCount = mysqli_num_rows($result);

    $sql = "SELECT * FROM Tasks WHERE ID = '$taskID'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $user = $row['user'];

    $one = 1;
    $zero = 0;

    $sql = "SELECT * FROM Marks WHERE taskID = '$taskID' AND user = '$zero' AND targetUser = '$user' AND mark = $one";
    $result = mysqli_query($conn, $sql);
    $rowCountMark = mysqli_num_rows($result);

    if ($rowCount > 4 && $rowCountMark == 0) {
        $sql = "INSERT INTO Marks (taskID, user, targetUser, mark) VALUES (?,?,?,?)";
        $stmt = mysqli_stmt_init($conn);
        $prepareStmt = mysqli_stmt_prepare($stmt, $sql);
    
        if ($prepareStmt) {
            mysqli_stmt_bind_param($stmt, "issi", $taskID, $zero, $user, $one);
            mysqli_stmt_execute($stmt);
        }
    }
?>