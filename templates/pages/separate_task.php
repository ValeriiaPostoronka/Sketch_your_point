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
            <?php include $_SERVER['DOCUMENT_ROOT'].'/templates/blocks/selected_task.php'; ?>
            <?php include $_SERVER['DOCUMENT_ROOT'].'/templates/blocks/messanger.php'; ?>
            <?php include $_SERVER['DOCUMENT_ROOT'].'/templates/blocks/grid_drawing.php'; ?>
        </main>

        <?php include $_SERVER['DOCUMENT_ROOT'].'/templates/footer.php' ?>
    </div>

</body>
</html>