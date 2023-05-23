<?php
    session_start();

    $img = $_FILES['file'];
    $imgName = $_SESSION['user'].'.png';
    $path = $img['tmp_name'];

    $fullPath = $_SERVER['DOCUMENT_ROOT'].'/profile/'.$imgName;
    if (!move_uploaded_file($path, $fullPath)) {
        header("HTTP/1.1 500 Internal Server Error");
    }
?>