<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Canvas</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/css/base/base.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/css/base/modal.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/css/blocks/cards.css">
</head>
<body>
    <?php include 'templates/blocks/cards.php'; ?>
    <?php 
    if (isset($_SESSION["user"])) 
    { 
        $href = "templates/blocks/script/logout.php"; $button = "Log out"; 
        include 'templates/elements/buttons.php';
        $href = "templates/pages/artist.php"; $button = "Сторінка користувача"; 
        include 'templates/elements/buttons.php';
    } 
    else 
    { 
        include 'templates/blocks/login.php'; 
        include 'templates/blocks/registration.php';         
    }
    ?>
    <script src="https://unpkg.com/micromodal/dist/micromodal.min.js"></script>
    <script src="/assets/src/js/blocks/login.js"></script>
    <script src="/assets/src/js/blocks/registration.js"></script>
</body>
</html>