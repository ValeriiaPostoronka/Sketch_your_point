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
    <link rel="stylesheet" type="text/css" href="./../../assets/src/css/blocks/hero_artist.css">
    <link rel="stylesheet" type="text/css" href="./../../assets/src/css/blocks/grid_drawing.css">
    <link rel="stylesheet" type="text/css" href="./../../assets/src/css/blocks/tasks.css">
    <script src="https://kit.fontawesome.com/5f551754c5.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="wrapper">
        <?php include '../header.php' ?>

        <main class="main">
        <?php include '../blocks/tasks.php' ?>
            <div class="page">
                <?php include '../blocks/hero_artist.php' ?>
                <?php include '../blocks/grid_drawing.php' ?>
            </div>
        </main>

        <?php include '../footer.php' ?>
    </div>

    <script src="../../assets/src/js/blocks/tasks.js"></script>
    <script src="../../assets/src/js/fslightbox.js"></script>
</body>
</html>