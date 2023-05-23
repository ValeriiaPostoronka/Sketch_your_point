<?php
    session_start();
    $data = $_POST['img'];

    $data = str_replace('data:image/png;base64,', '', $data);
    $data = str_replace(' ', '+', $data);

    $img = base64_decode($data);

    $user = $_SESSION['user'];
    if (isset($_POST['taskID'])) {
        $taskID = $_POST['taskID'];
        $path = $_SERVER['DOCUMENT_ROOT'].'/results/'.$user.'_'.$taskID.'.png';
    }
    else {
        $path = $_SERVER['DOCUMENT_ROOT'].'/results/'.$user.'.png';
    }

    if (file_put_contents($path, $img)) {
        print $path;
    }
    else {
        header("HTTP/1.1 500 Internal Server Error");
    }
?>