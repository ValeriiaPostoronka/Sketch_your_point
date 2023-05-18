<header class="header">
    <a href="<?php echo "http://".$_SERVER['HTTP_HOST'];?>" class="header__logo">
        <i class="fa-solid fa-paintbrush fa-2xl fa-beat-fade"></i>
    </a>
    <div class="header__page">
        <a href = "#">Редактор</a>
        <a href = "#">Сторінка користувача</a>
        <a href = "#">Рейтинг</a>
    </div>
    <?php 
        $href = "http://".$_SERVER['HTTP_HOST']."/templates/blocks/script/logout.php"; $button = "Log out"; 
        include $_SERVER['DOCUMENT_ROOT'].'/templates/elements/buttons.php';
    ?>
</header>