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
    <link rel="stylesheet" type="text/css" href="./../../assets/src/css/elements/button.css">
    <link rel="stylesheet" type="text/css" href="./../../assets/src/css/elements/title.css">
    <link rel="stylesheet" type="text/css" href="./../../assets/src/css/elements/subtitle.css">
    <link rel="stylesheet" type="text/css" href="./../../assets/src/css/elements/image.css">
    <link rel="stylesheet" type="text/css" href="./../../assets/src/css/blocks/hero_artist.css">
    <link rel="stylesheet" type="text/css" href="./../../assets/src/css/blocks/grid_drawing.css">
    <link rel="stylesheet" type="text/css" href="./../../assets/src/css/page/tasks.css">
    <script src="https://kit.fontawesome.com/5f551754c5.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="wrapper">
        <?php include '../header.php' ?>

        <main class="main">
            <aside class="tasks">
                <div class="tasks__search">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <form class="tasks__search-form">
                        <input class="tasks__search-field" placeholder="Знайди нове завдання!" type="text">
                    </form>
                </div>
                <div class="tasks__sorting">
                    <label>Відсортувати за:</label>
                    <select class="tasks__sorting-list">
                        <option value="time" selected>Часом</option>
                        <option value="rating">Рейтингом</option>
                        <option value="my">Моїм виконанням</option>
                    </select>
                </div>
                <div class="tasks__list">
                    <div class="tasks__list-item">
                        <div class="item__evaluation">
                            <i class="fa-solid fa-caret-up"></i>
                            <div class="item__evaluation-number">+20</div>
                            <i class="fa-solid fa-caret-down"></i>
                        </div>
                        <div class="item__description">Намалюйте свого аватара, що стане вашою індивідуальною заставкою.</div>
                    </div>
                    <div class="tasks__list-item">
                        <div class="item__evaluation">
                            <i class="fa-solid fa-caret-up"></i>
                            <div class="item__evaluation-number">-10</div>
                            <i class="fa-solid fa-caret-down"></i>
                        </div>
                        <div class="item__description">Відобразіть опавше осіннє листя, застосувавши багато відтінків.</div>
                    </div>
                    <div class="tasks__list-item">
                        <div class="item__evaluation">
                            <i class="fa-solid fa-caret-up"></i>
                            <div class="item__evaluation-number">0</div>
                            <i class="fa-solid fa-caret-down"></i>
                        </div>
                        <div class="item__description">Намалюйте аренну цирку та заштрихуйте елементи її елементи різними візеренкуми.</div>
                    </div>
                </div>
                <label>Додай своє завдання:</label>
                <div class="tasks__text">
                    <textarea class="tasks__text-field" placeholder="Моє завдання..."></textarea>
                    <div class="section__actions">
                        <?php $href = ""; $button = "<i class='fa-solid fa-arrow-turn-up'></i>"; include '../../templates/elements/buttons.php'; ?>
                    </div>
                </div>
            </aside>
            <div class="page">
                <?php include '../blocks/hero_artist.php' ?>
                <?php include '../blocks/grid_drawing.php' ?>
            </div>
        </main>

        <?php include '../footer.php' ?>
    </div>

    <script src="../../assets/src/js/fslightbox.js"></script>
</body>
</html>