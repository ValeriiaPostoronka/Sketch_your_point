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
    <title>Canvas</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" type="text/css" href="./../../assets/src/css/base/base.css">
    <link rel="stylesheet" type="text/css" href="./../../assets/src/css/base/header.css">
    <link rel="stylesheet" type="text/css" href="./../../assets/src/css/base/footer.css">
    <link rel="stylesheet" type="text/css" href="./../../assets/src/css/elements/image.css">
    <link rel="stylesheet" type="text/css" href="./../../assets/src/css/blocks/grid_drawing.css">
    <link rel="stylesheet" type="text/css" href="./../../assets/src/css/blocks/selected_task.css">
    <link rel="stylesheet" type="text/css" href="./../../assets/src/css/blocks/messanger.css">
    <script src="https://kit.fontawesome.com/5f551754c5.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="wrapper">
        <?php include $_SERVER['DOCUMENT_ROOT'].'/templates/header.php'; ?>

        <main class="main">
            <?php if (isset($_GET['taskID'])) {
                $dbURL = $_SERVER['DOCUMENT_ROOT'].'/templates/blocks/script/database.php';
                require_once $dbURL;

                $taskID = $_GET['taskID'];
                $sql = "SELECT * FROM `Tasks` WHERE ID = $taskID";
                $result = mysqli_query($conn, $sql);
                $taskRow = mysqli_fetch_array($result, MYSQLI_ASSOC);
            ?>
                <?php include $_SERVER['DOCUMENT_ROOT'].'/templates/blocks/selected_task.php'; ?>
                <?php include $_SERVER['DOCUMENT_ROOT'].'/templates/blocks/messanger.php'; ?>
                <?php include $_SERVER['DOCUMENT_ROOT'].'/templates/blocks/grid_drawing.php'; ?>
            <?php } else { ?>
                На жаль, такого завдання немає        
            <?php 
            $href = "http://".$_SERVER['HTTP_HOST']."/templates/pages/artist.php"; $button = "Сторінка користувача"; 
            include $_SERVER['DOCUMENT_ROOT'].'/templates/elements/buttons.php';
            } ?>
        </main>

        <?php include $_SERVER['DOCUMENT_ROOT'].'/templates/footer.php' ?>
    </div>

    <script src="../../assets/src/js/blocks/messanger.js"></script>
    <script src="../../assets/src/js/blocks/grid_drawing.js"></script>
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