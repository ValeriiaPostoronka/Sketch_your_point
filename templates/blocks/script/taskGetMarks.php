<?php
    $sql = "SELECT * FROM TaskMarks WHERE taskID = ".$row['ID'];
    $res = mysqli_query($conn, $sql);
    $plusCount = mysqli_num_rows($res);

    $sql = "SELECT * FROM TaskMarksMin WHERE taskID = ".$row['ID']; 
    $res = mysqli_query($conn, $sql);
    $minusCount = mysqli_num_rows($res);
    $num = $plusCount - $minusCount;
?>