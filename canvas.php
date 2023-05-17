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
    <link rel="stylesheet" type="text/css" href="./../assets/src/css/base/base.css">
    <link rel="stylesheet" type="text/css" href="./../assets/src/css/canvas.css">
    <link rel="stylesheet" type="text/css" href="./../../assets/src/css/base/header.css">
    <link rel="stylesheet" type="text/css" href="./../../assets/src/css/base/footer.css">
    <script src="https://unpkg.com/vb-canvas/dist/vb-canvas.min.js"></script>
    <script src="https://kit.fontawesome.com/5f551754c5.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="wrapper">
    <?php if (isset($_SESSION["user"])) {?>
        <?php include $_SERVER['DOCUMENT_ROOT'].'/templates/header.php' ?>

        <main class="main">
            <aside class="sidebar">
                <nav class="sidebar__menu">
                    <ul class="sidebar__tools">
                        <li class="sidebar__tool">
                            <i class="fa-solid fa-pen fa-xl active"></i>
                        </li>
                        <li class="sidebar__tool">
                            <i class="fa-solid fa-eraser fa-xl"></i>
                        </li>
                        <li class="sidebar__tool">
                            <i class="fa-regular fa-square fa-xl"></i>
                        </li>
                        <li class="sidebar__tool">
                            <i class="fa-regular fa-circle fa-xl"></i>
                        </li>
                        <li class="sidebar__tool">
                            <i class="fa-solid fa-square fa-xl"></i>
                        </li>
                        <li class="sidebar__tool">
                            <i class="fa-solid fa-circle fa-xl"></i>
                        </li>
                        <li class="sidebar__tool">
                            <i class="fa-solid fa-circle-nodes fa-xl"></i>
                        </li>
                        <li class="sidebar__tool">
                            <i class="fa-solid fa-fill-drip fa-xl"></i>
                        </li>
                        <li class="sidebar__tool">
                            <i class="fa-solid fa-circle-left fa-xl"></i>
                        </li>
                        <li class="sidebar__tool">
                            <i class="fa-solid fa-circle-right fa-xl"></i>
                        </li>
                    </ul>
                    <input type="range" class="sidebar__range" min="3" max="30" orient="vertical" value="10">
                </nav>
                <input type="color" class="sidebar__color">
                <?php $href = "#save_button"; $button = "Save"; include './templates/elements/buttons.php' ?>
                <?php $href = "#clean_button"; $button = "Clear canvas"; include './templates/elements/buttons.php' ?>
            </aside>
            <div class="canvas">
                <canvas></canvas>
            </div>
        </main>

        <?php include './templates/footer.php' ?>
        <script src="./../assets/src/js/canvas/floodFill2D.js"></script>
        <script src="./../assets/src/js/canvas/canvas.js"></script>
        <script src="./../assets/src/js/canvas/tools/pen.js"></script>
        <script src="./../assets/src/js/canvas/tools/eraser.js"></script>
        <script src="./../assets/src/js/canvas/tools/square.js"></script>
        <script src="./../assets/src/js/canvas/tools/circle.js"></script>
        <script src="./../assets/src/js/canvas/save.js"></script>
        <script src="./../assets/src/js/canvas/clean.js"></script>
        <script src="./../assets/src/js/canvas/tools/edit.js"></script>
        <script src="./../assets/src/js/canvas/tools/fill.js"></script>
        <script src="./../assets/src/js/canvas/tools/segment.js"></script>
        <script src="./../assets/src/js/canvas/colors.js"></script>
        <script src="./../assets/src/js/canvas/radius.js"></script>
        <script src="./../assets/src/js/canvas/tools.js"></script>
    </div>
    <?php } else { 
        header('Location: index.php');
    } ?>
    
</body>
</html>