<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Canvas</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/css/base/base.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/css/elements/title.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/css/blocks/cards.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/css/elements/button.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/css/blocks/registration-login.css">
</head>
<body>
    <?php include 'templates/blocks/cards.php' ?>
    <?php $href = "#open-modal"; $button = "Log in"; include 'templates/elements/buttons.php' ?>
    <?php include 'templates/blocks/login.php' ?>
    <script src="https://unpkg.com/micromodal/dist/micromodal.min.js"></script>
    <script src="/assets/src/js/blocks/login.js"></script>
</body>
</html>