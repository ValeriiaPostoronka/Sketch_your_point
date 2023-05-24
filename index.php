<?php
    session_start();
    function debug_to_console($data) {
        $output = $data;
        if (is_array($output))
            $output = implode(',', $output);
    
        echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sketch your point</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/css/base/base.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/css/base/modal.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/css/blocks/cards.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/css/blocks/hero_first.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/css/blocks/contact_us.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/css/base/header.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/css/base/footer.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/css/index.css">
    <script src="https://kit.fontawesome.com/5f551754c5.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php
        include 'templates/blocks/login.php'; 
        include 'templates/blocks/registration.php'; 
    ?>
    <div class="wrapper">
        <?php include $_SERVER['DOCUMENT_ROOT'].'/templates/header.php'; ?>
        <main class="main">
            <?php include 'templates/blocks/hero_first.php'; ?>
            <?php include 'templates/blocks/cards.php'; ?>
            <?php include 'templates/blocks/contact_us.php'; ?>
        </main>
        <?php include $_SERVER['DOCUMENT_ROOT'].'/templates/footer.php'; ?>
    </div>
    <script src="https://unpkg.com/micromodal/dist/micromodal.min.js"></script>
    <script src="/assets/src/js/blocks/login.js"></script>
    <script src="/assets/src/js/blocks/registration.js"></script>
    <script>
            // if ( window.history.replaceState ) {
            //     window.history.replaceState( null, null, window.location.href );
            // }
    </script>
</body>
</html>