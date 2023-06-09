<?php
  session_start();  

  if (isset($_SESSION["user"])) {
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sketch your point</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" type="text/css" href="./../../assets/src/css/base/base.css">
    <link rel="stylesheet" type="text/css" href="./../../assets/src/css/base/modal.css">
    <link rel="stylesheet" type="text/css" href="./../../assets/src/css/base/header.css">
    <link rel="stylesheet" type="text/css" href="./../../assets/src/css/base/footer.css">
    <link rel="stylesheet" type="text/css" href="./../../assets/src/css/blocks/hero_artist.css">
    <link rel="stylesheet" type="text/css" href="./../../assets/src/css/blocks/grid_drawing.css">
    <link rel="stylesheet" type="text/css" href="./../../assets/src/css/blocks/tasks.css">
    <link rel="stylesheet" type="text/css" href="./../../assets/src/css/blocks/modal_task.css">
    <link rel="stylesheet" type="text/css" href="./../../assets/src/css/index.css">
    <script src="https://kit.fontawesome.com/5f551754c5.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="wrapper">
        <?php include $_SERVER['DOCUMENT_ROOT'].'/templates/header.php'; ?>

        <main class="main">
        <?php include $_SERVER['DOCUMENT_ROOT'].'/templates/blocks/tasks.php'; ?>
            <div class="page">
                <?php include $_SERVER['DOCUMENT_ROOT'].'/templates/blocks/hero_artist.php'; ?>
                <?php include $_SERVER['DOCUMENT_ROOT'].'/templates/blocks/grid_drawing.php'; ?>
                <?php include $_SERVER['DOCUMENT_ROOT'].'/templates/blocks/modal_task.php'; ?>
            </div>
        </main>

        <?php include $_SERVER['DOCUMENT_ROOT'].'/templates/footer.php' ?>
    </div>

    <script src="../../assets/src/js/blocks/tasks.js"></script>
    <script src="../../assets/src/js/blocks/hero_artist.js"></script>
    <script src="../../assets/src/js/blocks/grid_drawing.js"></script>
    <script src="../../assets/src/js/fslightbox.js"></script>
    <script src="https://unpkg.com/micromodal/dist/micromodal.min.js"></script>
    <script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
    </script>
</body>
</html>
<?php 
  } else {
    header("Location: http://".$_SERVER['HTTP_HOST']);
  }
?>